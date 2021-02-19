<?php
include '../shared/nav.php';
include '../genralPhp/function.php';
include '../genralPhp/configDatabase.php';
/* SELECT employees.name  , department.name depName FROM employees JOIN department ON 
department.id = employees.depid WHERE employees.name ='$name' and  employees.id = $id
*/
if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $select = "SELECT employees.name  , department.name depName FROM employees JOIN department ON 
    department.id = employees.depid WHERE employees.name ='$name' and  employees.id = $id
    "; // send on row
    $s = mysqli_query($conn, $select);
    $numRows = mysqli_num_rows($s);
    $row =  mysqli_fetch_assoc($s);
    if ($numRows > 0) {
        if ($row['depName'] == "HR") {
            $_SESSION['hr'] = $name;
            header('location: /company/employees/listEmp.php');
        } else {
            echo "<div class='alert alert-danger col-6 m-auto'>
            <h5 class='text-center'>  Sorry You Are Not HR Mebmer  </h5>
             </div>";
        }
    } else {
        echo "<div class='alert alert-danger col-6 m-auto'>
        <h2 class='text-center'>  Invalid Password OR Email Try Agin  </h2>
         </div>";
    }
}

?>

<div class="container col-6 my-5 text-center">
    <div class="alert alert-warning">
        <h2>Welcome At HR Login Page </h2>
    </div>
    <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Name </label>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">ID </label>
            <input type="passeword" name="id" class="form-control" placeholder="Password">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
</div>