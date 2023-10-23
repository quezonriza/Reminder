<?php
  include_once("included/header.php");
?>
<br><br><br><br><br><br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>

    body {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    .main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: green;
        background-color: rgba(169, 193, 177, 0.867);
        padding: 20px;
        width: 30%;
        height: 50%;
        border-radius: 10px;
    }
    .first-form{
      display: flex;
      justify-content: center;
      flex-direction: column;
      gap: 40px;
      align-items: center; 
      margin-top: 5%;
  }
  .labels{
      display: inline-block;
      text-align: justify;
      width: 100px;
   
  }
  .inputfield input{
    border: 1px solid green;
    background-color: rgba(169, 193, 177, 0.867);
    padding: 10px;
    border-radius: 10px;
    outline: none;
  }

    /* CSS for the popping out effect */
@keyframes popOut {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}

/* Apply the animation to the input field when it's focused (clicked) */
.inputfield input:focus {
  animation: popOut 0.8s ease;
  border: 1px solid white;
}
  .login-part{
    display: flex;
    gap: 30px;
    color: green;
  }

  .login-part .login-btn{
    color: green;
    transition: all 0.8s ease;
    padding: 10px;
  }
  .login-part .login-btn:hover{
    background-color: white;
    color: green;
    transition: all 0.8s ease;
    } 

  .login-part a{
    text-decoration: underline;
    transition: all 0.8s ease;
  }

  .login-part a:hover{
    color: white;
    transition: all 0.8s ease;
  }

  .login-part{
    display: flex;
    gap: 130px;
    color: green;
  }

  .login-part .login-btn{
    border: none;
    background-color: green;
    color: white;
    padding: 10px;
    border-radius: 10px;
  }

  .register-part{
    display: flex;
    gap: 30px;
    color: green;
  }


  .register-part a{
    text-decoration: underline;
    transition: all 0.8s ease;
  }

  .register-part a:hover{
    color: white;
    transition: all 0.8s ease;
  }

</style>
<body>

<div class="main">
  <form class="first-form" action="authenticate.php" method="post">
    <h1>LOGIN</h1>
    <div class="inputfield">
      <label class="labels" for="">Username:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="inputfield">
      <label class="labels" for="">Password:</label>
      <input type="password" name="password" required>
    </div>
    <div class="login-part">
      <a class="forgotpass" href="">Forgot Password ?</a>
      <input class="login-btn" type="submit" value="Login">
    </div>
    <div class="register-part">
      <label for="">Dont Have an Account Yet?:</label>
      <a href="registration-form.php" class="register-btn">Register Now</a>
    </div>
  </form>
</div>

</body>
</html>
<br><br><br><br><br><br>

<?php
  include_once("included/footer.php");
?>