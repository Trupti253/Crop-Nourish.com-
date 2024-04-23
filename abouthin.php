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
   <title>विषयवस्तु</title>

   <!-- फ़ॉन्ट अद्भुत cdn लिंक  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- कस्टम सीएसएस फ़ाइल लिंक  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'headerhin.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/about-img-1.png" alt="">
         <h3>हमारा चयन क्यों?</h3>
         <p>कॉर्पनॉरिश में, हम कई प्रमुख क्षेत्रों में उत्कृष्टता प्राप्त करते हैं। हमारी गुणवत्ता के प्रति प्रतिबद्धता यह सुनिश्चित करती है कि हमारे उर्वरक सर्वोच्च मानकों को पूरा करते हैं। अनुभवी पेशेवरों की टीम के साथ, हम आपकी विशेष आवश्यकताओं के लिए विशेषज्ञ सलाह प्रदान करते हैं। ग्राहक संतुष्टि हमारे व्यापार का केंद्र है, और हम आपकी उम्मीदों को पार करने का प्रयास करते हैं। इसके अलावा, हम नवाचार को समर्पित हैं, अपनी फसल उत्पादन को अधिकतम करने के लिए कटिंग-एज उर्वरक समाधानों का निरंतर विकसन करते हैं</p>
         <a href="contacthin.php" class="btn">हमसे संपर्क करें</a>
      </div>

      <div class="box">
         <img src="images/about-img2.png" alt="">
         <h3>हम क्या प्रदान करते हैं?</h3>
         <p>हमारे प्रस्ताव विभिन्न फसलों और मिट्टी के प्रकारों को सुविधाजनक करने के लिए एक विविध रेंज के उर्वरक शामिल हैं। हम पर्यावरण के अनुकूल विकसन योजनाओं के लिए पर्यावरण के अनुकूल उर्वरक भी प्रदान करते हैं। वे जिनकी विशेष आवश्यकताएं हैं, हम उन्हें अपनी विशेषज्ञता के अनुसार अनुकूलित उर्वरक मिश्रण प्रदान करते हैं। इसके अतिरिक्त, हम आपकी सफलता के लिए समर्थन प्रदान करते हैं, अपनी खेती की प्रथाओं को बढ़ावा देने के लिए संसाधनों और मार्गदर्शन प्रदान करते हैं</p>
         <a href="shophin.php" class="btn">हमारी दुकान</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">हमारी टीम</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/trupti.jpg" alt="">
         <p>डेवलपर</p>
         <div class="stars">
         <a href="mailto:trupti.gunjal21@pccoepune.org"><i class="fa fa-envelope"></i></a>
         <a href="https://www.linkedin.com/in/maheshdargad/"><i class="fab fa-linkedin-in"></i></a>
         <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
         <a href="https://github.com/"><i class="fab fa-github"></i></a>
         </div>
         <h3>त्रुप्ति गुंजल</h3>
      </div>

      <div class="box">
         <img src="images/mahesh.jpg" alt="">
         <p>डेवलपर</p>
         <div class="stars">
         <a href="mailto:mahesh.dargad21@pccoepune.org"><i class="fa fa-envelope"></i></a>
         <a href="https://www.linkedin.com/in/trupti-gunjal-0970ba22a/"><i class="fab fa-linkedin-in"></i></a>
         <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
         <a href="https://github.com/"><i class="fab fa-github"></i></a>
         </div>
         <h3>महेश डरगड़</h3>
      </div>

      <div class="box">
         <img src="images/ashwini.jpg" alt="">
         <p>डेवलपर</p>
         <div class="stars">
         <a href="mailto:ashwini.harode21@pccoepune.org"><i class="fa fa-envelope"></i></a>
         <a href="https://www.linkedin.com/in/ashwini-harode-b4328922a/"><i class="fab fa-linkedin-in"></i></a>
         <a href="https://twitter.com/harode17398"><i class="fab fa-twitter"></i></a>
         <a href="https://github.com/Ashwiniharode0"><i class="fab fa-github"></i></a>
         </div>
         <h3>आश्विनी हरोड़े</h3>
      </div>

   </div>

</section>


<?php include 'footerhin.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
