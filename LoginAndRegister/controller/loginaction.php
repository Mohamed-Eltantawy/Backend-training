<?php
  require_once './includes/connection.php';
  session_start();
  $errors = array();
  if(isset($post['login'])) {
     $user = mysqli_real_escape_string($conn , $_POST['username']);
     $password = mysqli_real_escape_string($conn , $_POST['password'] );
     if(empty($user) or empty($password)){
        array_push($errors , 'all inputs are required!');

     }
     if(count($errors) ==0){
        $pass =md5($password);
        $sql="SELECT * FROM users WHERE useranme ='$user'
        AND password='$pass'";
        $resul=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)==1){
            $_SESSION['user']=$user;
            header('lcation:home.php');
    
        }else{
            array_push(($errors , "invalid username or password"));
        
        }
     }else {
        header('location:./views/pages/login.php');
     }

  }