<?php
function check_login(){
if ( !isset($_SESSION['user'])){

header("Location: login.php");
die;

}
}