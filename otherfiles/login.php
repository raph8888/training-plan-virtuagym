<?php
require_once('includes/connect.php');

if (isset($_POST['myusername']) && isset($_POST['mypassword'])){
	
$myusername = $_REQUEST['myusername'];
$mypassword = $_REQUEST['mypassword'];

$sql="SELECT * FROM login WHERE admin='$myusername' and password='$mypassword'";

if ($result=$conn->query($sql)){
	
// Mysqli_num_row is counting table row
$rowcount=$result->num_rows;

if($rowcount==1){
	
$_SESSION['myuser']=$myusername;
$_SESSION['mypass']=$mypassword;

header("Location: http://raph-web.com/index.php");

} else {
	
header("Location: http://raph-web.com/index.php");
	
		}
	}
}

$conn->close;

?>

<?php
include ('header.php');
?>

	
		<div id="main">
<br><br><br><br><br>

<div class='login'>
	
<div id="fancybox-content" style="border-width: 10px; width: 209px; height: auto;">
	
	<div style="width:auto;height:auto;overflow: auto;position:relative;">
		
	<div id="login">
			
     <form action="#" method="post" class="login" enctype="multipart/form-data">
        	
    <div id="form-items">
        	
    <p>raph-web login</p>
            
    <table>
	<input type="text" placeholder="admin" name="myusername" class="input" autofocus required />
	
	<br> <br>
	
	<input type="password" placeholder="password" name="mypassword" class="input" onfocus="if (this.value =='Password')this.value='';" required />
	
	<br> <br>
	
	<input type="submit" class="button" name="Login" value="submit" >
	</table>
	
	</div>
	</form>
	
	
   </div></div></div></div>	
   
</div>
</div>
</body>

<?php include ('footer.php'); ?>