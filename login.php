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
<form id="login-form" action="/login" method="post">
    <div class="error" style="color:red;text-align:center">

    </div>
    <h3>Login Here</h3>

    <label for="username">Username<span style="color:red"> *</span></label>
    <input type="text" placeholder="Email or Phone" id="username" name="username" required>

    <label for="password">Password<span style="color:red"> *</span></label>
    <input type="password" placeholder="Password" id="password" name="password" required>

    <button>Log In</button>
    <div class="social">
        <div class="go"><i class="fab fa-google"></i>  Google</div>
        <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
    </div>
    <p>Dont have an account?<a href="register.php">Create an Account</a></p>
</form>
<?php require_once('footer.php'); ?>
<script>
$("#login-form").submit(function (e){
  e.preventDefault(); // prevent the default action for the form
  var values = getFormData($(this)); // the form values
  values.action = "login";
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
