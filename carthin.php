<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:loginhin.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$delete_id]);
   header('location:carthin.php');
}

if(isset($_GET['delete_all'])){
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart_item->execute([$user_id]);
   header('location:carthin.php');
}

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$p_qty, $cart_id]);
   $message[] = 'कार्ट मात्रा अपडेट की गई';
}

?>

<!DOCTYPE html>
<html lang="hi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>खरीदारी कार्ट</title>

   <!-- फ़ॉन्ट अद्भुत cdn लिंक  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- कस्टम सीएसएस फ़ाइल लिंक  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'headerhin.php'; ?>

<section class="shopping-cart">

   <h1 class="title">उत्पाद जोड़े गए</h1>

   <div class="box-container">

   <?php
      $grand_total = 0;
      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart->execute([$user_id]);
      if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" method="POST" class="box">
      <a href="carthin.php?delete=<?= $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('कार्ट से हटाना है?');"></a>
      <a href="view_pagehin.php?pid=<?= $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
      <div class="name"><?= $fetch_cart['name']; ?></div>
      <div class="price">₹<?= $fetch_cart['price']; ?>/-</div>
      <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
      <div class="flex-btn">
         <input type="number" min="1" value="<?= $fetch_cart['quantity']; ?>" class="qty" name="p_qty">
         <input type="submit" value="अपडेट" name="update_qty" class="option-btn">
      </div>
      <div class="sub-total"> उप-कुल : <span>₹<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> </div>
   </form>
   <?php
      $grand_total += $sub_total;
      }
   }else{
      echo '<p class="empty">आपकी कार्ट खाली है</p>';
   }
   ?>
   </div>

   <div class="cart-total">
      <p>कुल रकम : <span>₹<?= $grand_total; ?>/-</span></p>
      <a href="shophin.php" class="option-btn">खरीदारी जारी रखें</a>
      <a href="carthin.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>">सभी हटाएं</a>
      <a href="checkouthin.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">चेकआउट करें</a>
   </div>

</section>

<?php include 'footerhin.php'; ?>

<script src="js/script.js"></script>

</body>
</html>