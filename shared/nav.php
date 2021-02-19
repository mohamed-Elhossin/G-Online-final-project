<?php include 'head.php';
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        HR System
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <?php if (isset($_SESSION['admin']) || isset($_SESSION['hr'])) : ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/company/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Employees
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/company/employees/listEmp.php">List Employees</a>
                        <a class="dropdown-item" href="/company/employees/createEmp.php">Create Employee</a>
                        <a class="dropdown-item" href="/company/employees/joinData.php">Join Data</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Department
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/company/dapartment/listDep.php">List dapartment</a>
                        <a class="dropdown-item" href="/company/dapartment/createDep.php">Create dapartment</a>
                    </div>
                </li>
                <form class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-success my-2 my-sm-0" onclick="return confirm('Are You Sure ?')" name="logout" type="submit">LogOut</button>
                </form>
            <?php else : ?>
                <li class="nav-item"> <a href="/company/admin/login.php" class="btn btn-primary">Login </a> </li>
                <li class="nav-item"> <a href="/company/admin/hrlogin.php" class="btn btn-warning">HR Login </a> </li>

        </ul>
    <?php endif; ?>
    </div>
</nav>

<?php include 'script.php' ?>