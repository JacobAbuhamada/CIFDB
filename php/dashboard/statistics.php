<!-- Vector List (pull from vectors table/filter by user) -->



    <!-- summary statistics -->

    <h2>Summary Statistics</h2>
    <h3 class="p-3"><strong>How to interpret statistical values in the table below: </strong></h3>
    <div class="statistics-text">
        <strong>Functioning:</strong>
        <ul>
            <li><u>Functioning</u> refers to Executive Functioning.</li>
            <li>Range: 0 to 10. </li>
            <li>0 indicates Completely Ineffective/Non-Functional and 10 indicates Extremely Effective/Super-Functional.</p></li>
        </ul>
        <strong>Intensity:</strong>
        <ul>
            <li><u>Intensity</u> refers to Intensity of Experience/Activation/Arousal. </li>
            <li>Range: 0 to 10. </li>
            <li>0 indicates Undetectable Intensity/Activation and 10 indicates Extremely Intensity/Activation.</p></li>
        </ul>
        <strong>Valence:</strong>
        <ul>
            <li><u>Valence</u> refers to Affective Valence. </li>
            <li>Range: -5 to 5. </li>
            <li>-5 indicates Extremely Unpleasant/Negative/Suffering while 5 indicates Extremely Positive/Pleasurable.</p></li>
        </ul>
        
        <strong>Sense of Self:</strong>
        <ul>
            <li><u>Sense of Self</u> refers to the Sense of Self scale. </li>
            <li>Range: 1 to 5. </li>
            <li>1 indicates minimal or no selfhood or stability/certainty of self present in the experience, 5 indicates feeling "like yourself"/who you are feels very stable and clearly defined, and 3 indicates that your sense of who you are feels fuzzy or less stable/well-defined/clear/absolute.</p></li>
        </ul>
    </div>


        <?php include("_totalStats.php") ?>

        <div class="table-wrap-ver row">

            <?php foreach($stats as $type => $stat) { ?>
                <h3 style="text-align: center; width: 100%"><?php echo ucfirst($type) ?></h3>
                <table>
                    <tr>
                        <th></th>
                        <?php foreach($stat as $operation => $values){

                            foreach($values as $operation => $value){
                                echo "<th>".$operationHuman[$operation]."</th>";
                            }

                            break;
                            
                         } ?>
                    </tr>
                    <?php 
                        foreach($stat as $field => $values){
                            echo "<tr><th>".$fieldHuman[$field]."</th>";
                            foreach($values as $value){
                                echo "<td>".$value."</td>";
                            }
                            echo "</tr>";
                        }
                    ?>
                    
                </table>
            <?php } ?>
        </div>
        