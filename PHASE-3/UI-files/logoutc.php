<?php
session_start();
unset($_SESSION["cid"]);
header("Location:home.html");
session_destroy();
?>