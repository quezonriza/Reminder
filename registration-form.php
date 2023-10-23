<?php
  include_once("included/header.php");
?>

<br><br><br><br><br><br><br><br><br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Registration form</title>
</head>

<style>

  
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: rgba(0, 0, 0, 0.6); 
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
  }



  .login-part a{
    text-decoration: underline;
    transition: all 0.8s ease;
  }

  .login-part a:hover{
    color: white;
    transition: all 0.8s ease;
  }

  .first-form{
      display: flex;
      justify-content: center;
      flex-direction: column;
      gap: 50px;
      align-items: center; 
      margin-top: 10%;
  }

  .labels{
      display: inline-block;
      text-align: justify;
      width: 100px;
   
  }

  .gender{
      display: inline-block;
      text-align: justify;
      width: 30px;

  }

  .genderfield{
    display: flex;
    gap: 40px
  }


/* CSS for the smooth hovering effect */
  .register-btn{
    color: rgb(216, 224, 229);
    background-color: green;
    text-decoration: none;
    padding: 5px;
    border-radius: 10px;
    border: none;
    width: 30%;
    margin-left: 70%;
    transition: all 0.8s ease;
  }

  .register-btn:hover {
    background-color: white;
    color: green;
    transition: all 0.8s ease;
}

</style>

<body>

<div class="main">
  <form class="first-form" action="store-registration-data.php" method="post">
    <h1>REGISTER NOW</h1>
    <div class="inputfield">
        <label class="labels" for="">Username:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="inputfield">
        <label class="labels" for="">Password:</label>
        <input type="password" name="password" required>
    </div>
    <div class="genderfield">
        <label class= "gender" for="">Male:</label>
        <input type="radio" name="gender" id="male" value="male" required>

        <label class= "gender" for="">Female:</label>
        <input type="radio" name="gender" id="female"value ="female" required>

        <label class= "gender" for="">Others:</label>
        <input type="radio" name="gender" id="others" value ="others" required>
    </div>
    <input class="register-btn" type="submit" value="Submit">
    <div class="login-part">
      <label for="">Already have an account?</label>
      <a class="login-btn" href="login.php">Login</a>
    </div>
</form>
</div>

</body>
</html>

<br><br><br><br><br><br><br><br>
<?php
  include_once("included/footer.php");
?>