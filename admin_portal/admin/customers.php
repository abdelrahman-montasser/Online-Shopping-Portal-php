<?php
include "check_ath.php";
?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
      ?>
      <?php include "functions.php";
      $pdo = get_connection();
      ?>
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Customers</h2>
      	</div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Address</th>
              <th>Action</th>
            </tr>
          </thead>
            <?php
            $c=0;
            $res=$pdo->query("SELECT UserId,customerName,email,phone_number,address  FROM user");
            while($row = $res->fetch()){

            ?>

        <form action="" method="post" >
          <tbody id="customer_list">
            <tr>
              <td><?php echo $row["UserId"]; ?></td>
              <td><?php echo $row["customerName"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              <td><?php echo $row["phone_number"]; ?></td>
              <td><?php echo $row["address"]; ?></td>

                <input type = "hidden" name = "the_id" value = "<?php echo $row["email"]; ?>" />
                <td id="<?php echo $c; ?>"><a class="btn btn-sm btn-info">edit</a><button  type="submit" name="sum_delete"  class="btn btn-sm btn-danger">Delete</button></td>
          </tbody>
                </form>
                <?php $c=$c+1; } ?>
        </table>
      </div>
    </main>
  </div>
</div>

</div>
<div id="delete-success" class='alert alert-success text-center' style="display: none">
    customer deleted  successfully !
</div>


<!-- Modal -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Name</label>
		        		<input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Brand Name</label>
		        		<select class="form-control brand_list" name="brand_id">
		        			<option value="">Select Brand</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Category Name</label>
		        		<select class="form-control category_list" name="category_id">
		        			<option value="">Select Category</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Description</label>
		        		<textarea class="form-control" name="product_desc" placeholder="Enter product desc"></textarea>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Price</label>
		        		<input type="number" name="product_price" class="form-control" placeholder="Enter Product Price">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Keywords <small>(eg: apple, iphone, mobile)</small></label>
		        		<input type="text" name="product_keywords" class="form-control" placeholder="Enter Product Keywords">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Image <small>(format: jpg, jpeg, png)</small></label>
		        		<input type="file" name="product_image" class="form-control">
		        	</div>
        		</div>
        		<input type="hidden" name="add_product" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-product">Add Product</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>


<?php


    if(isset($_POST["sum_delete"])) {

        $user_to_delete=$_POST["the_id"];
        echo var_dump($user_to_delete);
        $stmt= $pdo->prepare ("delete from user where email = ?");
        $stmt->execute([$user_to_delete]);
        ?>
        <script type="text/javascript">
            document.getElementById("delete-success").style.display="block";
            setTimeout(function () {
                window.location.href=window.location.href;

            },1000);
        </script>
<?php
}
?>
