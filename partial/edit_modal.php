<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $alert=false;
  require 'db_connect.php';
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $prid = $_POST['id_edit'];
    $pr_category = $_POST['product_category'];
    $pr_name = $_POST['product_name'];
    $pr_desc = $_POST['prod_description'];
echo $p_category;

 $sql = "UPDATE `product` SET `prod_category` = '$pr_category', `prod_name` = '$pr_name', `prod_description` = '$pr_desc' WHERE `product`.`prod_id` = $prid";
 $result = mysqli_query($conn , $sql);
 $alert=true;
 if($alert){
   $_SESSION['edit'] = true; 
  }
 header("Location: /grocery/dashboard.php");
 
  
 
}
}
?>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER["REQUEST_URI"]?>" method="POST">
          <div class="row justify-content-center">
            <div class="col-md-6 my-3">
              <input type="hidden" name="id_edit" id="id_edit">
              <div class="mb-3">
                <label for="prod_category">Product Category</label>
                <select class="form-select " aria-label="Default select example" name="product_category" value=""
                  id="product_category" required>
                  <option value="Veg">Veg</option>
                  <option value="Non-Veg">Non-Veg</option>
                </select>
              </div>
              <div class="my-3">
                <label for="prod_detail">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="" required>
              </div>

              <div class="mb-3">
                <label for="prod_description">Product Description</label>
                <textarea class="form-control" id="product_description" name="prod_description" rows="3" value=""
                  required> </textarea>
              </div>

            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>