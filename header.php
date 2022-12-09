<?php
?>
<link rel="stylesheet" href="css/header.css">
<!-- jquery  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="topnav" id="nav">
  <a href="#" class="active"><?php echo is_user_logged_in()?get_current_full_name():"Welcome" ?></a>
  <?php if (is_user_logged_in()):?>
     <a href="#" onclick="logout()">Logout</a>
  <?php endif;?>
  <a href="javascript:void(0);" class="icon" onclick="navToggle()">
     <i class="fa fa-bars"></i>
  </a>
</div>
