<?php


if ($_SESSION['admin']) {

} else {
    header("location: /company/admin/login.php");
}
?>