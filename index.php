<?php
require_once('functions.php');
if(!is_user_logged_in()) header('Location: login.php');


?>

<html>

<?php require_once('head.php'); ?>
<body>
  <?php require_once('header.php'); ?>

  <div class="content">
    <div class="modals">

      <div class="modal fade" id="modalAddProduct" tabindex="-1" role="dialog" aria-labelledby="addProductLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="add-product-form" id="add-product-form" action="" method="post">
              <div class="modal-body mx-3">
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="product-add-label">Product Label</label>
                  <input type="text" id="product-add-label" name="product-add-label" class="form-control validate" placeholder="Enter the product name" required>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="product-add-price">Product Price</label>
                  <input type="number" id="product-add-price" name="product-add-price" class="form-control validate" placeholder="Enter the product price" required>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="product-add-pdate">Purchase Date</label>
                  <input type="date" id="product-add-pdate" name="product-add-pdate" class="form-control validate" required>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="product-add-picture">Product Picture <img id="add-product-picture" src="" height="40"/></label>
                  <input type="file" id="product-add-picture" name="product-add-picture" accept="image/png, image/gif, image/jpeg" class="form-control validate" required>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="product-add-category">Product Category</label>
                  <select  id="product-add-category" name="product-add-category" class="form-control validate" required>
                    <option value="" selected disabled hidden>Select Category</option>
                    <?php echo show_all_categories();?>
                  </select>
                </div>

              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-primary" type="submit" >Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modalEditProduct" tabindex="-1" role="dialog" aria-labelledby="editProductLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Edit Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="edit-product-form" id="edit-product-form" action="" method="post">
              <div class="modal-body mx-3">
                <div class="md-form mb-2">
                  <div class="product-edit-reference" style="display: none">
                    Reference <span id="product-edit-reference"></span>
                  </div>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="product-edit-label">Product Label</label>
                  <input type="text" id="product-edit-label" name="product-edit-label" class="form-control validate" placeholder="Enter the product name" required>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="product-edit-price">Product Price</label>
                  <input type="number" id="product-edit-price" name="product-edit-price" class="form-control validate" placeholder="Enter the product price" required>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="product-edit-pdate">Purchase Date</label>
                  <input type="date" id="product-edit-pdate" name="product-edit-pdate" class="form-control validate" required>
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="product-edit-picture" >Product Picture:<img id="edit-product-picture" src="" height="40"/></label>
                  <input type="file" id="product-edit-picture" name="product-edit-picture" accept="image/png, image/gif, image/jpeg" class="form-control validate" >
                </div>
                <div class="md-form mb-2">
                  <label data-error="wrong" data-success="right" for="product-edit-category">Product Category</label>
                  <select  id="product-edit-category" name="product-edit-category" class="form-control validate" required>
                    <option value="" selected disabled hidden>Select Category</option>
                    <?php echo show_all_categories();?>
                  </select>
                </div>

              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-primary" type="submit" >Confirm</button>
              </div>
            </form>

          </div>
        </div>
      </div>
      <div class="modal fade" id="modalDeleteProduct" tabindex="-1" role="dialog" aria-labelledby="deleteProductLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Delete Product: <div id="delete-product-label"></div> ?</h4>
              <div class="product-delete-reference" style="display: none">
                Reference 
                <div id="delete-product-reference">
                </div>
              </div>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="delete-product-form" id="delete-product-form" action="api.php" method="post">
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-success" type="submit">Confirm</button>
                <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
    <div class="welcome">
      Hello <?php echo get_current_full_name();?>
    </div>
    <div class="actions">
      <button class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#modalAddProduct" type="button" name="add" style="margin:20px;">Add Product</button>
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

        <?php foreach(get_current_user_products() as $product):?>
          <tr>
            <th scope="row"><?php echo $product['id']?></th>
            <td><?php echo $product['label']?></td>
            <td><?php echo $product['price']?></td>
            <td><?php echo $product['pdate']?></td>
            <td><img src="<?php echo $product['picture']?>" height="40" alt="product image"/></td>
            <td><?php echo ucfirst(get_category_by_id($product['id_category'])['name'])?></td>
            <td>
              <?php echo get_actions_for($product['id']);?>
            </td>
          </tr>
        <?php endforeach;?>

      </tbody>
    </table>
  </div>

  <?php require_once('footer.php'); ?>
</body>
</html>
