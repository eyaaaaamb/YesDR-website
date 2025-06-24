<?php
session_start();
//tfaskh le cont des tableaux
session_unset();
session_destroy();
header("Location:index.php");
?>