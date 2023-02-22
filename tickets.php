<?php
  session_start();
  require 'connect.php';
  $is_logged = false;
  if (isset($_SESSION['is_logged'])) {
    $is_logged = $_SESSION['is_logged'];
    $icon = $_SESSION['icon'];
    $id_user = $_SESSION['id_user'];
  }
  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <title>movie</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 </head>

 <body>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
     function saleConfirmation() {
       Swal.fire({
         icon: 'success',
         title: "จองสำเร็จ !"
       }).then(function() {
         window.location = "index.php";
       });
     }

     function sellsuccess() {
       Swal.fire({
         icon: 'success',
         title: "ขายตั๋วสำเร็จ !",
       }).then(function() {
         window.location = "tickets.php";
       });
     }
   </script>
   <?php
    function signout()
    {
      session_start();
      session_destroy();
      header("Location: index.php");
    }

    if (isset($_GET['signout'])) {
      signout();
    }
    $id_round_sell = "";
    $seat_no_sell = "";
    ?>
   <?php if ($is_logged) : ?>
     <header class="p-3 mb-3 border-bottom bg-danger">
       <div class="container">
         <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
           <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
             <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
               <use xlink:href="#bootstrap"></use>
             </svg>
           </a>

           <ul id="tab_m" class=" nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
             <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>
             <li><a href="#" class="nav-link px-2 link-dark">New movie</a></li>
           </ul>
           <style>
             #tab_m li a {
               color: white;
             }

             #tab_m li a:hover {
               color: black;

             }
           </style>

           <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3"><input type="search" class="form-control" placeholder="Search..." aria-label="Search"></form>
           <div class="dropdown text-end"><a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php echo $icon ?>" alt="mdo" width="32" height="32" class="rounded-circle"></a>
             <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
               <li><a class="dropdown-item" href="tickets.php">My tickets</a></li>
               <li><a class="dropdown-item" href="#">Settings</a></li>
               <li><a class="dropdown-item" href="#">Profile</a></li>
               <li>
                 <hr class="dropdown-divider">
               </li>
               <li><a class="dropdown-item" href="index.php?signout=true">Sign out</a></li>
             </ul>
           </div>
         </div>
       </div>
     </header><?php else : ?><div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start p-3 mb-3 bg-danger"><a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none"><svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
           <use xlink:href="#bootstrap"></use>
         </svg></a>
       <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
         <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
         <li><a href="#" class="nav-link px-2 text-white">New movie</a></li>
       </ul>
       <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3"><input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search"></form>
       <div class="text-end"><a href="login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a><button type="button" class="btn btn-warning">Sign-up</button></div>
     </div><?php endif; ?><div class="tab_menu"><a class="ticket"><b>My tickets</b></a></div>
   <style>
     .tab_menu {
       overflow: hidden;
       background-color: white;
     }


     .tab_menu a {
       margin: 3px;
       font-family: arial;
       text-decoration: none;
       position: relative;
       display: inline-block;
       padding: 1.5px 5px;
       text-transform: uppercase;
       overflow: hidden;
       color: black;
       border: 3px solid;
       border-left: none;
       border-right: none;
       background: linear-gradient(to left, white 3px, transparent 3px, transparent calc(100% - 3px), white calc(100% - 3px)) top left no-repeat, linear-gradient(to left, white 3px, transparent 3px, transparent calc(100% - 3px), white calc(100% - 3px)) bottom left no-repeat;
       background-size: 100% 1.45em;
     }

     .tab_menu a:before,
     .tab_menu a:after {
       z-index: -1;
       content: '';
       position: absolute;
       height: 1.2em;
       width: 1em;
       top: 1.4em;
       border-radius: 50%;
       border: 3px solid;
       box-shadow: 0 0 0 10em #102229;
     }

     .tab_menu a:before {
       left: -0.7em;
     }

     .tab_menu a:after {
       right: -0.7em;
     }

     .tab_menu b:after {
       content: '>';
       color: #DA153E;
       font-weight: bold;
     }
   </style>

   <div class=" col" style="display: flex;align-items: stretch;flex-flow: row wrap;justify-content: center;"><?php
                                                                                                              $list_tickets = "	SELECT * 
						FROM seat
						INNER JOIN time ON seat.id_round = time.id_round
						INNER JOIN movie ON time.id_movie = movie.id_movie
						WHERE id_user = '$id_user'
					";
                                                                                                              $list_tickets_result = mysqli_query($conn, $list_tickets);
                                                                                                              if ($list_tickets_result) {
                                                                                                                while ($tickets_record = mysqli_fetch_array($list_tickets_result, MYSQLI_ASSOC)) {
                                                                                                                  $id_round = $tickets_record['id_round'];
                                                                                                                  $img = $tickets_record['image'];
                                                                                                                  $name = $tickets_record['name'];
                                                                                                                  $price = $tickets_record['price'];
                                                                                                                  $seat_no = $tickets_record['seat_no'];
                                                                                                                  $round = $tickets_record['round'];
                                                                                                                  $date = $tickets_record['date'];

                                                                                                              ?>


         <div class=" card shadow-sm" style="margin:10px; width:240px; display: flex; flex-direction: column;"><img src=<?php echo $img ?>class=" bd-placeholder-img card-img-top" width="auto" height="350px">
           <div class=" card-body">
             <p class="card-text"><?php echo $name ?></p>
             <p class="card-text">วันที่: <?php echo $date ?>เวลา: <?php echo $round ?></p>
             <p class="card-text">ที่นั่ง: <?php echo $seat_no ?></p>
           </div>
         </div>
     <?php

                                                                                                                }
                                                                                                              }
      ?>

   </div>
   </form>
 </body>

 </html>