<?php
    if(isset($_GET['id']) OR isset($_GET['action']) OR isset($_GET['avatar'])){
        $dashboardStatus= '';
        $employeeStatus = 'disabled';
    } else {
        $dashboardStatus = 'disabled';
        $employeeStatus = '';
    }
?>

<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <img class="navbar-logo"src="./../assets/img/assembler-logo.png" alt="Assembler Logo">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php print($dashboardStatus);?>" id="navbarDashboard" aria-current="page" href="./dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php print($employeeStatus);?>" href="./employee.php?action=add">Employee</a>
                    </li>
                </ul>
                <a href="./library/loginController.php" class="d-flex logout-button">
                    <button class="btn btn-outline-success" id="logout">Logout</button>
                </a>
            </div>
        </div>
</nav>