<!DOCTYPE html>
<html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      </head>
    <body class="bg-secondary">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
          function confirmation() {
            Swal.fire("login สำเร็จ !").then(function() {
              window.location = "index.php";
            });
          }
        </script>
    <?php
      session_start();
      require 'connect.php';
      $login_url="login.php";
      if(isset($_POST['login'])){
        // echo '<script>alert("eeeeeee");</script>';
        $id_user = $_POST['id_user'];
        $password = $_POST['password'];
        $sql="select *
              from user
              where id_user = '$id_user' and password = '$password'";
        $result=mysqli_query($conn,$sql);
        $record = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if(mysqli_num_rows($result)>0){
          $_SESSION['is_logged'] = true;
          $_SESSION['id_user'] = $id_user;
          $_SESSION['icon'] = $record['icon'];
          echo "<script>confirmation();</script>";
          // echo '<script>alert("eiei");</script>';
        }
        else{
          echo '<script>Swal.fire("Username หรือ Password ไม่ถูกต้อง!");</script>';
        }
      }
    ?>
    <div class="modal modal-login position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
              <!-- <h5 class="modal-title">Modal title</h5> -->
              <h2 class="fw-bold mb-0">Log in</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
      
            <div class="modal-body p-5 pt-0">
              <form action="" method="post">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control rounded-4" name="id_user"  id="id_user" placeholder="Username">
                  <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control rounded-4" name="password" id="password" placeholder="Password">
                  <label for="floatingPassword">Password</label>
                </div>
                <button name="login" id="login" class="w-100 mb-2 bg-danger btn btn-lg rounded-4 bg-danger text-white" type="submit">Log in</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </body>
      </html>