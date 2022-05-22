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
      		<h2>Manage Category</h2>
      	</div>
      	<div class="col-2">
      		<a href="#" data-toggle="modal" data-target="#add_category_modal" class="btn btn-warning btn-sm">Add Product Category</a>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>

            <?php
            $res=$pdo->query("SELECT * FROM category");
            $c=0;
            while($row = $res->fetch()){

            ?>
                <form action="" method="post" >

          <tbody id="category_list">
            <tr>

              <td><?php echo $row["category_id"]; ?></td>
              <td><?php echo $row["category_name"]; ?></td>

                <input type = "hidden" name = "the_id" value = "<?php echo $row["category_name"]; ?>" />
                <td id="<?php echo $c; ?>"><a class="btn btn-sm btn-info">edit</a><button  type="submit" name="sum_delete"  class="btn btn-sm btn-danger">Delete</button></td>
            </tr>
          </tbody>
            </form>
            <?php $c=$c+1;} ?>
        </table>
      </div>
    </main>
  </div>
</div>

<div id="error" class='alert alert-danger text-center' style="display: none">
    This category is already exist !
</div>

<div id="success" class='alert alert-success text-center' style="display: none">
    category inserted successfully !
</div>
<div id="delete-success" class='alert alert-success text-center' style="display: none">
    category deleted  successfully !
</div>


<!-- Modal -->
<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-category-form" action="" method="post" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Category Name</label>
		        		<input type="text" name="category" class="form-control" placeholder="Enter category Name" required>
		        	</div>
        		</div>
        		<input type="hidden" name="add_category" value="1">
        		<div class="col-12">
        			<button type="submit" name="sumbit1" class="btn btn-primary add-category">Add Category</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!--Edit category Modal -->
<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-category-form" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="cat_id">
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="category" class="form-control" placeholder="Enter category Name">
              </div>
            </div>
            <input type="hidden" name="edit_category" value="1">
            <div class="col-12">
              <button type="submit"  class="btn btn-primary edit-category-btn">Update Category</button>
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
if(isset($_POST["sumbit1"])) {
    $count =0;
    $x_value=$_POST["category"];
    $res = $pdo->prepare("SELECT * FROM category where category_name=? ");
    $res ->execute([$x_value]);
    $count =$res->rowCount();


    var_dump($count);

    if($count >0) {
        ?>
        <script type="text/javascript">
            document.getElementById("success").style.display="none";
            document.getElementById("error").style.display="block";
        </script>
        <?php
    }else {

        $category_name=$_POST["category"];
        $stmt= $pdo->prepare("insert into category (category_name) value(?) ");
        $stmt->execute([$category_name]);
        ?>
        <script type="text/javascript">
            document.getElementById("success").style.display="block";
            document.getElementById("error").style.display="none";
            setTimeout(function () {
                window.location.href=window.location.href;

            },1000);
        </script>
        <?php
    }
}
if(isset($_POST["sum_delete"])) {

    $category_to_delete=$_POST["the_id"];
    var_dump($category_to_delete);
    $stmt= $pdo->prepare ("delete from category where category_name =?");
    $stmt->execute([$category_to_delete]);
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