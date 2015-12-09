<?php include('header.php'); ?>

<?php $user_id = 3; ?>

<style>


    .center-table
    {
        margin: 0 auto !important;
        float: none !important;
    }

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


<?php $last_id = $_REQUEST["set"]; ?>

        <br>
        <br>

<?php

$sql = "SELECT * FROM plan WHERE id='$last_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>

        <h4 style='text-align: center;'> Add Exercise Day - ".$row["plan_name"]."</h4>
        <h4>Plan description: ".$row["plan_description"]."</h4>
        <h4>Difficulty: ".$row["plan_difficulty"]."</h5></tr>";
    }


} else {
    echo "0 results";
}

?>

<?php

$sql = "SELECT * FROM plan_days WHERE plan_id='$last_id'";
$result = $conn->query($sql);

if ($result->num_rows) {

    echo "<br>";
    echo "You have " .$result->num_rows. " exercise days in this Plan";
    echo "<br><br><br>";

}else{

    echo "<p style='text-align: center;'><br>";
    echo "This plan is empty. Add an exercise day.";
    echo "</p>";
    echo "<br>";


}?>

<br>

        <div class='text-center'>

            <form name="day" action="buildday.php" id="day" onSubmit="return validateForm();" method="post">

                <div class="pagination-centered">
                    <table class="span5 center-table">

                        <tr>
                            <td> <input name="day" id="day" placeholder="Day Name" required /> </td>
                        </tr>


                        <tr>

                            <td style="text-align: left;"> <select name="order" id="order" required />
                                <option value="" disabled selected>Order</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="3">4</option>
                                <option value="3">5</option>

                                </select>

                                <br>
                                <br>
                                <br>
                            </td>
                        </tr>



                        <tr>

                            <td colspan="2"><input class="button" type="submit" name="submit" id="submit" value="(+) Add Day" /></td>

                        </tr>

                        <div style="margin-left:365px;"><span id="confirm_err" class="help"></span></div>



                    </table>

                </div>

        <br>

        <a href="userplan.php?id=<?php echo $last_id; ?>"><p style='text-align: center;'>Plan Details Overview</p></a>




    </div>


</div>

<?php include ('footer.php'); ?>
