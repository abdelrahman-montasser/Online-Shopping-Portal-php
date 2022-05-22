<?php
include "check_ath.php";
?>
<?php include "functions.php";
$pdo = get_connection();
?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
          <div class="col-10">
              <h2>Product List</h2>
          </div>
          <div class="col-2">
              <a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-warning btn-sm">Add Product</a>
          </div>
      </div>
            <!--
	  <div class="widget-content nopadding">
		<form name="form1" action="" method="post" class="form-horizontal">
			<div class="control-group">
			
			<lable class="control-label" > product name : </lable>
			
			<div class="control">
				<input type="text" class="span11" placeholder="product name" name="product_name">
			</div>
			</div>
			<div class="control-group">
			<lable class="control-label" > category name : </lable>
			<div class="control">
				<select class="span11" >
				
				<?php /*
					
					$stmt = $pdo->query("SELECT category_name FROM category");
					while ($row = $stmt->fetch()){
						echo "<option>";
						echo $row['category_name'];
						echo "</option>";
						
					}
					*/?>
					</select>
			</div>
			</div>
			<div class="control-group">
			<lable class="control-label" > price : </lable>
			<div class="control">
				<input type="text" class="span11" placeholder="product price" name="price">
			</div>
			</div>
			
			<div class="control-group">
			<lable class="control-label" > Quantity : </lable>
			<div class="control">
				<input type="text" class="span11" placeholder="product Quantity" name="quantity">
			</div>
			</div>
			
			<div class="control-group">
			<lable class="control-label" > disease : </lable>
			<div class="control">
				<input type="text" class="span11" placeholder="product disease" name="disease">
			</div>
			</div>
			
			<div class="form-action"> 
				<button type="sumbit" name="sumbit1" class="btn btn-info">save</button>
			</div>
		<div class"alert alert-danger" id="error" style="display: none">
			This product is already exist !
		  </div>
		  
		  <div class"alert alert-success" id="success" style="display: none"> 
		   product inserted successfully !
		  </div>
			
			
		</form>
	  </div>
	  </div>
       -->

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
             
              
              <th>Quantity</th>
              <th>prince</th>
              <th>disease</th>
               <th>image</th>
             
              <th>Action</th>
            </tr>
          </thead>
          
			<?php 
				$res=$pdo->query("SELECT * FROM product");
                $c=0;
				while($row = $res->fetch()){



					?>
             <form action="" method="post" >
			<tbody id="product_list">
              <td><?php echo $row["product_id"]; ?></td>
              <td><?php echo $row["product_name"]; ?></td>

              <td><?php echo $row["quantity"]; ?></td>
              <td><?php echo $row["product_price"]; ?></td>
              <td><?php echo $row["disease"]; ?></td>
              <td><img src="<?php echo $row["image_file_name"]; ?>" width="30px" </td>

              <input type = "hidden" name = "the_id" value = "<?php echo $row["product_name"]; ?>" />
              <td id="<?php echo $c; ?>"><a class="btn btn-sm btn-info">edit</a><button  type="submit" name="sum_delete"  class="btn btn-sm btn-danger">Delete</button></td>
				</tbody>
             </form>
                    <?php $c=$c+1; } ?>
          
        </table>
      </div>
    </main>
  </div>
</div>

<div id="error" class='alert alert-danger text-center' style="display: none">
This product is already exist !
</div>

<div id="success" class='alert alert-success text-center' style="display: none">
product inserted successfully !
</div>
    <div id="delete-success" class='alert alert-success text-center' style="display: none">
        product deleted  successfully !
    </div>


<!-- Add Product Modal start -->
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
                <form id="add-product-form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control category_list" name="category_name">
                                    <?php

                                    $stmt = $pdo->query("SELECT category_name FROM category");
                                    while ($row = $stmt->fetch()){
                                        echo "<option>";
                                        echo $row['category_name'];
                                        echo "</option>";

                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>price</label>
                                <input type="number" class="form-control" name="price" placeholder="Enter product price"></input>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Product Quantity</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Enter Product Quantity" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>disease</label>
                                <input type="text" name="disease" class="form-control" placeholder="Enter Product disease" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                                <input type="file" name="product_image" class="form-control">
                            </div>
                        </div>

                        <input type="hidden" name="add_category" value="1">
                        <div class="col-12">
                            <button type="submit" name="sumbit1" class="btn btn-primary add-category">Add product</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add Product Modal end -->

<!-- Edit Product Modal start -->
<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-product-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="e_product_name" class="form-control" placeholder="Enter Product Name">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Brand Name</label>
                <select class="form-control brand_list" name="e_brand_id">
                  <option value="">Select Brand</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Category Name</label>
                <select class="form-control category_list" name="e_category_id">
                  <option value="">Select Category</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="e_product_desc" placeholder="Enter product desc"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Qty</label>
                <input type="number" name="e_product_qty" class="form-control" placeholder="Enter Product Quantity">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Price</label>
                <input type="number" name="e_product_price" class="form-control" placeholder="Enter Product Price">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Keywords <small>(eg: apple, iphone, mobile)</small></label>
                <input type="text" name="e_product_keywords" class="form-control" placeholder="Enter Product Keywords">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                <input type="file" name="e_product_image" class="form-control">
                <img src="../product_images/1.0x0.jpg" class="img-fluid" width="50">
              </div>
            </div>
            <input type="hidden" name="pid">
            <input type="hidden" name="edit_product" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary submit-edit-product">Add Product</button>
            </div>
          </div>
		 
		  
          
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Edit Product Modal end -->

<?php include_once("./templates/footer.php"); ?>


<?php
	if(isset($_POST["sumbit1"])) {
        $v1=rand(1111,9999);
        $v2=rand(1111,9999);
        $v3=$v1.$v2;
        $v3=md5($v3);
		$count =0;
        $x_value=$_POST["product_name"];
		$res = $pdo->prepare("SELECT * FROM product where product_name=? ");
		$res ->execute([$x_value]);
		$count =$res->rowCount();
        $fnm=$_FILES["product_image"]["name"];
        $dst="product-image/".$v3.$fnm;
        copy($_FILES["product_image"]["tmp_name"],$dst);


        var_dump($count);
		

		if($count >0) {
			?>
			<script type="text/javascript">
			document.getElementById("success").style.display="none";
			document.getElementById("error").style.display="block";
			</script>
            <?php
        }else {
            $product_name=$_POST["product_name"];
            $price=$_POST["price"];
            $quantity=$_POST["quantity"];
            $disease=$_POST["disease"];
            $stmt= $pdo->prepare("insert into product (product_name,product_price,quantity,disease,image_file_name) value(?,?,?,?,?) ");
            $stmt->execute([$product_name, $price,$quantity ,$disease,$dst]);
        ?>
        <script type="text/javascript">

            document.getElementById("success").style.display="block";
            document.getElementById("error").style.display="none";
            setTimeout(function () {

                window.location.href=window.location.href;

            },3000);
        </script>
<?php
        }
    }
    if(isset($_POST["sum_delete"])) {

        $product_to_delete=$_POST["the_id"];
        echo var_dump($product_to_delete);
        $stmt= $pdo->prepare ("delete from product where product_name = ?");
        $stmt->execute([$product_to_delete]);
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