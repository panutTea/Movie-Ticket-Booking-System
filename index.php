<?php
  session_start();
  require 'connect.php';
  $is_logged = false;
  if (isset($_SESSION['is_logged'])) {
    $is_logged = $_SESSION['is_logged'];
    $icon = $_SESSION['icon'];
  }
  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>movie</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 </head>

 <body>
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

           <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
             <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
           </form>

           <div class="dropdown text-end">
             <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
               <img src="<?php echo $icon ?>" alt="mdo" width="32" height="32" class="rounded-circle">
             </a>
             <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
               <li><a class="dropdown-item" href="tickets.php">My ticket</a></li>
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
     </header>
   <?php else : ?>

     <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start p-3 mb-3 bg-danger">
       <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
         <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
           <use xlink:href="#bootstrap"></use>
         </svg>
       </a>

       <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
         <li><a href="#" class="nav-link px-2 text-white">Home</a></li>
         <li><a href="#" class="nav-link px-2 text-white">New movie</a></li>
       </ul>

       <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
         <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
       </form>

       <div class="text-end">
         <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
         <button type="button" class="btn btn-warning">Sign-up</button>
       </div>
     </div>
   <?php endif; ?>



   <div class=" col" style="display: flex; align-items: stretch; flex-flow: row wrap; ">
     <?php
      $list_movie = "	SELECT * 
						FROM movie 
					";
      $list_movie_result = mysqli_query($conn, $list_movie);
      if ($list_movie_result) {
        while ($movie_record = mysqli_fetch_array($list_movie_result, MYSQLI_ASSOC)) {

      ?>

         <div class=" card shadow-sm" style="margin:10px; width:240px; display: flex; flex-direction: column;">
           <img src=<?php echo $movie_record['image'] ?> class=" bd-placeholder-img card-img-top" width="150" height="350px">

           <div class="card-body " style="display: flex;justify-content:space-between;flex-direction:column;">
             <p class=" card-text"><?php echo $movie_record['name'] ?></p>
             <div class="d-flex justify-content-between align-items-center">
               <div class="btn-group ">
                 <a href="view.php?id_movie=<?php echo $movie_record['id_movie'] ?>" class="btn btn-sm btn-outline-secondary">View</a>
                 <a href='buy.php?id_movie=<?php echo $movie_record['id_movie'] ?>' class='btn btn-secondary'>Buy</a>
               </div>
               <small class="text-muted"><?php echo $movie_record['begin'] ?></small>
             </div>
           </div>
         </div>


     <?php
        }
      }
      ?>





   </div>




   </div>
 </body>

 </html>