<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:loginhin.php');
}

?>

<!DOCTYPE html>
<html lang="hi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ऑर्डर</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'headerhin.php'; ?>

<section class="placed-orders">

   <h1 class="title">ऑर्डर प्लेस किए गए</h1>

   <div class="box-container">

   <?php
      $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
      $select_orders->execute([$user_id]);
      if($select_orders->rowCount() > 0){
         while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <p> प्लेस किया गया : <span><?= $fetch_orders['placed_on']; ?></span> </p>
      <p> नाम : <span><?= $fetch_orders['name']; ?></span> </p>
      <p> नंबर : <span><?= $fetch_orders['number']; ?></span> </p>
      <p> ईमेल : <span><?= $fetch_orders['email']; ?></span> </p>
      <p> पता : <span><?= $fetch_orders['address']; ?></span> </p>
      <p> भुगतान विधि : <span><?= $fetch_orders['method']; ?></span> </p>
      <p> आपके ऑर्डर : <span><?= $fetch_orders['total_products']; ?></span> </p>
      <p> कुल मूल्य : <span>₹<?= $fetch_orders['total_price']; ?>/-</span> </p>
      <p> भुगतान की स्थिति : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">अबतक कोई ऑर्डर नहीं प्लेस किया गया!</p>';
   }
   ?>

   </div>

</section>









<?php include 'footerhin.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
