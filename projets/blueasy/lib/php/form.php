<?php

  //
  if(
    isset($_POST)
  ){
    if(!preg_match('#^[a-z0-9-_.]{3,}@[a-z0-9-_.]{2,}\.[a-z0-9-_.]{2,}$#i',$_POST['email'])){
      echo json_encode("⛔ Error : You must write your name like : 'john.doe@webmail.com'.");
    }
    elseif(!preg_match('#[a-z0-9-_."]{2,}#',$_POST['name'])){
      echo json_encode("⛔ Error : You must write your name like : 'John Doe'.");
    }
    elseif(empty($_POST['message'])){
      echo json_encode("⛔ Error : You must write a message. It's mean any characters.");
    }
    else{
      echo json_encode("☕ Thank for your message ".$_POST['name'].".");
    }
  }
  else{
    echo json_encode("☠ Error : each field is required and something missing.");
  }
