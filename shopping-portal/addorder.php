<?php
session_start();
include "lib/functions.php";
$pdo = get_connection();
$DateAndTime = date('m-d-Y h:i a', time());

$name=$pdo->prepare("select UserId from user where email =?");
$name->execute([$_SESSION["email"]]);
$id_name=$name->fetch();
if (isset($_POST["order"])) {

    $stmt = $pdo->prepare("insert into swe2.order(quantity,data_created,	total_cost,customer_id) values(?,?,?,?)");
    $stmt->execute([1, $DateAndTime, $_SESSION["total"], $id_name[0]]);
    header('location:recipt.php');



}
