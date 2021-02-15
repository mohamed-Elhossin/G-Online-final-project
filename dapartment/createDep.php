<?php
include '../shared/nav.php';
include '../genralPhp/function.php';
include '../genralPhp/configDatabase.php';
include '../genralPhp/auth.php';

if (isset($_POST['send'])) {
    $name  = $_POST['name'];
    $insert = "INSERT INTO `department` VALUES (Null , '$name' )";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert TO Database");
}

?>


<div class="container col-6 my-5 text-center">
    <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Name </label>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <button type="submit" name="send" class="btn btn-primary">Send Data</button>
    </form>

</div>