<?php
include "check_ath.php";
?>
<?php

include "./templates/top.php"; 
?>

<?php include "functions.php";
$pdo = get_connection();
?>
<?php include "./templates/navbar.php"; ?>

<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <h2><center>Admin Details</center></h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>


            </tr>
          </thead>
            <?php
            $res=$pdo->query("SELECT * FROM admin");
            while($row = $res->fetch()){

            ?>
          <tbody id="admin_list">
            <tr>

              <td><?php echo $row["admin_id"]; ; ?></td>
              <td><?php echo $row["username"]; ; ?></td>

              <td><?php echo $row["email"]; ; ?></td>
            </tr>
          </tbody>
            <?php }?>
        </table>
      </div>
    </main>
  </div>
</div>

<?php include "./templates/footer.php"; ?>


