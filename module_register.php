    <?php

include "secure/anti_inject.php";
include "secure/sql_check.php";
/*
if($_SESSION[UserID] <> "")
{
    SetMessage("Mensaje de GI", array("¡Deslogueate Primero Para Crear Otras Cuentas!"));
    header("Location: index.php");
    die();
}
*/
if(isset($_POST[submitreg]))
{
    $user           = clean($_POST[useridconf]);
    $names          = clean($_POST[usernameconf]);
    $pass[0]        = clean($_POST[userpasswordconf1]);
    $pass[1]        = clean($_POST[userpasswordconf2]);
    $email          = clean($_POST[useremailconf]);
    $sq             = clean($_POST[userquestionconf]);
    $sa             = clean($_POST[useranswerconf]);

    if($pass[0] != $pass[1]){
        echo "<script type=\"text/javascript\">alert(\"Fotos guardadas\");</script>";  
        echo "<script> location.replace(\"index.php?do=register\"); </script>";
        die();
    }
    elseif ( mssql_num_rows( mssql_query_logged("SELECT * FROM Account(nolock) WHERE UserID = '$user'") ) <> 0 ){
        //SetMessage("Register", array("The UserID $userid is already in use"));
        echo "<script type=\"text/javascript\">alert(\"The UserID $userid is already in use\");</script>";
        echo "<script> location.replace(\"index.php?do=register\"); </script>";
        die();
    }
    elseif ( mssql_num_rows( mssql_query_logged("SELECT * FROM Account(nolock) WHERE Email = '$email'") ) <> 0 ){
        //SetMessage("Register", array("The Email $email is already in use"));
        echo "<script type=\"text/javascript\">alert(\"The Email $email is already in use\");</script>";
        echo "<script> location.replace(\"index.php?do=register\"); </script>";
        die();
    }
    elseif ($user == ""){
        //SetMessage("Register", array("Please enter an UserID"));
        echo "<script type=\"text/javascript\">alert(\"Please enter an UserID\");</script>";
        echo "<script> location.replace(\"index.php?do=register\"); </script>";
        die();
    }
    elseif ($pass[0] == "" || $pass[1] == ""){
        //SetMessage("Register", array("Please enter a password"));
        echo "<script type=\"text/javascript\">alert(\"Please enter a password\");</script>";
        echo "<script> location.replace(\"index.php?do=register\"); </script>";
        die();
    }
    elseif ($email == ""){
        //SetMessage("Register", array("Please enter an email"));
        echo "<script type=\"text/javascript\">alert(\"Please enter an email\");</script>";
        echo "<script> location.replace(\"index.php?do=register\"); </script>";
        die();
    }
    elseif ($sq == ""){
        //SetMessage("Register", array("Please enter a secret question"));
        echo "<script type=\"text/javascript\">alert(\"Please enter a secret question\");</script>";
        echo "<script> location.replace(\"index.php?do=register\"); </script>";
        die();
    }
    elseif ($sa == ""){
        //SetMessage("Register", array("Please enter a secret answer"));
        echo "<script type=\"text/javascript\">alert(\"Please enter a secret answer\");</script>";
        echo "<script> location.replace(\"index.php?do=register\"); </script>";
        die();
    }
    elseif (strlen($user) < 3){
        //SetMessage("Register", array("The userid is too short (6 chars min)"));
        echo "<script type=\"text/javascript\">alert(\"The userid is too short (6 chars min)\");</script>";
        echo "<script> location.replace(\"index.php?do=register\"); </script>";
        die();
    }
    elseif (strlen($pass[0]) < 3){
        //SetMessage("Register", array("The password is too short (6 chars min)"));
        echo "<script type=\"text/javascript\">alert(\"The password is too short (6 chars min)\");</script>";
        echo "<script> location.replace(\"index.php?do=register\"); </script>";
        die();
    }
    else{

            $registered = 1;
           mssql_query("INSERT INTO Account (UserID, Name, Email, UGradeID, PGradeID, RegDate, sa, sq, Coins, EventCoins, DonatorCoins)Values ('$user', '$names','$email', 0, 0, GETDATE(), '$sa', '$sq', 0, 0, 0)");
	    $res = mssql_query("SELECT * FROM Account WHERE UserID = '$user'");
	    $usr = mssql_fetch_assoc($res);
	    $aid = $usr['AID'];
          mssql_query("INSERT INTO Login ([UserID], [AID], [Password])Values ('$user', '$aid', '$pass[0]')");
		  /*enviar items */
		  /*SHOPOS*/
		  mssql_query("INSERT INTO AccountItem ([AID], [ItemID], [RentDate], [RentHourPeriod], [Cnt])Values ('$aid', '90005', GETDATE(), '480', '1')");
		  mssql_query("INSERT INTO AccountItem ([AID], [ItemID], [RentDate], [RentHourPeriod], [Cnt])Values ('$aid', '90008', GETDATE(), '480', '1')");
		  mssql_query("INSERT INTO AccountItem ([AID], [ItemID], [RentDate], [RentHourPeriod], [Cnt])Values ('$aid', '90011', GETDATE(), '480', '1')");
				  /*Fin */
        //SetMessage("Register", array("The account $user has been created successfully and items for 20 days."));
				  echo "<script type=\"text/javascript\">alert(\"Registered Successfully!!\");</script>";
				  echo "<script> location.replace(\"index.php\"); </script>";
        //header("Location:index.php");
        //exit;
        //die();
    }

}?>
	<article>
		<script src='https://www.google.com/recaptcha/api.js'></script> <!-- Captcha -->	
		<!--<div class="alert alert-danger" role="alert">
  			This is a danger alert—check it out!
		</div> -->
	<div class="container">	
	<div class="row">
        <div class="col col-sm-1"></div>
	<div class="col col-sm-5 registercont">	
		<?php 
		if ((isset($_POST['submit'])) && ($registered == 1)) {
		echo "	
		<div class=\"alert alert-primary\" role=\"alert\">
  		Cuenta creada correctamente!
		</div>";
} ?>
	<!--<form>
		  <div class="form-group">
		    <label for="exampleInputEmail1">User ID</label>
		    <input type="form-text" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="UserHelp" placeholder="Enter UserID">
		    <small id="UserHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label><input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter @email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <div class="form-check">
		    <input type="checkbox" class="form-check-input" id="exampleCheck1">
		    <label class="form-check-label" for="exampleCheck1">Check me out</label>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
	</form> -->
	<center><h5>REGISTER NEW PLAYER!</h5></center>
	<br/>
	<form name="formregister" method="POST" action="index.php?do=register">
	<div class="form-group row">
    <label for="inputUserID" class="col-sm-3 col-form-label">User ID</label>
    <div class="col-sm-9">
      <input type="form-text" class="form-control form-control-sm" id="inputUserID" name="useridconf" placeholder="User ID...">
    </div>
