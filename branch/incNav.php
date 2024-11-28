<nav class="navbar navbar-expand-md bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="main.php">
     <img src="../assets/ei-icon.jpg" height="30" class="me-2">
     EI Branch</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav ms-auto">


        <li class="nav-item">
         <a class="nav-link" href="calendar.php"><i class="fa text-primary fa-calendar-days me-1"></i> Calendar</a>
        </li>

        <li class="nav-item">
         <a class="nav-link" href="pos.php"><i class="fa text-danger fa-cash-register me-1"></i> POS</a>
        </li>

        <li class="nav-item dropdown">
         <a class="nav-link" href="#"><i class="fa text-warning fa-users me-1"></i> Clients</a>
        </li>

        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa fa-bullseye text-success me-1"></i> Marketing</a>
         <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Email</a></li>
          <li><a class="dropdown-item" href="#">SMS</a></li>
         </ul>
        </li>

        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa fa-gear text-info me-1"></i> Settings</a>
         <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Services</a></li>
          <li><a class="dropdown-item" href="#">Products</a></li>
          <li><a class="dropdown-item" href="#">Technicians</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Lookup</a></li>
         </ul>
        </li>

        <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa text-danger fa-user me-1"></i> <?=$ses_Fullname?> </a>
         <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#" onclick="modalpage('pwd.php','sm')">Password</a></li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
         </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>