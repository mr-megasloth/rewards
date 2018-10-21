<?php include "includes/db.php";?>
<?php include "includes/header.php"; ?>
<?php   if(isset($_POST['login'])){   
           
            $user_email = $_POST['email'];
            $user_password = $_POST['password'];             

            $login_string = "SELECT * FROM users WHERE email = '$user_email' ";
            $login_query = mysqli_query($connection, $login_string);             

            while($row = mysqli_fetch_assoc($login_query)){ 
                $user_id = $row['id'];
                $user_name = $row['name'];
                $user_email = $row['email'];
                $user_country_id = $row['country_id'];
                $user_company_id = $row['company_id'];               

                if(password_verify($user_password, $row['password'])){  
                    session_start();
                    $_SESSION['status'] = 'logged_in';
                    $_SESSION['id'] = $user_id;
                    $_SESSION['name'] = $user_name;
                    $_SESSION['email'] = $user_email;
                    $_SESSION['country_id'] = $user_country_id;
                    $_SESSION['company_id'] = $user_company_id;
                    $_SESSION['reward_role_id'] = $user_reward_role_id;
                    echo "<script> location.replace('dashboard.php'); </script>"; 
                } else {
                                   
                    echo "<script>";
                    echo    "$(function(){";
                    echo       "$('.form__error--password').addClass('form__error--active');";
                    echo    "});";
                    echo "</script>";
                }
            }               
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
                <form class="form" method="post"  action="index.php">                    
                    <div class="form__group">
                        <label class="form__label" for="ingramid">Email Address</label>
                        <input class="form__input form__input--email" type="email" name="email" required="">
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="password">Password</label>
                        <input class="form__input form__input--pass" type="password" name="password" required="">
                    </div>
                  
                    <input class="btn" name="login" value="SIGN IN" type="submit"> 
                    <p class="form__error form__error--password">The password you entered was incorrect</p>
                </form>
            </div>
        </section>      
    </main>
<?php include "includes/footer.php"; ?>