<?php
require_once('functions.php');
if(!is_user_logged_in()) header('Location: login.php');

?>

<html>

<?php require_once('head.php'); ?>
<body>
  <?php require_once('header.php'); ?>

  <div class="content">
    <div class="welcome">
      Hello <?php echo get_current_full_name();?>
    </div>
    <div class="actions">
      <button class="btn btn-primary" type="button" name="add" style="margin:20px;">Add Product</button>
    </div>
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Reference</th>
          <th scope="col">Label</th>
          <th scope="col">Product Price</th>
          <th scope="col">Purchase Date</th>
          <th scope="col">Product Picture</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>

        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Test Label</td>
          <td>1000</td>
          <td>12-12-2012</td>
          <td><img src="<?php echo get_dummy_image();?>" height="40" alt="product image"/></td>
          <td>Personal Computer</td>
          <td>
            <?php echo get_actions_for(1);?>
          </td>

        </tr>

      </tbody>
    </table>
  </div>

  <?php require_once('footer.php'); ?>
</body>
</html>
