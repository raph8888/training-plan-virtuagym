<?php include('header.php'); ?>

<div id="main">
    <div class="maininfo2">

        <br>
		<br>


        <?php $user_id = 3; ?>

        <a href="yourplans.php"> <h4>Your Plans (<?php
                $sql = "SELECT COUNT(*) FROM plan WHERE user_id=$user_id";
                $result = $conn->query($sql);
                $rows = mysqli_fetch_row($result);
                echo $rows[0];?>) </h4></a>
        <br>
		
		<a href="addplan.php"><h4>Add New Plan</h4></a>

</div>

</div>






<?php include ('footer.php'); ?>