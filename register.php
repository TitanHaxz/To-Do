<?php 

  require_once('database.php');

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($data = $conn -> prepare('SELECT id, username, password FROM users WHERE username = ?')){
      $data -> bind_param('s', $_POST['username']);
      $data -> execute();
      $data -> store_result();

      if($data -> num_rows > 0){
        echo '
          <script type="text/javascript">
            alert("Username exists, please choose another!")
          </script>
        ';
      } else if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
        echo '
          <script type="text/javascript">
            alert("Username exists, please choose another!")
          </script>
        ';
      } else {
        if($data = $conn -> prepare('INSERT INTO users (username, password) VALUES (?, ?)')){
          $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $data -> bind_param('ss', $_POST['username'], $password);
          $data -> execute();
          
          header("Location: index.php");
          exit;
          
        }
      }

    $data -> close();
    }
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>To-Do List - Kayıt Oluştur</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
  <header>
    <div class="logo">
        <h1>To-Do</h1>
    </div>
    <div class="login">
        <button>Giriş Yap</button>
    </div>
    </header>

    <div class="login-box">
      <h2>To-Do List Uygulaması</h2>
      <h3>Kayıt Ol</h3>
      <form method="post" autocomplete="off">
        <div class="form-group">
          <label for="username">Kullanıcı Adı</label>
          <input type="text" id="username" name="username" placeholder="Kullanıcı adınızı girin">
        </div>
        <div class="form-group">
          <label for="password">Şifre</label>
          <input type="password" id="password" name="password" placeholder="Şifrenizi girin">
        </div>
        <button type="submit" class="btn">Kayıt Ol</button>
      </form>
      <p>Zaten bir hesabınız var mı? <a href="index.php">Giriş Yap</a></p>
    </div>

    <footer>
        <div class="footer-content">
            <p><a href="https://www.titanhaxz.com/">Titanhaxz</a> tarafından yapılmıştır!</p>
        </div>
    </footer>


  </body>
</html>
