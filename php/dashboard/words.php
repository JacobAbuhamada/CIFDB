<h2>Word Frequency List</h2>

<?php include("getWords.php") ?>


        <div class="word_count_content row">

          <div class="user column"  style="padding: 1rem">
            <h3>Your Word Frequency</h3>
            <?php echo printTable($wordCounterUser) ?>
          </div>
           <div class="aggregate column"  style="padding: 1rem">
             <h3>Everyone's Word Frequency</h3>
            <?php echo printTable($wordCounterAggregate) ?>
          </div>
        </div>
