<?php 
include 'userdat/userdat.php';
      if (empty($ses_username || $ses_email)) {
        header('Location: ../galer/cover.php');
        exit();
      }

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- FontAwesome 6.2.0 CSS -->
  <link rel="stylesheet" href= 
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="css/home.css">
</head>

<body>
  <div class="d-flex justify-content-center mt-5">
    <img class="mb-4 mt-5" src="images/assets/Logo.png" width="300" alt="">
  </div>
  <nav class="navbar navbar-expand-sm navbar-light bg-white sticky-top">
    <div class="container">
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
        data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav m-auto mt-2 mt-lg-0 border-bottom py-3">
          <li class="nav-item">
            <a class="nav-link active" href="../galer/" aria-current="page">Home <span
                class="visually-hidden">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../galer/new-album">New Album</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="new-post/index.php">Upload</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../galer/album">My Collection</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../galer/profile">Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
     
  <div class="container d-flex justify-content-center align-items-center flex-column">
    <div class="mt-5 text-center col-7">
    <?php 
      include 'config/con.php';
    ?>
    <h1 class="mt-5 mb-4   poppins-m">welcome <?php echo $_SESSION['username']?></h1>
    <?php ?>
      <p class="text-secondary mb-3">
        Before Upload img make sure to have some Album or Make Album if you dont have album
      </p>
      <div class="row">
        <div class="col-12 mt-3">
          <div class="input-group mb-3">
            <input type="text" class="form-control py-3" placeholder="Search image..." aria-describedby="search-img" />
            <button class="btn btn-dark" id="search-img">Search</button>
          </div>
          <small>Top searches :
            <b>Food, Technology, user, people, bussiness</b></small>
        </div>
      </div>
    </div>
  </div>

  <br />
      

                    
  <div class="container mt-5">
  <div class="row">
    <?php
            include 'config/con.php';
            // include 'userdat/userdat.php';
            $get_all_post = mysqli_query($con, "SELECT foto.DeskripsiFoto, foto.JudulFoto, foto.UserID, foto.FotoID, foto.LokasiFile, user.Username FROM foto INNER JOIN user WHERE foto.UserID = user.UserID");
            foreach ($get_all_post as $postingan) {
              ?>
              <div class="col mb-5">
              <div class="rounded" style="width: 24rem;">
                    <!-- images -->
                        <img src="images/<?php echo $postingan['LokasiFile']; ?>" width="300" height="300" class=" img-size rounded-bottom rounded-4 f-img card-img-top" alt="...">
                        <div class="detail">
                          <div class="d-flex justify-content-between">
                            <div class="">
                            <!-- title -->
                              <h5 class="card-title"><?php echo $postingan['JudulFoto'] ?></h5>
                              <!-- deskrip -->
                              <p class="small text"><?php echo $postingan['DeskripsiFoto'] ?></p>
                            </div>
                            <!-- likes -->
                            <div class=" d-flex flex-column">
                            <a class="like-btn " onclick="toggleLike()" href="action/like.php?id=<?php echo $postingan['FotoID']; ?>"><i class="fa-regular fa-heart"></i></a>
                              <p class="mx-3 mtn-1">
                              <?php
                                $id_foto = $postingan['FotoID'];
                                $get_like = mysqli_query($con, "SELECT COUNT(fotoID) AS TotalLike FROM likefoto WHERE FotoID='$id_foto'");
                                $like = $get_like->fetch_assoc();
                                echo $like['TotalLike']; ?>
                              </p>
                            </div>
                          </div>
                          <!-- user dan komentar -->
                          <div class=" d-flex justify-content-between">
                            <p class="text-secondary">Uploaded By : <?php echo $postingan['Username'] ?></p>
                            <div class="d-flex-column">
                              <a class="" href="komentar.php?id=<?php echo $postingan['FotoID']; ?>"><i class="fa-regular fa-2xl fa-comments"></i></a>
                              <p class="mx-3 mtn-1">
                                <?php
                                
                                  $id_foto = $postingan['FotoID'];
                                  $get_komen = mysqli_query($con, "SELECT COUNT(fotoID) as TotalKomen FROM komentarfoto WHERE FotoID='$id_foto'");
                                  $komen = $get_komen->fetch_assoc();
                                  echo $komen['TotalKomen']; ?>
                              </p>
                            </div>
                            
                          </div>
                        </div>
                      </div>
              </div>

    <?php } ?>
  </div>
</div>              
      
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
    integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/home.js"></script>

</body>

</html>