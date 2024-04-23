<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = md5($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);

   if($select->rowCount() > 0){
      $message[] = 'उपयोगकर्ता ईमेल पहले से मौजूद है!';
   }else{
      if($pass != $cpass){
         $message[] = 'पासवर्ड की पुष्टि नहीं मेल खाती है!';
      }else{
         $insert = $conn->prepare("INSERT INTO `users`(name, email, password, image) VALUES(?,?,?,?)");
         $insert->execute([$name, $email, $pass, $image]);

         if($insert){
            if($image_size > 2000000){
               $message[] = 'छवि का आकार बहुत बड़ा है!';
            }else{
               move_uploaded_file($image_tmp_name, $image_folder);
               $message[] = 'सफलतापूर्वक पंजीकृत!';
               header('location:loginhin.php');
            }
         }

      }
   }

}

?>

<!DOCTYPE html>
<html lang="hi">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>रजिस्टर</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/components.css">

</head>
<body>

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
   
<section class="form-container">

   <form action="" enctype="multipart/form-data" method="POST">
      <h3>अब पंजीकृत करें</h3>
      <input type="text" name="name" class="box" placeholder="अपना नाम दर्ज करें" required>
      <input type="email" name="email" class="box" placeholder="अपना ईमेल दर्ज करें" required>
      <input type="password" name="pass" class="box" placeholder="अपना पासवर्ड दर्ज करें" required>
      <input type="password" name="cpass" class="box" placeholder="अपना पासवर्ड पुष्टि करें" required>
      <input type="file" name="image" class="box" required accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="अब पंजीकृत करें" class="btn" name="submit">
      <p>पहले से ही एक खाता है? <a href="loginhin.php">अब लॉगिन करें</a></p>
   </form>

</section>


</body>
</html>
