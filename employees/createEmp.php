<?php
include '../shared/nav.php';
include '../genralPhp/function.php';
include '../genralPhp/configDatabase.php';
include '../genralPhp/auth.php';
if (isset($_POST['send'])) {
    $name  = $_POST['name'];
    $salary  = $_POST['salary'];
    $depid  = $_POST['depid'];
    $insert = "INSERT INTO `employees` VALUES (Null , '$name' , $salary , $depid)";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert TO Database");
}


// ========== edit by id -=====?///
$name = "";
$salary = "";
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $EmpID =  $_GET['edit'];
    $select = " SELECT * FROM `employees` where id =  $EmpID  "; // query
    $s = mysqli_query($conn, $select);  /// Run Query  >> forma PHP arrrayy
    $row = mysqli_fetch_assoc($s);
    $name =  $row['name'];
    $salary  = $row['salary'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $salary = $_POST['salary'];
        $depid = $_POST['depid'];
        $update = "UPDATE `employees` SET  name ='$name' , salary = '$salary' , depid = $depid where  id = $EmpID ";
        $s = mysqli_query($conn, $update);
        testMessage($s, "Update TO DataBase");
    }
}

?>


<div class="container col-6 my-5 text-center">
    <form method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Name </label>
            <input type="text" name="name" value="<?php echo $name ?> " class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Salary</label>
            <input type="text" name="salary" value="<?php echo $salary ?> " class="form-control" placeholder="Salary">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Department ID</label>
            <select name="depid" class="form-control">
                <?php
                $select = " SELECT * FROM `department`"; // query
                $s = mysqli_query($conn, $select);  /// Run Query  >> forma PHP arrrayy
                foreach ($s as $data) {
                ?>
                    <option value="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?> </option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name="update" class="btn btn-info">Update Data</button>

        <button type="submit" name="send" class="btn btn-primary">Send Data</button>
    </form>

</div>