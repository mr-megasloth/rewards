
<?php include "../includes/db.php"; ?>
<?php include "admin-functions.php"; ?>
<?php session_start(); ?>
<?php 
if(isset($_SESSION['status'])){
    $user_id = $_SESSION['id'];
    $user_name = $_SESSION['name'];
    $user_email = $_SESSION['email'];
    $user_country_id = $_SESSION['country_id'];
    $user_company_id = $_SESSION['company_id'];
    $user_reward_role_id = $_SESSION['reward_role_id'];
} else {
    echo "<script> location.replace('../index.php?logout=yes');</script>";
}
  
?>
<?php 
if(isset($_GET['logout'])){
    $logout_status = $_GET['logout'];
    if($logout_status == 'true') {
        session_destroy(); 
        $_SESSION = array();
        echo "<script> location.replace('../index.php?logout=yes');</script>";      
    }
}
?>

<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="notranslate">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="CunJtVDmE9G6aCcmGxprdf0uinHdJCRkcnHgMXe6">   
    <title>Ingram</title>  
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
</head>

<body>
    <main> 
        <header class="header u-wrap">
            <div class="header__logo-cont">
                <img src="../assets/images/flyhigher-reward-logo.png" alt="Ingram FlyHigher Rewards, Partner Incentive Program" class="header__logo">
            </div>         
            <div class="header__right">
                <div class="header__ingram-logo-cont">
                    <img src="../assets/images/ingram-logo-blue.png" alt="Ingram Logo" class="header__ingram-logo">
                </div>
                <div class="country-select">
                    <a href="index.php?logout=true" class="country-select__logout-link country-select__logout-link--active">Logout</a>                 
                </div>
            </div>
        </header>
        <section class="dash dash--admin">
            