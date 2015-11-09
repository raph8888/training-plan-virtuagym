<?php include('../header.php'); ?>



<div class="maininfo">
    <div style="text-align: justify;" id="explore">



        <div class="homepictures">

            <a href="#">Table: Exercise</a>
            <div class="homesight">

                <?php

                $sql = "SELECT * FROM exercise";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table><tr>
    <th>id</th>
    <th>exercise_name</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["exercise_name"]."</td></tr>";
                    }
                    echo "</table>";

                } else {
                    echo "0 results";
                }

                ?>



            </div>
        </div>

        <div class="homepictures">

            <a href="#">Table: Exercise_instances</a>
            <div class="homesight">

                <?php

                $sql = "SELECT * FROM exercise_instances";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table><tr>
    <th>id</th>
    <th>exercise_id</th>
    <th>day_id</th>
    <th>exercise_duration</th>
    <th>order</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["exercise_id"]."</td>
        <td>".$row["day_id"]."</td>
        <td>".$row["exercise_duration"]."</td>
        <td>".$row["order"]."</td></tr>";
                    }
                    echo "</table>";

                } else {
                    echo "0 results";
                }

                ?>

            </div>
        </div>

        <div class="homepictures">

            <a href="#">Table: Plan</a>
            <div class="homesight">

                <?php

                $sql = "SELECT * FROM plan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table><tr>
    <th>id</th>
    <th>user_id</th>
    <th>plan_name</th>
    <th>plan_description</th>
    <th>plan_difficulty</th></tr>";

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["user_id"]."</td>
        <td>".$row["plan_name"]."</td>
        <td>".$row["plan_description"]."</td>
        <td>".$row["plan_difficulty"]."</td></tr>";
                    }
                    echo "</table>";

                } else {
                    echo "0 results";
                }

                ?>

            </div>
        </div>

        <div class="homepictures">

            <a href="#">Table: plan_days</a>
            <div class="homesight">
                <?php

                $sql = "SELECT * FROM plan_days";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table><tr>
    <th>id</th>
    <th>plan_id</th>
    <th>day_name</th>
    <th>order</th></tr>";

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["plan_id"]."</td>
        <td>".$row["day_name"]."</td>
        <td>".$row["order"]."</td></tr>";
                    }
                    echo "</table>";

                } else {
                    echo "0 results";
                }

                ?>
            </div>
        </div>

        <div class="homepictures">

            <a href="#">Table: user</a>
            <div class="homesight">

                <?php

                $sql = "SELECT * FROM user";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table><tr>
    <th>id</th>
    <th>username</th>
    <th>password</th>";

                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["username"]."</td>
        <td>".$row["password"]."</td></tr>";
                    }
                    echo "</table>";

                } else {
                    echo "0 results";
                }

                ?>

            </div>
        </div>




    </div>
</div>