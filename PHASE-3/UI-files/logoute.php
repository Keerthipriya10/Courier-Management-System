<?php
session_start();
unset($_SESSION["bid"]);
unset($_SESSION["bcity"]);
header("Location:emp.php");
session_destroy();
?>