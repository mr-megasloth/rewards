<?php include "includes/db.php";?>
<?php   if(isset($_POST['login'])){    
            $user_type = $_POST['user_type'];
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
                $user_reward_role_id = $row['reward_role_id'];

                if(password_verify($user_password, $row['password'])){              
                    if($user_type ==  'admin'){                       
                        if($user_reward_role_id > 1) {
                            session_start();
                            $_SESSION['status'] = 'logged_in';
                            $_SESSION['id'] = $user_id;
                            $_SESSION['name'] = $user_name;                            
                            $_SESSION['email'] = $user_email;
                            $_SESSION['country_id'] = $user_country_id;                           
                            $_SESSION['company_id'] = $user_company_id;                           
                            $_SESSION['reward_role_id'] = $user_reward_role_id;
                            echo "<script> location.replace('admin'); </script>";                            
                        } else {
                            echo "<script> location.replace('index.php?admin=no'); </script>";      
                        }                       
                    } else if($user_type = 'reseller'){
                        session_start();
                        $_SESSION['status'] = 'logged_in';
                        $_SESSION['id'] = $user_id;
                        $_SESSION['name'] = $user_name;
                        $_SESSION['email'] = $user_email;
                        $_SESSION['country_id'] = $user_country_id;
                        $_SESSION['company_id'] = $user_company_id;
                        $_SESSION['reward_role_id'] = $user_reward_role_id;
                        echo "<script> location.replace('dashboard.php'); </script>";         
                    }
                } else {                  
                    echo "<script> $('.form__error--password').addClass('form__error--active'); </script>";
                }                
                $user_id = $row['id'];
                $user_name = $row['name'];
                $user_company_id = $row['company_id'];
            }
        }
?>
<?php
    if(isset($_GET['admin']) == 'no') {
        echo "<script> $('.form__error--not-admin').addClass('form__error--active'); </script>";
    }
?>
<?php include "includes/header.php"; ?>
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
                    <a href="javascript:;" class="country-select__link">
                        <i class="country-select__icon fas fa-chevron-down"></i>
                        <p class="country-select__current">United Kingdom</p>
                    </a>
                  
                    <ul class="country-select__dropdown">
                        <li class="country-select__dropdown-item"><a href="javascript:;" class="country-select__dropdown-link">Slovenia</a></li>
                        <li class="country-select__dropdown-item"><a href="javascript:;" class="country-select__dropdown-link">Spain</a></li>                                  
                    </ul>
                </div>
            </div>
           
        </header>
        <section class="dash dash--login u-wrap">
            <div class="login">
                <form class="form" method="post"  action="index.php">
                    <div class="form__group">
                        <label class="form__label" for="user_type">User Type</label>
                        <select class="form__select" name="user_type">
                            <option class="form__option" value="reseller">Reseller</option>
                            <option class="form__option" value="admin">Admin</option>                           
                        </select>
                    </div>
                    <p class="form__error form__error--not-admin">You do not have Admin rights on flyHigher Reward, please contact <a href="mailto:flyhiger@itsice.com">flyhiger@itsice.com</a></p>
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