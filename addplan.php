<?php
include('header.php');
session_start();
?>

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


<?php


if (isset($_POST["submit"]) && !empty($_POST["name"])) {

    $user_id = 3;
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $difficulty = $_REQUEST['difficulty'];

//returns a MySQLi result object.

    $sql = "INSERT INTO plan (user_id,plan_name,plan_description,plan_difficulty) VALUES ('$user_id','$name','$description','$difficulty')";

    if ($conn->query($sql) === TRUE) {
        //this might
        // $last_id = $database->insert_id;

        $last_id = $conn->insert_id;
        Header("Location:http://localhost:8888/buildplan.php");

    } else {

        echo "We're so sorry!! Something went wrong. Try using letters only.";
    }
}

?>

<div id="main">


    <div class="maininfo2">

        <br>
        <br>

        <h4>Add New Plan</h4>

        <br>
        <div class='text-center'>

    <form name="plan" action="addplan.php" id="plan" onSubmit="return validateForm();" method="post">

        <div class="pagination-centered">
        <table class="span5 center-table">

        <tr>
            <td> <input name="name" id="name" placeholder="Plan Name" required /> </td>
        </tr>

        <tr>

            <td> <input name="description" id="description" type="text" placeholder="Describe your plan" required /> </td>
        </tr>

        <tr>

            <td style="text-align: left;"> <select name="difficulty" id="difficulty" placeholder="Make me drop" required />
                    <option value="" disabled selected>Difficulty</option>
                    <option value="1">Beginner</option>
                    <option value="2">Intermediate</option>
                    <option value="3">Expert</option>

                </select>

                <br>
                <br>
                <br>
            </td>
        </tr>



            <tr>

            <td colspan="2"><input class="button" type="submit" name="submit" id="submit" value="Submit" /></td>

            </tr>

            <div style="margin-left:365px;"><span id="confirm_err" class="help"></span></div>



        </table>

        </div>

        <div id="username_err"></div>

    </form>
</div>

        <br>
        <br>

            <a href="yourplans.php"><h4>Your existing plans</h4></a>

        </div>


    </div>


<?php include ('footer.php'); ?>