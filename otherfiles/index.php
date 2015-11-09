<?php include('header.php'); ?>

<?php
if (isset($_POST["submit"]) && !empty($_POST["name"])) {

    $username=trim($_POST['name']);
    $password=trim($_POST['password']);

    $found_user = User::authenticate($username, $password);

    if($found_user) {

        $_SESSION['myid']=$found_user->id;
        $_SESSION['myuser']=$found_user->username;
        $user_id = $_SESSION['myid'];

    } else {
        //username/password combo was not found in the database
        $message = "Username/password combination incorrect.";
    }

}
?>


    <div id="main">
        <div class="maininfo2">



            <?php 	if(!isset($_SESSION['myid'])) { ?>


                <form name="authenticate" action="index.php" id="authenticate" onSubmit="return validateForm();" method="post">

                    <div class="pagination-centered">
                        <table class="span5 center-table">

                            <tr>

                                <td> <input name="name" id="name" placeholder="Username" required /> </td></tr>

                            <tr>

                                <td> <input name="password" id="password" type="password" placeholder="Password" required /> </td></tr>

                            <div style="margin-left:365px;"><span id="confirm_err" class="help"></span></div>

                            <td colspan="2"><input type="submit" value="Submit" name="submit" /></td></tr>

                        </table>

                    </div>

                    <div id="username_err"></div>

                </form>

            <?php } else { ?>



                <br>
                <br>

                <a href="yourplans.php"> <h4>Your Plans (<?php
                        $sql = "SELECT COUNT(*) FROM plan WHERE user_id=$user_id";
                        $result = $conn->query($sql);
                        $rows = mysqli_fetch_row($result);
                        echo $rows[0];?>) </h4></a>
                <br>

                <a href="addplan.php"><h4>Add New Plan</h4></a>

            <?php } ?>

        </div>

    </div>






<?php include ('footer.php'); ?>