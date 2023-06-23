<?php
session_start();
include('assets/inc/config.php');
include('assets/inc/checklogin.php');
check_login();
$pid = $_SESSION['pid'];

if(isset($_POST['payment_id'])&&isset($_POST['invoiceid']))
{
    $paymentId = $_POST['payment_id'];
    $invoiceId = $_POST['invoiceid'];

    $sql = "INSERT INTO `razorpay_payment`(`payment_id`, `invoiceid`, `patientid`, `date`) VALUES ('$paymentId','$invoiceId','$pid',NOW())";
    $stmt=$con->prepare($sql);
    $stmt->execute();

    $sql2 = "UPDATE `tbl_invoice` SET `status`='1' WHERE `invoiceid`='$invoiceId' and `patientid`='$pid'";
    $stmt2=$con->prepare($sql2);
    $stmt2->execute();
}
?>