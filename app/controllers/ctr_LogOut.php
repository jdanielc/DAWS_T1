<?php
if (isset($_SESSION)){
    unset($_SESSION["usuario"]);

}else{
    session_start();
    unset($_SESSION["usuario"]);

}
session_destroy();
header("Location: ctr_Login.php");
