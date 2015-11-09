<?php include('header.php'); ?>

<style>

    * {font-family: arial, verdana, helvetica, sans-serif}
    input { width: 250px; height: 40px; font-size: 20px; border: 1px solid #999999; padding: 5px; }

    ::-webkit-input-placeholder {

        font-size: 20px;
    }
    :-moz-placeholder {font-size: 20px;}
    :-ms-input-placeholder {font-size: 20px;}

</style>

<div id="main">


    <div class="maininfo2">



            <br>
            <br>

            <?php

            $plan = $_REQUEST["id"];

            $sql = "SELECT * FROM plan WHERE id='$plan'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>

        <h2 style='text-align: center;'>".$row["plan_name"]."</h2>
        <h4>Description: ".$row["plan_description"]."</h4>
        <h4>Difficulty: ".$row["plan_difficulty"]."</h5></tr>";
                }

            } else {
                echo "0 results";
            }

            echo "<br>";
            echo "<br>";


            $sql = "SELECT * FROM plan_days WHERE plan_id='$plan'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                echo "Exercise Days:";

                // output data of each row
                while($row = $result->fetch_assoc()) {

                    echo "<a href='buildday.php?set=".$row['id']."'> <h4>".$row['day_name']."</h4></a>";
                }


            } else {
                echo "<br />";
                echo "<br />";
                echo "<p style='text-align: center;'>";
                echo "You did not set up training days for this plan yet.";
                echo "</p>";

            }

            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo "<p style='text-align: center;'>";
            echo "<a href='buildplan.php?set=".$plan."'>(+) Add Day</a>";
            echo "</p>";


            ?>
            <br>
            <br>


    </div>


</div>

<?php include ('footer.php'); ?>