<?php require_once('functions.php'); ?>

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
<form id="registration-form" action="/registration" method="post">
    <div class="error" style="color:red;text-align:center">

    </div>
    <h3>Create Account</h3>

    <div class="form-elements">
        <div class="form-input half-input">
            <label for="firstname" class="form-label">First Name<span style="color:red"> *</span></label>
            <input type="text" id="firstname" name="firstname" class="form-control" required>
        </div>
        <div class="form-input half-input">
            <label for="lastname" class="form-label">Last Name<span style="color:red"> *</span></label>
            <input type="text" id="lastname" name="lastname" class="form-control"  required>
        </div>
        <div class="form-input full-input">
            <label for="username" class="form-label">Email<span style="color:red"> *</span></label>
            <input type="text" id="username" name="username" class="form-control"  required>
        </div>
        <div class="form-input full-input">
            <label for="password" class="form-label">Password<span style="color:red"> *</span></label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="form-input half-input">
            <label for="phone" class="form-label">Phone Number<span style="color:red"> *</span></label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>
        <div class="form-input half-input">
            <label for="dob" class="form-label">Date of birth<span style="color:red"> *</span></label>
            <input type="date" id="dob" name="dob" class="form-control" required>
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
<script>
$("#registration-form").submit(function (e){
  e.preventDefault(); // prevent the default action for the form
  var values = getFormData($(this)); // the form values
  values.action = "register";
  console.log(values);
  $.ajax('api.php', {
      type: 'POST',  // http method
      data: values,  // data to submit
      success: function (data, status, xhr) {
          var data=JSON.parse(data);
          console.log(data);
          if(data.correct) {
              window.location.href = "/";
          }else{
            $(".error").html(data.msg);
          }
      },
      error: function (jqXhr, textStatus, errorMessage) {
              console.log('Error' + errorMessage);
      }
  });
})
</script>
</body>
</html>
