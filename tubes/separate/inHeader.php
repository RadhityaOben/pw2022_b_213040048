<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="../">OHCC</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="#">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

          <?php if($_SESSION['status'] === "DOCTOR" || $_SESSION['status'] === "ADMIN" || $_SESSION['status'] === "SUPER ADMIN") {?>
          <li><a class="nav-link scrollto" href="php/patientlist.php">Patient List</a></li>
          <?php } ?>
            
            
          <?php if($_SESSION['status'] === "ADMIN" || $_SESSION['status'] === "SUPER ADMIN") {?>
          <li><a class="nav-link scrollto" href="php/doctorlist.php">Doctor List</a></li>
          <?php } ?>

          <?php if($_SESSION['status'] === "SUPER ADMIN") {?>
          <li><a class="nav-link scrollto" href="php/adminlist.php">Admin List</a></li>
          <?php } ?>
          
          <?php if(isset($_SESSION['login'])) {?>
            <li class="dropdown"><a href="#"><span>Hello <b><?= strtoupper($_SESSION['username']); ?></b></span></a>
            <ul>
              <li><a href="php/profile.php">Profile</a></li>
              <li><a href="php/history.php">Appointment History</a></li>
              <li><a href="signout.php">Logout</a></li>
            </ul>
            </li>
          <?php }?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <?php if(!isset($_SESSION['login'])){ ?>
      <a href="signin.php" class="appointment-btn scrollto"><span class="d-none d-md-inline"></span>Sign In / Sign Up</a>
      <?php } ?>

    </div>
  </header>