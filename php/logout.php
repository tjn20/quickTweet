<?php
session_start();
if(!isset($_SESSION['unique_id'])){
    header("Location: ../login");
}

$_SESSION['unique_id']="";
session_unset();
session_destroy();
echo "done";
?>