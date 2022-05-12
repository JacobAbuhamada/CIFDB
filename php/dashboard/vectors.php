<h2>Your Experiences</h2>

<?php include("_totalStats.php") ?>
<?php include("getVectors.php") ?>

        <div class="vectorsClass">

            <table>
                <tr>
                    <?php 
                      foreach($vectorFields as $field){
                        echo "<th>".$field."</th>";
                      }
                    ?>
                </tr>
                <?php
                $count = 0;
                    foreach($experiences as $experience){
                      $count++;
                      echo "<tr><td>{$count}</td>";
                      foreach($experience as $key => $value){
                        // if($key == "past_or_pres"){
                        //   if($value == 1){
                        //     echo "<td>Present</td>";    
                        //   }
                        //   else{
                        //     echo "<td>Past</td>";    
                        //   }
                        // }
                        // else{
                          echo "<td>{$value}</td>";
                        // }
                      }
                      echo "</tr>";
                    }
                ?>
                
            </table>
        </div>