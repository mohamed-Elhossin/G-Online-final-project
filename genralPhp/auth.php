<?php


if ( isset($_SESSION['admin']) || isset($_SESSION['hr']) ) {

} else {
    header("location: /company/admin/login.php");
}
?>