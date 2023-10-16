<?php
session_start(!isset($_SESSION['user'])){
    header('location:login.php'); 
}
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['user']);
    header('location:login.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once './LoginAndRegister/views/partials/head.php'; ?>
</head>
<body>
    <?php include_once './LoginAndRegister/views/partials/navbar.php'; ?>
    <?php if(issert($_SESSION['user'])):?>
        <div class="my-5 p-3 container w-50 mx-auto text-center">
            <h2>Welcome <span class="text-sucess">
                <?php echo $_SESSION['user']?>
            </span></h2>
            <a href="home.php?logout=1" class="btn btn-danger my-2"> Logout</a>
        
        </div>
        <h2 class="my-4 text-center">Home Page</h2>
    <?php include_once './LoginAndRegister/views/partials/footer.php' ?>
</body>
</html>