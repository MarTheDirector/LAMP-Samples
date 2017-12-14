<?php
session_start();
ob_start();
if (!isset($_SESSION["cust_id"]) || !isset($_SESSION["ip_addr"]))
die("Invalid operation!!!<br /> Please login first");
$cust_id = $_SESSION["cust_id"];
$ip_addr = $_SESSION["ip_addr"];
if ($ip_addr != $_SERVER["REMOTE_ADDR"])
die("Invalid operation!!!<br /> Please login first");
session_destroy();
header('Location: /index.php?msg=' . urlencode(base64_encode("Thank you for shopping at the Real Readers Bookstore!")));
?>