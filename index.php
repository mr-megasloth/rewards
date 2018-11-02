<?php include "includes/db.php";?>
<?php include "includes/header.php"; ?>
<?php
    if(isset($_GET['password']) == 'no'){ 
        echo "<script>";
        echo "$(function(){";
        echo "$('.form__error--password').addClass('form__error--active');";
        echo "});";
        echo "</script>"; 
    }
    if(isset($_GET['logout']) == 'yes'){ 
        echo "<script>";
        echo "$(function(){";
        echo "$('.form__error--logout').addClass('form__error--active');";
        echo "});";
        echo "</script>"; 
    }
?>
    <main> 
        <header class="header u-wrap">
            <div class="header__logo-cont">
                <img src="assets/images/flyhigher-reward-logo.png" alt="Ingram FlyHigher Rewards, Partner Incentive Program" class="header__logo">
            </div>
         
            <div class="header__right">
                <div class="header__ingram-logo-cont">
                    <img src="assets/images/ingram-logo-blue.png" alt="Ingram Logo" class="header__ingram-logo">
                </div>
                <div class="country-select">
                    <a href="" class="country-select__logout-link">Logout</a>
                    <a href="admin-login.php" class="country-select__admin-link">Admin?</a>                    
                </div>
            </div>           
        </header>
        <section class="dash dash--login u-wrap">
            <div class="login">
                <form class="form" method="post"  action="includes/login.php">                    
                    <div class="form__group">
                        <label class="form__label" for="ingramid">Email Address</label>
                        <input class="form__input form__input--email" type="email" name="email" required="">
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="password">Password</label>
                        <input class="form__input form__input--pass" type="password" name="password" required="">
                    </div>
                  
                    <input class="btn" name="user-login" value="SIGN IN" type="submit"> 
                    <p class="form__error form__error--password">The password you entered was incorrect</p>
                    <p class="form__error form__error--logout">You have logged out</p>
                </form>
            </div>
        </section>      
    </main>
<?php include "includes/footer.php"; ?>