<?php
session_start();
unset($_SESSION['idUsuario']);

header("location: index.php");
?>
