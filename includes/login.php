<?php include "db.php"; ?>
<?php   
        if(isset($_POST['admin-login'])){               
            $user_email = $_POST['email'];
            $user_password = $_POST['password'];         
            
            $user_email = mysqli_real_escape_string($connection, $user_email);
            $user_password = mysqli_real_escape_string($connection,  $user_password);

            $string = "SELECT * FROM users WHERE email = '{$user_email}' ";
            $query = mysqli_query($connection, $string);             

            while($row = mysqli_fetch_assoc($query)){ 
                $user_id = $row['id'];
                $user_name = $row['name'];
                $user_email = $row['email'];
                $user_country_id = $row['country_id'];
                $user_company_id = $row['company_id'];
                $user_reward_role_id = $row['reward_role_id'];

                if(password_verify($user_password, $row['password'])){  
                    if($user_reward_role_id > 1) {
                        session_start();
                        $_SESSION['status'] = 'logged_in';
                        $_SESSION['id'] = $user_id;
                        $_SESSION['name'] = $user_name;                            
                        $_SESSION['email'] = $user_email;
                        $_SESSION['country_id'] = $user_country_id;                           
                        $_SESSION['company_id'] = $user_company_id;                           
                        $_SESSION['reward_role_id'] = $user_reward_role_id;
                        echo "<script> location.replace('../admin'); </script>";                            
                    } else {
                        echo "<script> location.replace('../admin-login.php?admin=no'); </script>";                                           
                    }   
                }else {
                    echo "<script> location.replace('../admin-login.php?password=no'); </script>"; 
                }
            }
        }
?>
<?php   if(isset($_POST['user-login'])){              
            $user_email = $_POST['email'];
            $user_password = $_POST['password'];    

            $user_email = mysqli_real_escape_string($connection, $user_email);
            $user_password = mysqli_real_escape_string($connection,  $user_password);

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
                    // $_SESSION['reward_role_id'] = $user_reward_role_id;
                    echo "<script> location.replace('../dashboard.php'); </script>"; 
                } else {                                  
                    echo "<script> location.replace('../index.php?password=no'); </script>";   
               }
           }               
       }
?>
