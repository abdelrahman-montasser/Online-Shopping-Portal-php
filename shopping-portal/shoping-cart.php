<?php
include "check_ath.php";
?>
<?php include "lib/functions.php";
$pdo = get_connection();
?>
<?php include "./template/top.php"; ?>
<body>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index.php">Home</a></li>
                            <li> <a href="./shop-grid.php">Shop</a></li>
                             <li class="active"><a href="./shoping-cart.php">Shoping Cart</a>
                            <li><a href="./blog.php">Blog</a></li>
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <?php
                            $c=0;
                            $res=$pdo->query("SELECT category_name FROM category");
                            while($row = $res->fetch()){

                                ?>
                                <li id="echo $c;"><a href="#"><?php echo $row["category_name"]; ?></a></li>
                                <?php $c=$c+1; } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                            $total=0;

                            $res=$pdo->prepare ("SELECT product_name FROM shopping_cart where user_email=? ");
                            $res->execute([$_SESSION["email"]]);

                            while($row = $res->fetch()){
                                $rest=$pdo->prepare ("SELECT * FROM product where product_name=? ");
                                $rest->execute([$row[0]]);

                                while($com=$rest->fetch()){
                                    $loc="../admin_portal/admin/"





                            ?>
                            <tbody>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="<?php echo $loc.$com["image_file_name"]; ?>" width="100px">
                                        <h5><?php echo $com["product_name"]; ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php echo $com["product_price"]; ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>


                                    <td class="shoping__cart__item__close">
                                        <form method="post" action="">
                                        <input type = "hidden" name = "the_id" value = "<?php echo $com["product_name"]; ?>" />
                                        <button name="delete_cart" class="icon_close"></button>
                                        </form>
                                    </td>
                                </tr>


                            </tbody>
                                    <?php
                                    $total=$com["product_price"]+$total;

                                }
                            }?>

                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>$<?php echo $total; ?></span></li>
                            <li>Total <span>$<?php echo $total; ?></span></li>
                        </ul>
                        <form method="post" action="addorder.php">
                        <button name="order" class="primary-btn">CHECKOUT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
	<?php include_once("./template/footer.php"); ?>
  
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>

<?php

    if(isset($_POST["delete_cart"])) {


        $product_to_delete=$_POST["the_id"];

        $stmt= $pdo->prepare ("delete from shopping_cart where product_name = ?");
        $stmt->execute([$product_to_delete]);
        ?>
        <script type="text/javascript">

            setTimeout(function () {
                window.location.href=window.location.href;

            },1000);
        </script>
<?php

}
    $_SESSION["total"]=$total;
    $DateAndTime = date('m-d-Y h:i a', time());

/*
    $name=$pdo->prepare("select UserId from user where email =?");
    $name->execute([$_SESSION["email"]]);
    $id_name=$name->fetch();
    $count =0;

    /*$res = $pdo->prepare("select 	total_cost from swe2.order where customer_id=? ");

    $res ->execute([$id_name[0]]);
    $count =$res->rowCount();*/


/*

    if (isset($_POST["order"])) {

        $stmt = $pdo->prepare("insert into swe2.order(quantity,data_created,	total_cost,customer_id) values(?,?,?,?)");
        $stmt->execute([1, $DateAndTime, $total, $id_name[0]]);



    }
*/

?>