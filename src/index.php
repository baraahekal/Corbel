<!DOCTYPE html>
<html lang="en">
 <head>
        <title>Corbel</title>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="style.css">
        <!-- importing fonts from google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" >
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=League+Spartan&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script defer="defer" src="bundle.b3b9376a3046cbd5.js"></script>
    </head>
    
<body>

  <!-- class is the logo -->
  <?php
$sel="SELECT * FROM registration where username='username' ";
$query=mysqli_query($conn,$sel);
$resul=mysqli_fetch_assoc($query);
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // User is logged in, display content for logged in users
    echo 'Welcome, ' . $username . '! You are now logged in.';
  } else {
    // User is not logged in, display content for logged out users
    echo 'Please log in to view this content.';
  }
?>
  <header>
  <a href="#start" class="logo"><i class="ri-robot-line"><span>Corbel</span></i></a>
    <ul class="navbar">
         <li> <a href="#corbel" class="btn">Corbel</a></li>
         <li> <a href="#game" class="btn">Game</a></li>
         <li><a href="#">About us</a></li>
         <li><a href="#">Blog</a></li>
         <li><a href="#">services</a></li>
        
    </ul>


        
    <div class="main">
        <a href="../login/Form.html" class="user"><i class="ri-user-fill"></i><?php echo $resul['username']; ?></a>
        <a href="../registeration/sign.html" ><?php echo $resul['username']; ?></a>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
    
</header>




    <canvas  class="webgl"> </canvas>
    <section id="start" class="container">
        <div class="container">
           
            <div class="row">
    
                <div class="col-6 d-flex justify-content-centre">
    
                    <div class="card m-2 cb1 text-centre" >
                        <div class="card-body">
                          <h2 class="card-title ">  <i class="ri-robot-line"></i>Corbel Assistant</h2>
                          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem error nobis saepe impedit enim dolores ab? Quidem, saepe deserunt. Totam nihil debitis harum suscipit aliquam ut iure asperiores ratione itaque!</p>
                          <a class="btn btn-outline-light" href="https://getbootstrap.com/docs/5.0/getting-started/introduction/">qwqw</a>
                        </div>
                      </div>
    
                </div>
                <div class="col-6 d-flex justify-content-centre">
    
                    <div class="card m-2 cb1 text-centre" >
                        <div class="card-body">
                            <img  class="image" src="../public/textures/corbalgamescreenshot.png" alt="image description">
                          <h2 class="card-title mb-4">Corbel Game</h2>
                          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem error nobis saepe impedit enim dolores ab? Quidem, saepe deserunt. Totam nihil debitis harum suscipit aliquam ut iure asperiores ratione itaque!</p>
                          <a class="btn btn-outline-light" href="https://getbootstrap.com/docs/5.0/getting-started/introduction/">qwqw</a>
                        </div>
                      </div>
    
                </div>
            </div>
        </div>
     
    </section>
    <section id="corbel" class="section"></section>
    <section id="game" class="section"></section>
   
    
   
</body>
</html>