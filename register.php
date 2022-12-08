<html>
<head>
    <title>Title</title>
    <link rel="stylesheet" href="css/registration.css">
</head>
<body>
  <?php require_once('header.php'); ?>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="/registration" method="post">

    <h3>Create Account</h3>

    <div class="form-elements">
        <div class="form-input half-input">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" id="fname" name="fname" class="form-control" >
        </div>
        <div class="form-input half-input">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" id="lname" name="lname" class="form-control"  >
        </div>
        <div class="form-input full-input">
            <label for="login" class="form-label">Email</label>
            <input type="text" id="login" name="login" class="form-control"  >
        </div>
        <div class="form-input full-input">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" >
        </div>
        <div class="form-input half-input">
            <label for="mobile" class="form-label">Phone Number</label>
            <input type="text" id="mobile" name="mobile" class="form-control" >
        </div>
        <div class="form-input half-input">
            <label for="dob" class="form-label">Date of birth</label>
            <input type="date" id="dob" name="dob" class="form-control" >
        </div>

    </div>
    <button>Register</button>
    <div class="social">
        <div class="go"><i class="fab fa-google"></i>Google</div>
        <div class="fb"><i class="fab fa-facebook"></i>Facebook</div>
    </div>
    <a href="login.php" class="" style="text-align: center;">
        <span>Already have an account?</span>
    </a>
</form>
<?php require_once('footer.php'); ?>
</body>
</html>
