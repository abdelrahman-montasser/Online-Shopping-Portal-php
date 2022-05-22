<?php
session_start();
if(isset( $_SESSION["username"]) &&  $_SESSION["username"] != "" ) {
    if(isset($_SESSION["total"]) && $_SESSION["total"] != 0){
        $DateAndTime = date('m-d-Y h:i a', time());

    }else{
        header('location:shoping-cart.php');
    }

} else {
    header('location:login.php');
}


?>
<?php include "lib/functions.php";
$pdo = get_connection();
?>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" type="text/css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
body {
    background: #eee
}
</style>
</head>
<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-3 bg-white rounded">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="text-uppercase">Invoice</h1>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Billed:</span><span class="ml-1"><?php echo $_SESSION["username"]; ?></span></div>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Date:</span><span class="ml-1"><?php echo $DateAndTime; ?></span></div>
                        <div class="billed"><span class="font-weight-bold text-uppercase">Order ID:</span><span class="ml-1">#<?php echo rand(1223,8371); ?></span></div>
                    </div>
                    <div class="col-md-6 text-right mt-3">
                        <h4 style="color:green !important;" class="text-danger mb-0">Orgamedical</h4><span>orgamedical.net</span>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <?php


                            $res=$pdo->prepare ("SELECT product_name FROM shopping_cart where user_email=? ");
                            $res->execute([$_SESSION["email"]]);

                            while($row = $res->fetch()){
                            $rest=$pdo->prepare ("SELECT * FROM product where product_name=? ");
                            $rest->execute([$row[0]]);

                            while($com=$rest->fetch()){
                            $loc="./admin/"





                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $com["product_name"]; ?></td>
                                    <td>1</td>
                                    <td><?php echo $com["product_price"]; ?></td>
                                    <td></td>
                                </tr>
                            </tbody>
                                <?php


                            }
                            }?>
                            </body>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td><?php echo $_SESSION["total"]; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form method="post" action="">
                <div class="text-right mb-3"><a href=""><button name="check-out" class="btn btn-danger btn-sm mr-5" type="submit">Home</button></a></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    if(isset($_POST["check-out"])) {



    $stmt= $pdo->prepare ("delete from shopping_cart where user_email = ?");
    $stmt->execute([$_SESSION["email"]]);
    unset($_SESSION['total']);
    header('location:index.php');


}


?>