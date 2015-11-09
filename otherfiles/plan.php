<?php
include('header.php');
require_once('includes/connect.php');
session_start();
?>

<?php

$others = $_REQUEST["id"];

?>

    <div id="main">


        <div class="maininfo2">

            <br>
            <br>

            <h4>Your Plans</h4>

            <br>

            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">

                    <?php


                    $sql = "SELECT * FROM plan";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table><tr>

    <th>Plan Name</th>
    <th>Description</th>
    <th>Difficulty</th></tr>";

                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>

        <td><a href='userplan.php?id=".$row['id']."'><h4>".$row["plan_name"]."</h4></a></td>
        <td><h4>".$row["plan_description"]."</h4></td>
        <td><h4>".$row["plan_difficulty"]."</h4></td></tr>

        ";
                        }
                        echo "</table>";

                    } else {
                        echo "0 results";
                    }

                    ?>

                </div></div>

            <a href="newplan.php"><h4>Add New Plan</h4></a>

        </div>


    </div>


<?php include ('footer.php'); ?>