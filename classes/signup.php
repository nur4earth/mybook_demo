<?php

class Signup
{
  private $error = "";
  public function evaluate($data)
  {
    foreach($data as $key=>$value) {
      if(empty($value))
      {
        $this->error .= $key . " is empty!<br />";
      }
      if($key == "email")
      {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
          $this->error .= " invalid email address!<br />";
        }
      }
      if($key == "first_name")
      {
        if (is_numeric($value)) {
          $this->error .= " first name cant be a number !<br />";
        }
        if(strstr($value, " ")) {
          $this->error .= " first name cant have spaces !<br />";
        }

      }
      if($key == "last_name")
      {
        if (is_numeric($value)) {
          $this->error .= " last name cant be a number !<br />";
        }
        if(strstr($value, " ")) {
          $this->error .= " last name cant have spaces !<br />";
        }
      }
    }





    if($this->error  == "") {


        // no error
        $this->create_user($data);


    }
    else {
      return $this->error;
    }
  }
  public function create_user($data)
  {

    $first_name = ucfirst($data['first_name']);
    $last_name = ucfirst($data['last_name']);
    $gender = $data['gender'];
    $email = $data['email'];
    $password = $data['password'];

    //create these

    $url_address = strtolower($first_name) . "." . strtolower($last_name);
    $userid = $this->create_userid();


    $query = "INSERT INTO users (userid,first_name,last_name,gender,email,password,url_address)
    VALUES ('$userid','$first_name','$last_name','$gender','$email','$password','$url_address')";

    $DB = new Database();
    $DB->save($query);
  }


  private function create_userid()
  {
    $length = rand(4,19);
    $number = "";
    for($i = 0; $i < $length; $i++) {
      $new_rand = rand(0,9);
      $number.= $new_rand;
    }
    return $number;
  }


}
