<!DOCTYPE html>
<html lang="en">
   
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
  /* Button Styles */
  .button-container {
    display: flex;
    align-items: center; /* Vertically center the buttons */
  }

  .button {
    padding: 0.8rem 1.5rem;
    font-size: 1.6rem;
    font-weight: bold;
    text-align: center;
    text-transform: uppercase;
    border: none;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
    height: 3.5rem; /* Set a fixed height for the buttons */
    margin-right: 1rem; /* Add some right margin */
    display: flex;
    align-items: center; /* Vertically center the text within the button */
  }

  .button.primary {
    background-color: #007bff; /* Primary button color */
    color: #fff;
  }

  .button.primary:hover {
    background-color: #0056b3; /* Darker shade of primary color on hover */
  }

  .button.secondary {
    background-color: #6c757d; /* Secondary button color */
    color: #fff;
  }

  .button.secondary:hover {
    background-color: #545b62; /* Darker shade of secondary color on hover */
  }

  /* You can add more button styles as needed */
</style>


</head>
<body>

<header class="header">
   <div class="flex">
      <a href="#" class="logo">CropNourish<span>.</span></a>

            
      <div class="button-container">

    <a href="#"><button class="button primary">English</button></a>
    <a href="frontheadhin.php"><button class="button primary">हिंदी</button></a>
  </div>
   </div>
</header>

<div class="home-bg1">

   <section class="home">

      <div class="content">
         <br><br><br>
         <span class="spann">From Farm to Fork: Fertilizing the Future</span><br><br><br><br>
         <h3>SHOP THE BEST FOR YOUR FARM</h3><br>
         <h3>Buy <span id="element"></span></h3> 
         <br><br><br>
         
         <br><br><br><br><br>
         <a href="login.php" class="btn">SignIn</a>
         <a href="register.php" class="btn">SignUp</a>
      </div>

   </section>

</div>

<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
        var typed = new Typed('#element', {
            strings: ['ORGANIC FERTILIZERS', 'INORGANIC FERTILIZERS', 'NITROGENOUS FERTILIZERS', 'PHOSPHORUS FERTILIZERS',],
            typeSpeed: 50,
        });
    </script>


</body>
</html>