<?php
include '../shared/nav.php';
include '../genralPhp/function.php';
include '../genralPhp/configDatabase.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $select = "SELECT * FROM `admin` WHERE email ='$email' and  password ='$pass' "; // send on row
    $s = mysqli_query($conn, $select);
    $numRows = mysqli_num_rows($s);
    $row =  mysqli_fetch_assoc($s);
    
    if ($numRows > 0) {
        $_SESSION['admin'] = $email;
        $_SESSION['owner'] = $row['email'] ;
        header('location: /company/employees/listEmp.php');
    } else {
        echo "<div class='alert alert-danger col-6 m-auto'>
        <h2 class='text-center'>  Invalid Password OR Email Try Agin  </h2>
         </div>";
    }
}

?>

<div class="container col-6 my-5 text-center">
    <div class="alert alert-info">
        <h2>Welcome At Admin Login Page </h2>
    </div>
    <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">E-mail </label>
            <input type="email" name="email" class="form-control" placeholder="E-mail">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password </label>
            <input type="passeword" name="pass" class="form-control" placeholder="Password">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
</div>