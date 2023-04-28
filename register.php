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
      <form action="giris.php" method="post">
        <div class="form-group">
          <label for="nickname">Kullanıcı Adı</label>
          <input type="text" id="nickname" name="nickname" placeholder="Kullanıcı adınızı girin">
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
