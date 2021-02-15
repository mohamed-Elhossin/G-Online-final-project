<?php
include '../shared/nav.php';
include '../genralPhp/function.php';
include '../genralPhp/configDatabase.php';
include '../genralPhp/auth.php';
// ========= Read ======== //;
$select = "SELECT employees.name empName , department.name depName FROM employees join department ON 
employees.depid = department.id"; // query
$s = mysqli_query($conn, $select);  /// Run Query  >> forma PHP arrrayy
?>
<div class="container col-7 text-center my-5">
    <table class="table table-dark">
        <tr>
            <th>Employee </th>
            <th>Department</th>
        </tr>
        <?php foreach ($s as $data) { ?>
            <tr>

                <td> <?php echo $data['empName'] ?> </td>
                <td> <?php echo $data['depName'] ?> </td>

            </tr>
        <?php } ?>
    </table>
</div>