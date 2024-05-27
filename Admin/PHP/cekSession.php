<?php
session_start();
if (!isset($_SESSION['username']))
{
echo "<h1>Anda belum login</h1>";
header("Location: ../../PHP/beranda.php");
exit;
}
?>