</div>
    <div class="form-group row">
    <label for="inputUserName" class="col-sm-3 col-form-label">Name</label>
    <div class="col-sm-9">
      <input type="form-text" class="form-control form-control-sm" id="inputUserName" name="usernameconf" placeholder="User Name...">
    </div>
</div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control form-control-sm" id="inputEmail3" name="useremailconf" placeholder="Email...">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-9">
      <input type="password" class="form-control form-control-sm" id="inputPassword3" name="userpasswordconf1" placeholder="Password...">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label">Repeat</label>
    <div class="col-sm-9">
      <input type="password" class="form-control form-control-sm" id="inputPassword3" name="userpasswordconf2" placeholder="Repeat Password...">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputUserQuestion" class="col-sm-4 col-form-label">Secret Question</label>
    <div class="col-sm-8">
      <input type="form-text" class="form-control form-control-sm" id="inputUserQuestion" name="userquestionconf"placeholder="Secret Question...">
    </div>
	</div>
	<div class="form-group row">
    <label for="inputUserAnswer" class="col-sm-4 col-form-label">Secret Answer</label>
    <div class="col-sm-8">
      <input type="form-text" class="form-control form-control-sm" id="inputUserAnswer" name="useranswerconf" placeholder="Secret Answer...">
    </div>
</div>	  <!--		
		  <div class="form-group row">
		    <div class="col-sm-12">
		     <div class="g-recaptcha" data-sitekey="6Lei20YUAAAAABNeCH1HrcjJhJNgRTIDpuXiDjMU"></div>
		    </div>
		  </div>-->
		</form>
		  <div class="form-group row">
		    <div class="col-sm-12">
		      <!-- <button type="submit" class="btn btn-primary">Finish!!</button> 
		      <div class="btn-group" role="group" aria-label="...">Finish!</div> -->
		      <button type="submit" name="submitreg" class="btn btn-primary btn btn-block">Finish the registration!</button>
		    </div>
		  </div>
		</form>
	</div>
	<div class="col col-sm-2">
	</div>

	<div class="col col-sm-4">
	<div class="row registercont">
	<div class="col">	
	<center><h5>Do you have an account? Login!</h5></center>
	<br/>
	<form name="formlogin" method="POST" action="index.php">
	<div class="form-group row">
    <label for="inputUserID" class="col-sm-4 col-form-label">User ID</label>
    <div class="col-sm-8">
      <input type="form-text" class="form-control form-control-sm" id="inputUserID" placeholder="User ID...">
    </div>
</div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control form-control-sm" id="inputPassword3" placeholder="Password...">
    </div>
  </div>
		  <div class="form-group row">
		    <div class="col-sm-12">
		      <!-- <button type="submit" class="btn btn-primary">Finish!!</button> 
		      <div class="btn-group" role="group" aria-label="...">Finish!</div> -->
		      <button type="submit" class="btn btn-primary btn btn-block">Enter now!</button>
		    </div>
		  </div>
		</form>
	</div>
	</div>
	</div>
	<div class="row"></div>
	</div>
	</div>
    </article>
    