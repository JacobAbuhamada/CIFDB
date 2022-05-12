<?php

  function wordsCounterFromListOfTexts($descriptions)
  {
    $wordCounter = array();
    foreach($descriptions as $description){
      $words = explode(" ", preg_replace('/[?|.|!]?/', '', $description[0]));
      foreach($words as $word)
      {
        if(!array_key_exists($word, $wordCounter))
        {
          $wordCounter[$word] = 1;
        }
        else{
          $wordCounter[$word]++;
        }
      }
    }
    arsort($wordCounter);
    return $wordCounter;
  }

  $descriptions = $conn->query("SELECT `description` FROM vectors WHERE ID = {$_SESSION["user"]["ID"]}")->fetch_all();
  $aggregateDescriptions = $conn->query("SELECT `description` FROM vectors")->fetch_all();

  $wordCounterUser = wordsCounterFromListOfTexts($descriptions);
  $wordCounterAggregate = wordsCounterFromListOfTexts($aggregateDescriptions);

  function printTable($words){
    $html = "";
    $html = $html.'<table>
                <tr>
                  <th>#</th>
                  <th>Word</th>
                  <th>Count</th>
                </tr>';
                $count = 0;
                    foreach($words as $word => $frequency){
                      $count++;
                      $html = $html."<tr>
                      <td>{$count}</td>
                      <td>{$word}</td>
                      <td>{$frequency}</td>
                      </tr>";
                    }
                    $html = $html."</table>";

    return $html;
  }

  // echo print_r($wordCounterUser);


?>