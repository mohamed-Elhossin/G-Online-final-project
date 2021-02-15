<?php
include '../shared/nav.php';
include '../genralPhp/function.php';
include '../genralPhp/configDatabase.php';
include '../genralPhp/auth.php';
// ========= Read ======== //;
$select = " SELECT * FROM `department`"; // query
$s = mysqli_query($conn, $select);  /// Run Query  >> forma PHP arrrayy
?>
<div class="container col-7 text-center my-5">
    <table class="table table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
     
        </tr>
        <?php foreach ($s as $data) { ?>
            <tr>
                <td> <?php echo $data['id'] ?> </td>
                <td> <?php echo $data['name'] ?> </td>

            </tr>
        <?php } ?>
    </table>
</div>