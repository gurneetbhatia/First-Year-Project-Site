<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

  <div class="container login-container">
    <div class="row">
        <div class="col-md-6 login">
            <h3>Login</h3>
            <form method="POST" action="login_db.php">
              <div class="form-group">
                  <input id="login_email" name="login_email" type="text" class="form-control" placeholder="Your Email *" value="" />
              </div>
              <div class="form-group">
                <input id="login_passwd" name="login_passwd" type="password" class="form-control" placeholder="Your Password *" value="" />
              </div>
              <div class="form-group">
                <input type="submit" class="btnSubmit" value="Login" />
              </div>
              <div class="form-group">
                <a href="#" class="ForgetPwd">Forgot Password?</a>
              </div>
              <div class="form-group placeholder"></div>
              <div class="form-group placeholder"></div>
            </form>
          </div>


          <div class="col-md-6 reg-form">
            <h3>Register</h3>
            <form method="POST" action="register_db.php">
              <div class="form-group">
                <input name="reg_name" id="reg_name" type="text" class="form-control" placeholder="Fullname *" value="" />
              </div>
              <div class="form-group">
                <input name="reg_email" id="reg_email" type="text" class="form-control" placeholder="Email *" value="" />
              </div>
              <div class="form-group">
                <input name="reg_passwd" id="reg_passwd" type="password" class="form-control" placeholder="Your Password *" value="" />
              </div>
              <div class="form-group">
                <input name="reg_cpasswd" id="reg_cpasswd" type="password" class="form-control" placeholder="Confirm Password *" value="" />
              </div>
              <div class="form-group">
                <input type="submit" class="btnSubmit" value="Register" />
              </div>
            </form>
          </div>
         </div>
     </div>


     <div class="col-md-6 enterpin-form">
     	<form method="POST" action="enter_pin.php">
     		<div class="form-group">
     			<input type="submit" class="btnSubmit enterPinBtn" value="Enter Registration Pin" />
     		</div>
     	</form>
     </div>
  <img class="logo" src="../assets/logo1.png">
  <script type="text/javascript" src="scripts.js"></script>
</body>
</html>
