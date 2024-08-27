<?php
  include "./database/POD-Connection.php";

  $error='';
  $successERR='';

  if(isset($_POST['sub'])){
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $result = $conn->prepare('SELECT * FROM users WHERE phone=? AND password=?');
    $result->bindValue(1, $phone);
    $result->bindValue(2, $password);
    $result->execute();
    if($result->rowCount() >= 1){
      $successERR="ورود با موفقیت انجام شد، درحال رفتن به پنل کاربری...";
    }
    else{
      $error='شماره تلفن یا رمز عبور معتبر نیست !';
    }
  }


?>


<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <title>Login</title>
  </head>
  <body>
  
    <div class="errorContainer">
      <span class="validation-msgF" style="direction: rtl;"><?php echo $error; ?></span>
      <span class="validation-msgT" style="direction: rtl;"><?php echo $successERR; ?></span>
    </div>

    <div class="validation">
      <div class="signUp">
        <form action="" method="POST">
          <p class="signUp-form__title title">ورود</p>
          <p class="signUp-form__subtitle subtitle">
            حسابی برای ورود ندارید ؟ <a href="">ثبت نام</a>
          </p>

          <div class="input-signUp form-signUp__phoneNumber">
            <input type="text" name="phone" placeholder="شماره تلفن" />
            <i class="bx bx-phone" style="color: #919191"></i>
          </div>
          <div class="input-signUp form-signUp__password">
            <input type="password" name="password" placeholder="رمز عبور" />
            <i class="bx bx-lock-alt" style="color: #919191"></i>
          </div>
          <button class="signUpBtn" type="submit" name="sub">ورود</button>
        </form>
      </div>
      <div class="signIn"></div>
    </div>

    <script src="./script.js"></script>
  </body>
</html>
