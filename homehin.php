<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:loginhin.php');
};

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'पहले से ही विशलिस्ट में जोड़ दिया गया है!';
   }elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'पहले से ही कार्ट में जोड़ दिया गया है!';
   }else{
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'विशलिस्ट में जोड़ दिया गया है!';
   }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'पहले से ही कार्ट में जोड़ दिया गया है!';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'कार्ट में जोड़ दिया गया है!';
   }

}

?>

<!DOCTYPE html>
<html lang="hi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>होम पेज</title>

   <!-- फ़ॉन्ट अवेसम CD लिंक -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- कस्टम CSS फ़ाइल लिंक -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'headerhin.php'; ?>

<div class="home-bg">

   <section class="home">

      <div class="content">
         <span>खेत से बाज़ार: भविष्य का उर्वरकीयन</span>
         <h3>अपनी खेत के लिए सर्वश्रेष्ठ खरीदें</h3>
         <p>बड़ी फसल और स्वस्थ पौधों को प्राप्त करने के लिए क्रॉपनौरिश का स्वागत है, जहां हम स्मार्ट खेती विधियों में विश्वास रखते हैं। हमारा ध्यान से चयनित उर्वरक से बना उत्पाद संभावित उपज और स्वस्थ पौधों की प्राप्ति के लिए डिज़ाइन किया गया है।</p>
         <a href="abouthin.php" class="btn">हमारे बारे में</a>
      </div>

   </section>

</div>

<section class="home-category">

   <h1 class="title">वर्ग द्वारा खरीदारी करें</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/orgainc.jpg" alt="">
         <h3>कार्बनिक उर्वरक</h3>
         <p>प्राकृतिक रूप से पोषण, कोई सिंथेटिक नहीं</p>
         <a href="categoryhin.php?category=organic" class="btn">कार्बनिक उर्वरक</a>
      </div>

      <div class="box">
         <img src="images/inorg.jpg" alt="">
         <h3>अकार्बनिक उर्वरक</h3>
         <p>सिंथेटिक पोषक तत्वों के साथ विकास को बढ़ावा दें</p>
         <a href="categoryhin.php?category=inorganic" class="btn">अकार्बनिक उर्वरक</a>
      </div>

      <div class="box">
         <img src="images/new_nitro.jpg" alt="">
         <h3>नाइट्रोजन उर्वरक</h3>
         <p>लुश फोलिज़ और वृद्धि को प्रोत्साहित करें</p>
         <a href="categoryhin.php?category=nitrogen" class="btn">नाइट्रोजन उर्वरक</a>
      </div>

      <div class="box">
         <img src="images/phosphate.jpg" alt="">
         <h3>फॉस्फेटिक उर्वरक</h3>
         <p>जड़ और फूलों की वृद्धि को उत्तेजित करें</p>
         <a href="categoryhin.php?category=phosphate" class="btn">फॉस्फेटिक उर्वरक</a>
      </div>

   </div>

</section>

<section class="products">

   <h1 class="title">नवीनतम उत्पाद</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price">₹<span><?= $fetch_products['price']; ?></span>/-</div>
      <a href="view_pagehin.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      <input type="submit" value="विशलिस्ट में जोड़ें" class="option-btn" name="add_to_wishlist">
      <input type="submit" value="कार्ट में जोड़ें" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">अभी तक कोई उत्पाद जोड़ा नहीं गया है!</p>';
   }
   ?>

   </div>

</section>

<?php include 'footerhin.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
