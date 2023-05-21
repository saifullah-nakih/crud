<?php
global $conn;
session_start();
include('db/db_connect.php');
include('inc/header.php');
?>

<header>

  <nav class="navbar navbar-expand-lg navbar-dark  ">
    <div class="container">
      <a class="navbar-brand" href="dashboard.php">Contact Number</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav  ms-auto" >
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">All Contacts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php"> <?php echo $_SESSION['username'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"> Log Out</a>
          </li>


          <li>

          </li>


        </ul>
      </div>
    </div>
  </nav>

</header>