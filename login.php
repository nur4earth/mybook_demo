<?php
  session_start();

  include("classes/connect.php");
  include("classes/login.php");

  $email = "";
  $password = "";

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = new Login();
    $result =  $login->evaluate($_POST);


    if($result != "") {
      echo "<div style = 'text-align:center; font-size:12px; color:white; background-color:grey'>";
      echo "<br />The following errors occured <br /> <br />";
      echo $result;
      echo "</div>";
    } else {
        header("Location:profile.php");
        die;
    }



    $email = $_POST['email'];
    $password = $_POST['password'];


  }

?>


<html>
<head>
  <title>MyBook | Log in</title>
  <link rel = "stylesheet" href = "css\style.css"/>
</head>
<style>
  #login0 {
    height:100px;
    background-color: rgb(59,89,152);
    color:#d9dfeb;
    font-size:40px;
    padding:5px;
  }
  #login1 {
    color:#1877F2; font-size: 40px;
    position: fixed;
    width: 430px;
    height: 106px;
    left: 110px;
    top: 321px;
    text-align: center;
    font-weight: bolder;
    padding:20px;
  }
  #login1>p {
    font-family: Arial;
    font-style: normal;
    font-weight: normal;
    font-size: 28px;
    line-height: 32px;
    color: #1C1E21;
  }

  #signup_button {
    background-color: #42b72a;
    width:70px;
    font-size: 20px;
    text-align: center;
    padding:4px;
    border-radius: 4px;
    float:right;
  }

  #login3 {
    background-color: white;
    width:700px;
    height:350px;
    margin:auto;
    margin-left: 700px;
    margin-top:120px;
    padding:10px;
    padding-top: 50px;
    text-align: center;
    font-weight: bold;
  }
  #text {
    height:40px;
    width:300px;
    border-radius: 4px;
    border: solid 1px #ccc;
    padding:4px;
    font-size: 14px;
  }
  #button {
    width:300px;
    height:40px;
    border-radius: 4px;
    font-weight: bold;
    border:none;
    background-color: rgb(59,89,152);
    color:white;
  }

</style>









<body style = "background : #F0F2F5; font-family:tahoma;">
  <div id = "login0">
      <div style = "font-size:40px;">
        MyBook
      </div>
      <div id = "signup_button">
        Signup
      </div>
  </div>



  <div id = "login1">
    MyBook
    <p>
      Connect with friends and the world around you on MyBook.
    </p>
  </div>

  <div id = "login3">
    <form  method = "post">
      Log in to MyBook
      <br /><br />

      <input name = "email" value = "<?php echo $email?>" type = "text" id = "text" placeholder="Email"/><br /><br />
      <input name  = "password" value = "<?php echo $password ?>" type = "password" id = "text" placeholder="Password"/><br /><br />
      <input type = "submit" id = "button" value = "Log in"/>
    </form>

  </div>
</body>
</html>
