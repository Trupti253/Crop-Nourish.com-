<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:loginhin.php');
};

if(isset($_POST['order'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $method = $_POST['method'];
   $method = filter_var($method, FILTER_SANITIZE_STRING);
   $address = 'फ्लैट नंबर '. $_POST['flat'] .' '. $_POST['street'] .' '. $_POST['city'] .' '. $_POST['state'] .' '. $_POST['country'] .' - '. $_POST['pin_code'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
   $cart_query->execute([$user_id]);
   if($cart_query->rowCount() > 0){
      while($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)){
         $cart_products[] = $cart_item['name'].' ( '.$cart_item['quantity'].' )';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      };
   };

   $total_products = implode(', ', $cart_products);

   $order_query = $conn->prepare("SELECT * FROM `orders` WHERE name = ? AND number = ? AND email = ? AND method = ? AND address = ? AND total_products = ? AND total_price = ?");
   $order_query->execute([$name, $number, $email, $method, $address, $total_products, $cart_total]);

   if($cart_total == 0){
      $message[] = 'आपकी कार्ट खाली है';
   }elseif($order_query->rowCount() > 0){
      $message[] = 'आर्डर पहले ही प्लेस किया गया है!';
   }else{
      $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES(?,?,?,?,?,?,?,?,?)");
      $insert_order->execute([$user_id, $name, $number, $email, $method, $address, $total_products, $cart_total, $placed_on]);
      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);
      $message[] = 'ऑर्डर सफलतापूर्वक प्लेस किया गया है!';
   }

}

?>

<!DOCTYPE html>
<html lang="hi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>चेकआउट</title>

   <!-- फ़ॉन्ट अद्भुत cdn लिंक  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- कस्टम सीएसएस फ़ाइल लिंक  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'headerhin.php'; ?>

<section class="display-orders">

   <?php
      $cart_grand_total = 0;
      $select_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $select_cart_items->execute([$user_id]);
      if($select_cart_items->rowCount() > 0){
         while($fetch_cart_items = $select_cart_items->fetch(PDO::FETCH_ASSOC)){
            $cart_total_price = ($fetch_cart_items['price'] * $fetch_cart_items['quantity']);
            $cart_grand_total += $cart_total_price;
   ?>
   <p> <?= $fetch_cart_items['name']; ?> <span>(<?= '₹'.$fetch_cart_items['price'].'/- x '. $fetch_cart_items['quantity']; ?>)</span> </p>
   <?php
    }
   }else{
      echo '<p class="empty">आपकी कार्ट खाली है!</p>';
   }
   ?>
   <div class="grand-total">कुल रकम : <span>₹<?= $cart_grand_total; ?>/-</span></div>
</section>

<section class="checkout-orders">

   <form action="" method="POST">

      <h3>अपना ऑर्डर प्लेस करें</h3>

      <div class="flex">
         <div class="inputBox">
            <span>आपका नाम :</span>
            <input type="text" name="name" placeholder="अपना नाम दर्ज करें" class="box" required>
         </div>
         <div class="inputBox">
            <span>आपका नंबर :</span>
            <input type="number" name="number" placeholder="अपना नंबर दर्ज करें" class="box" required>
         </div>
         <div class="inputBox">
            <span>आपका ईमेल :</span>
            <input type="email" name="email" placeholder="अपना ईमेल दर्ज करें" class="box" required>
         </div>
         <div class="inputBox">
            <span>भुगतान विधि :</span>
            <select name="method" class="box" required>
               <option value="कैश ऑन डिलीवरी">कैश ऑन डिलीवरी</option>
               <option value="क्रेडिट कार्ड">क्रेडिट कार्ड</option>
               <option value="पेटीएम">पेटीएम</option>
               <option value="पेपैल">पेपैल</option>
            </select>
         </div>
         <div class="inputBox">
            <span>पता पंक्ति 01 :</span>
            <input type="text" name="flat" placeholder="उदाहरण के लिए फ्लैट नंबर" class="box" required>
         </div>
         <div class="inputBox">
            <span>पता पंक्ति 02 :</span>
            <input type="text" name="street" placeholder="उदाहरण के लिए सड़क का नाम" class="box" required>
         </div>
         <div class="inputBox">
            <span>शहर :</span>
            <input type="text" name="city" placeholder="उदाहरण के लिए मुंबई" class="box" required>
         </div>
         <div class="inputBox">
            <span>राज्य :</span>
            <input type="text" name="state" placeholder="उदाहरण के लिए महाराष्ट्र" class="box" required>
         </div>
         <div class="inputBox">
            <span>देश :</span>
            <input type="text" name="country" placeholder="उदाहरण के लिए भारत" class="box" required>
         </div>
         <div class="inputBox">
            <span>पिन कोड :</span>
            <input type="number" min="0" name="pin_code" placeholder="उदाहरण के लिए 123456" class="box" required>
         </div>
      </div>

      <input type="submit" name="order" class="btn <?= ($cart_grand_total > 1)?'':'disabled'; ?>" value="ऑर्डर प्लेस करें">

   </form>

</section>

<?php include 'footerhin.php'; ?>

<script src="js/script.js"></script>

</body>
</html>