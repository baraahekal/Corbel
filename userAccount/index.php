<?php
session_start();?>

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

  <header>
  <a href="#corbel" class="logo"><i class="ri-robot-line"><span> Corbel</span></i></a>
    <ul class="navbar">
         <li> <a href="#start" class="btn">Assistant</a></li>
         <li> <a href="#game" class="btn">Game</a></li>
         <li><a href="../about-us/index.html">About us</a></li>
         
        
    </ul>

    <div class="main">
        <ul>
        <li>
            <a href="#"><?php echo($_SESSION['username']) ?></a>
            <ul class="dropdown">
                <li><a class="ahmed" href="http://localhost/CorbelService/changepass/Changepass.php">Change Password</a></li>
                <li><a class="ahmed" href="http://localhost/CorbelService/delete/delete.php">Delete Account</a></li>
                <li><a class="ahmed" href="http://localhost/CorbelService/login/Form.php">Sign Out</a></li>
            </ul>
        </li>
        </ul>
        <div class="bx bx-menu" id="menu-icon"></div>
    </div>
    
</header>

    <canvas  class="webgl"> </canvas>
    <section id="corbel" class="section">
        <div class="home-page">
            <h1 class="corbel-homepage"> CORBEL !</h1>
               <p class="intro-body"><br>Welcome to CORBEL <br> a premier provider of programming services
                 for all your modern and trend technology needs.
                  Our team of skilled professionals is dedicated to delivering top-quality 
                  solutions in game development and machine learning</p>

                  <div class="btns">
                    <button  type="button"> <a class="game-development" href="#game">Game Development</a> </button>
                    <button  type="button">  <a class="game-development" href="#start">Machine Learning</a></button>
                  </div>

        </div>
    </section>
    <section id="game" class="section">

        <div class="game-page">
           
                <h1 class="game-homepage" >Game Development</h1>
                <p class="intro-game">A CORBEL race is a game in which players race <br>marbles down a track or through a series of <br>obstacles. 
                    It can be played as a competitive<br>game or as a creative building activity.</p>
                    <a href="https://warm-raindrop-ef5f34.netlify.app/" target="_blank">For More Info</a>
           
              <img class="img-gamepage" src="../assets/corbelRace.png" >
        </div>
    </section>
   
    <section id="start" class="section">
        <div class="assistant-page">
            <h1 class="assistant-homepage" >Machine Learning</h1>
            <p class="intro-assistant">Corbel is an AI chat assistant designed to assist users with a variety
                 of tasks and inquiries. With advanced natural language processing capabilities, 
                 Corbel is able to understand and respond to a wide range of requests and questions.</p>
                <a class="link-assistant" href="https://fastidious-croquembouche-cf49d3.netlify.app/" target="_blank">For More Info</a>
                <img class="img-assistant" src="../assets/corbel.png" >
        </div>
     
    </section>
    
    <script>
        
// Navbar
let menu=document.querySelector('#menu-icon');
let navbar=document.querySelector('.navbar');

menu.onclick=()=>{
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
    
}

// document.getElementById("section1").style.display = "block";
// document.getElementById("section2").style.display = "none";
// document.getElementById("section3").style.display = "none";

//Smoothing

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click",function(e){
        e.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior:"smooth"
        });
    });
    
});

const button = document.querySelector('button');
const list = document.querySelector('.list');

button.addEventListener('click', () => {
  if (list.style.display === 'none') {
    list.style.display = 'block';
    list.style.height = 'auto';
  } else {
    list.style.display = 'none';
    list.style.height = '0';
  }
});

    </script>
   
</body>
</html>