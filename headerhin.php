<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<header class="header">

   <div class="flex">

      <a href="homehin.php" class="logo">CropNourish<span>.</span></a>

      <nav class="navbar">
         <a href="homehin.php">होम</a>
         <a href="shophin.php">शॉप</a>
         <a href="ordershin.php">आर्डर्स</a>
         <a href="abouthin.php">हमारे बारे में</a>
         <a href="contacthin.php">संपर्क</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <a href="search_pagehin.php" class="fas fa-search"></a>
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
         ?>
         <a href="wishlisthin.php"><i class="fas fa-heart"></i><span>(<?= $count_wishlist_items->rowCount(); ?>)</span></a>
         <a href="carthin.php"><i class="fas fa-shopping-cart"></i><span>(<?= $count_cart_items->rowCount(); ?>)</span></a>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <a href="user_profile_updatehin.php" class="btn">प्रोफ़ाइल अपडेट करें</a>
         <a href="logout.php" class="delete-btn">लॉगआउट</a>
         <div class="flex-btn">
            <a href="loginhin.php" class="option-btn">लॉगिन</a>
            <a href="registerhin.php" class="option-btn">रजिस्टर</a>
         </div>
      </div>

   </div>

</header>
