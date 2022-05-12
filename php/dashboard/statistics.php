<!-- Vector List (pull from vectors table/filter by user) -->



    <!-- summary statistics -->

        <h2>Summary Statistics</h2>

        <?php include("_totalStats.php") ?>

        <div class="table-wrap">

            <table>
                <tr>
                    <th>Statistic</th>
                    <?php 
                        if(isset($_SESSION["user"])){ 
                            echo "<th>Your Average</th>";
                        }
                    ?>
                    <th>Everyone Else</th>
                </tr>
                <?php
                    foreach($stats as $key => $value){
                        echo "<tr>";
                        if(isset($_SESSION["user"])){
                            echo "<td>{$key}</td><td>{$value["user"]}</td><td>{$value["everyone"]}</td>";
                        }
                        else{
                            echo "<td>{$key}</td><td>{$value["everyone"]}</td>";
                        }
                        echo "</tr>";
                    }
                ?>
                
            </table>
        </div>
        