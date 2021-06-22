<?php
  include("classes/connect.php");
  include("classes/signup.php");

  $first_name = "";
  $last_name = "";
  $gender = "";
  $email = "";

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $signup = new Signup();
    $result =  $signup->evaluate($_POST);


    if($result != "") {
      echo "<div style = 'text-align:center; font-size:12px; color:white; background-color:grey'>";
      echo "<br />The following errors occured <br /> <br />";
      echo $result;
      echo "</div>";
    } else {
        header("Location:login.php");
        die;
    }




    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

  }

?>
<html>
<head>
  <title>MyBook | Signup</title>
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
    height:540px;
    margin:auto;
    margin-left: 700px;
    margin-top:60px;
    padding:10px;
    padding-top: 40px;
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
        Log in
      </div>
  </div>



  <div id = "login1">
    MyBook
    <p>
      Connect with friends and the world around you on MyBook.
    </p>
  </div>

  <div id = "login3">
    Sign up to MyBook
    <br /><br />

    <form action = "" method = "post">
      <input value = "<?php echo $first_name ?>" name = "first_name" type = "text" id = "text"  placeholder="First name"/><br /><br />
      <input value = "<?php echo $last_name ?>"  name = "last_name" type = "text" id = "text" placeholder="Last name"/><br /><br />
      <span style = "font-weight:normal;">
        Gender:
      </span>
      <br /><br />
      <select  id = "text" name = "gender">
        <option>
          <?php echo $gender ?>
        </option>
        <option>
          Male
        </option>
        <option>
          Female
        </option>
      </select>
      <br /><br />
      <input value = "<?php echo $email ?>"  name = "email" type = "text" id = "text" placeholder="Email"/><br /><br />


      <input name = "password" type = "password" id = "text" placeholder="Password"/><br /><br />
      <input name = "password2" type = "password" id = "text" placeholder="Retype Password"/><br /><br />
      <input type = "submit" id = "button" value = "Sign up"/><br />
    </form>



  </div>
</body>
</html>
