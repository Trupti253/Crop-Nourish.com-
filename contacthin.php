<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:loginhin.php');
};

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $msg = $_POST['msg'];
   $msg = filter_var($msg, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `message` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $select_message->execute([$name, $email, $number, $msg]);

   if($select_message->rowCount() > 0){
      $message[] = 'पहले से ही संदेश भेज दिया गया है!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `message`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
      $insert_message->execute([$user_id, $name, $email, $number, $msg]);

      $message[] = 'संदेश सफलतापूर्वक भेजा गया है!';

   }

}

?>

<!DOCTYPE html>
<html lang="hi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>संपर्क</title>

   <!-- फ़ॉन्ट अद्भुत cdn लिंक  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- कस्टम सीएसएस फ़ाइल लिंक  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'headerhin.php'; ?>

<section class="contact">

   <h1 class="title">संपर्क में रहें</h1>

   <form action="" method="POST">
      <input type="text" name="name" class="box" required placeholder="अपना नाम दर्ज करें">
      <input type="email" name="email" class="box" required placeholder="अपना ईमेल दर्ज करें">
      <input type="number" name="number" min="0" class="box" required placeholder="अपना नंबर दर्ज करें">
      <textarea name="msg" class="box" required placeholder="अपना संदेश दर्ज करें" cols="30" rows="10"></textarea>
      <input type="submit" value="संदेश भेजें" class="btn" name="send">
   </form>

</section>








<?php include 'footerhin.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
