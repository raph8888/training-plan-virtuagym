<?php
ob_start();
require('includes/database.php');
require('includes/plandays.php');
require('includes/plan.php');
require('includes/exercise_instances.php');
require('includes/exercise.php');
session_start();
?>

<style>

    * {font-family: arial, verdana, helvetica, sans-serif}
    input { width: 250px; height: 40px; font-size: 20px; border: 1px solid #999999; padding: 5px; }

    ::-webkit-input-placeholder {

        font-size: 20px;
    }
    :-moz-placeholder {font-size: 20px;}
    :-ms-input-placeholder {font-size: 20px;}

</style>

<?php

if (isset($_POST["submit"]) && !empty($_POST["day"])) {

$plan_id =
$dayname = $_REQUEST['day'];
$dayorder = $_REQUEST['order'];

$sql = "INSERT INTO plan_days (plan_id,day_name,sort) VALUES ('$plan_id','$dayname','$dayorder')";

if ($conn->query($sql) === TRUE) {
    //this might
    // $last_id = $database->insert_id;
    echo "Your Plan has been successfully created";

    $last_id = $conn->insert_id;
}}

$day_id = $_REQUEST["set"];

$day = PlanDays::find_by_id($id=$day_id);

$plan_id = $day->plan_id;

$plan = Plan::find_by_id($id=$plan_id);

$results = ExerciseInstances::find_all_by_day_id($my_id=$day_id);

$fitness = Exercise::find_by_id($id=4);

?>

<h2>Plan Name:</h2>
<input placeholder="<?php echo $plan->plan_name; ?>" />


<h2>Day Name:</h2>
<input placeholder="<?php echo $day->day_name; ?>" />

<br>
<br>

<form>
    <select id="dayorder">
        <option></option>
        <option selected="selected">Day Order: <?php echo $day->order; ?></option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
</form>

<br>

<h2>Exercises:</h2>

<?php
foreach($results as $result):

    $fitness = Exercise::find_by_id($id=$result->exercise_id);
    echo "<h3 style='display: inline'>" .$fitness->exercise_name. "</h3>";
    echo "<div onclick='dltexercize()' style='display: inline'><h5 style='display: inline; color: firebrick'> &nbsp; &nbsp; x</h5></div><br><br>";

endforeach;
?>


<form>
    <select id="addexercize">
        <option></option>
        <option selected="selected">Add Exercise</option>
        <option>Crunch</option>
        <option>Air squat</option>
        <option>Windmill</option>
        <option>Push-up</option>
        <option>Rowing Machine</option>
        <option>Walking</option>
        <option>Running</option>
    </select>
</form>

<br>

<h2>Exercise Information:</h2>

<?php

    echo "<table><tr>";
    //echo "<td> id <td />";
    echo "<td>Name&nbsp;&nbsp;<td />";
    //echo "<td> exercise_id <td />";
    //echo "<td> day_id <td />";
    echo "<td>Duration&nbsp;&nbsp;<td />";
    echo "<td>Order&nbsp;&nbsp;<td />";
    echo "</tr>";

foreach($results as $result):

    $fitness = Exercise::find_by_id($id=$result->exercise_id);

    echo "<tr>
    <td><a href='3danimation.php'>" .$fitness->exercise_name. "</a>&nbsp;&nbsp;<td />
    <td>" .$result->exercise_duration. " sec.&nbsp;&nbsp;<td />
    <td>" .$result->order. "&nbsp;&nbsp;<td /></tr>";

endforeach;

echo "</table>";

?>

<hr />

<br>
<br>
<br>

<a href="userplan.php?id=<?php echo $plan_id; ?>"><p>Back to Plan Details Overview</p></a>






