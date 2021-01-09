<?php 
require_once 'admin/pages/inc-functions.php'; //veritabanındaki sayfa geçişi sağlamak 
if(@$_POST["submit"]){
  $ad=htmlspecialchars($_POST["name"] ,ENT_QUOTES ,'UTF-8'); //htmlin de algılayabileceği şekilde post metodu kullandım.
  $email=htmlspecialchars($_POST["email"] ,ENT_QUOTES ,'UTF-8');
  $tel=htmlspecialchars($_POST["phone"] ,ENT_QUOTES ,'UTF-8');
  $mesaj=htmlspecialchars($_POST["message"] ,ENT_QUOTES ,'UTF-8');
 
  $ekle=$db->prepare("INSERT INTO `iletisim` ( `ad`, `email`, `tel`, `mesaj`) 
  VALUES (:ad, :email, :tel , :mesaj ) ");
  $ekle->bindValue(":ad" , $ad , PDO::PARAM_STR);
  $ekle->bindValue(":email" , $email , PDO::PARAM_STR);
  $ekle->bindValue(":tel" , $tel , PDO::PARAM_STR);
  $ekle->bindValue(":mesaj" , $mesaj , PDO::PARAM_STR);
  
     if($ekle->execute()) {
     header("Location: iletisim.php?i=ok"); //eğer başarılıysa burası çalışacak
 } else {
     //print_r($ekle->errorInfo());
     header("Location: iletisim.php?i=hata");
    }  
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>İLETİŞİM</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <?php require 'includes/inc-menu.php'; ?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/3.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>iLETİŞİM</h1>
            <span class="subheading">BENİMLE İLETİŞİME GEÇİNİZ.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p> Lütfen Formu Tam Doldurunuz. Sizinle En Kısa Sürede İletişime Geçeceğiz.</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <form action="iletisim.php#bildiri"  method="POST">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Adınız Soyadınız</label>
              <input type="text" class="form-control" placeholder="Adınız Soyadınız" name="name" required data-validation-required-message="Lütfen Adınızı ve Soyadınızı giriniz!">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>E-mail Adresi</label>
              <input type="email" class="form-control" placeholder="E-mail Adresiniz" name="email" required data-validation-required-message="Lütfen E-mail Adresinizi giriniz!">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Telefon</label>
              <input type="tel" class="form-control" placeholder="Telefon Numaranız" name="phone" required data-validation-required-message="Lütfen Telefon Numaranızı giriniz!">
              <p class="help-block text-danger"></p>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Mesajınız</label>
              <textarea rows="5" class="form-control" placeholder="Mesajınız" name="message" required data-validation-required-message="Lütfen Mesajınızı giriniz!"></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>

          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Gönder" >           
          </div>
          <div id="bildiri"> </div>
            <?php
            if(@$_GET["i"]=="ok"){
              echo '<p class="text-center alert alert-success">Mesaj Başarıyla Gönderildi.</p>'; //yeşil yazması için              
            } else if(@$_GET["i"]=="hata") {
              echo '<p class="text-center alert alert-danger">Mesaj Gönderilirken Hata Oluştu.</p> '; //kırmızı yazması için
            }
          ?>

        </form>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <?php require 'includes/inc-footer.php'; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <!-- <script src="js/contact_me.js"></script> -->

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
