<?php 

  require_once('database.php');

  session_start();

  if(isset($_SESSION['loggedin'])){
    $userID = $_SESSION['sessionID'];
    $userName = $_SESSION['sessionUsername'];

  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>To-Do List App - Giriş Yap</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
  <header>
    <div class="logo">
        <h1>To-Do</h1>
    </div>
    <div class="login">
      <?php 

        if(isset($_SESSION['loggedin'])){
          echo '
            <button>'. $userName .'</button>
            <button>Çıkış Yap</button>
          ';
        } else {
          echo '
            <button>Giriş Yap</button>
          ';
        }
      
      ?>
        
    </div>
    </header>

    <div class="login-box">
    <h2>To-Do List Uygulaması</h2>
      <?php 
        if(isset($_SESSION['loggedin'])){
          echo '
            Giriş Yapılmış
            <div class="message-box">
              <div class="message-text"></div>
            </div>
            <div class="message-input-wrapper">
              <input type="text" id="message-input" class="message-input" placeholder="Mesajınızı buraya yazın...">
              <button id="send-button" class="message-send">Gönder</button>
            </div>
          ';
          
        } else {
          echo '
            
        
            <p>Henüz kayıt olmadınız mı? <a href="register.php">Kayıt olun</a></p>
            <p>Hesabınız var mı? <a href="login.php">Giriş Yapın</a></p>
          
          ';
        }
      ?>
      
    </div>

    <footer>
        <div class="footer-content">
            <p><a href="https://www.titanhaxz.com/">Titanhaxz</a> tarafından yapılmıştır!</p>
        </div>
    </footer>


  </body>
</html>
