<?php 

    require_once('database.php');
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($data = $conn -> prepare('SELECT id, username, password FROM users WHERE username = ?')){
            $data-> bind_param('s', $_POST['username']);
            $data -> execute();
            $data -> store_result();

            if($data -> num_rows > 0){
                $data -> bind_result($id, $username, $password);
                $data -> fetch();

                if(password_verify($_POST['password'], $password)){
                    session_regenerate_id();

                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['sessionUsername'] = $username;
                    $_SESSION['sessionID'] = $id;

                    header("Location: index.php");
                    exit;
                } else {
                    echo '
                        <script type="text/javascript">
                            alert("Kullanıcı adı veya şifre yanlış!")
                        </script>
                    ';
                }
            } else {
                echo 'Eşleşmede bir sıkıntı var!';
            }
        }
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
        <button>Giriş Yap</button>
    </div>
    </header>

    <div class="login-box">
      <h2>To-Do List Uygulaması</h2>
      <h3>Giriş Yap</h3>
      <form method="post" autocomplete="off">
        <div class="form-group">
          <label for="username">Kullanıcı Adı</label>
          <input type="text" id="username" name="username" placeholder="Kullanıcı adınızı girin">
        </div>
        <div class="form-group">
          <label for="password">Şifre</label>
          <input type="password" id="password" name="password" placeholder="Şifrenizi girin">
        </div>
        <button type="submit" class="btn">Giriş Yap</button>
      </form>
      <p>Henüz kayıt olmadınız mı? <a href="register.php">Kayıt olun</a></p>
    </div>

    <footer>
        <div class="footer-content">
            <p><a href="https://www.titanhaxz.com/">Titanhaxz</a> tarafından yapılmıştır!</p>
        </div>
    </footer>


  </body>
</html>