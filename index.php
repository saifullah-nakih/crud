<?php
global $conn;
include('inc/header.php');
session_start();
?>

<div class="container">
    <form action="" method="post">
        <div class="form-reg">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-head-add">
                        <h3>Log in</h3>

                    </div>
                   <?php

                    if(isset($_POST['login'])) {
                      $username = $_POST['username'];
                      $password = $_POST['password'];

                      $sql = "SELECT * FROM user_reg WHERE  username = '$username' AND password = '$password'";
                      $result = mysqli_query($conn, $sql);
                      $count = mysqli_num_rows($result);
                      if($count > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                              $_SESSION['login'] = true;
                              $_SESSION['id'] = $row['id'];
                              $_SESSION['username'] = $row['username'];
                              $_SESSION['password'] = $row['password'];

                          header('Location: dashboard.php');
                          exit();
                        }
                      } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                              Wrong Username or Passowrd !!
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                      }
                    }

                    $conn->close();
                    ?>





                    <div class="form-box">

                        <div class="form-group">
                            <label>Username : </label>
                            <input type="text" class="form-control"  name="username" placeholder="Enter Contact Name" required autocomplete >
                        </div>

                        <div class="form-group">
                            <label>Password </label>
                            <input type="password" class="form-control"  name="password" placeholder="Enter Password" required maxlength="11" autocomplete>
                        </div>

                    </div>
                </div>




                <div class="col-sm-offset-4 col-sm-12 col-12">
                    <div class="form-group create d-flex justify-content-center">
                        <button type="submit" class="btn btn-block justify-content-center align-items-center"name="login"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;login</button>
                    </div>
                </div>


            </div>
        </div>
    </form>
</div>

<?php
include('inc/footer.php');
?>

