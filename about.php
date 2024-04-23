<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/about-img-1.png" alt="">
         <h3>why choose us?</h3>
         <p>At CorpNourish, we excel in several key areas. Our commitment to quality ensures that our fertilizers meet the highest standards. With a team of experienced professionals, we provide expert advice tailored to your specific needs. Customer satisfaction is at the core of our business, and we strive to exceed your expectations. Additionally, we are dedicated to innovation, continuously developing cutting-edge fertilizer solutions to optimize your crop yields</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

      <div class="box">
         <img src="images/about-img2.png" alt="">
         <h3>what we provide?</h3>
         <p>Our offerings include a diverse range of fertilizers to suit various crops and soil types. We also offer organic fertilizers, providing environmentally friendly options for sustainable farming practices. For those with unique requirements, we offer custom fertilizer blends tailored to your specifications. Furthermore, we provide education and support to help you succeed, offering resources and guidance to enhance your farming practices</p>
         <a href="shop.php" class="btn">our shop</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">Our team</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/trupti.jpg" alt="">
         <p>DEVELOPER </p>
         <div class="stars">
         <a href="mailto:trupti.gunjal21@pccoepune.org"><i class="fa fa-envelope"></i></a>
         <a href="https://www.linkedin.com/in/maheshdargad/"><i class="fab fa-linkedin-in"></i></a>
         <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
         <a href="https://github.com/"><i class="fab fa-github"></i></a>
         </div>
         <h3>Trupti Gunjal</h3>
      </div>

      <div class="box">
         <img src="images/mahesh.jpg" alt="">
         <p>DEVELOPER. </p>
         <div class="stars">
         <a href="mailto:mahesh.dargad21@pccoepune.org"><i class="fa fa-envelope"></i></a>
         <a href="https://www.linkedin.com/in/trupti-gunjal-0970ba22a/"><i class="fab fa-linkedin-in"></i></a>
         <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
         <a href="https://github.com/"><i class="fab fa-github"></i></a>
         </div>
         <h3>Mahesh Dargad</h3>
      </div>

      <div class="box">
         <img src="images/ashwini.jpg" alt="">
         <p>DEVELOPER </p>
         <div class="stars">
         <a href="mailto:ashwini.harode21@pccoepune.org"><i class="fa fa-envelope"></i></a>
         <a href="https://www.linkedin.com/in/ashwini-harode-b4328922a/"><i class="fab fa-linkedin-in"></i></a>
         <a href="https://twitter.com/harode17398"><i class="fab fa-twitter"></i></a>
         <a href="https://github.com/Ashwiniharode0"><i class="fab fa-github"></i></a>
         </div>
         <h3>Ashwini Harode</h3>
      </div>

     

   </div>

</section>


<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>