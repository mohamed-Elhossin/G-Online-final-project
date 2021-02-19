<?php
include '../shared/nav.php';
include '../genralPhp/function.php';
include '../genralPhp/configDatabase.php';
include '../genralPhp/auth.php';
// ========= Read ======== //;

$select = " SELECT * FROM `employees`"; // query
$s = mysqli_query($conn, $select);  /// Run Query  >> forma PHP arrrayy
//======= Delete =========//
if (isset($_GET['delete'])) {
    $EmpId = $_GET['delete'];
    $delete = " DELETE FROM `employees` WHERE id = $EmpId ";
    $d = mysqli_query($conn, $delete);  /// Run Query  >> forma PHP arrrayy
    header('location: /company/employees/listEmp.php');
}
?>
<div class="container col-7 text-center my-5">
    <table class="table table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Salary</th>
            <th>Image</th>
            <th>D-ID</th>
            <th>Action</th>
        </tr>
        <?php foreach ($s as $data) { ?>
            <tr>
                <td> <?php echo $data['id'] ?> </td>
                <td> <?php echo $data['name'] ?> </td>
                <td> <?php echo $data['salary'] ?> </td>
                <td> <img width="20" src="upload/<?php echo $data['img'] ?>" alt="">  </td>
                <td> <?php echo $data['depid'] ?> </td>
                <td>
                    <a href="listEmp.php?delete=<?php echo $data['id'] ?>" onclick="return confirm('Are You Sure !')" class="btn btn-danger">Delete </a>
                  
                    <a href="createEmp.php?edit=<?php echo $data['id'] ?>" class="btn btn-primary"> Update</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>