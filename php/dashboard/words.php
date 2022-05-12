<h2>Word Frequency List</h2>

<?php include("getWords.php") ?>

        <div class="word_count_content">

          <div class="user">
            <h3>Your Word Frequency</h3>
            <?php echo printTable($wordCounterUser) ?>
          </div>
           <div class="aggregate">
             <h3>Everyone's Word Frequency</h3>
            <?php echo printTable($wordCounterAggregate) ?>
          </div>
        </div>
