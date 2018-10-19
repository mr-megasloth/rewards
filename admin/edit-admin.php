
<?php include 'includes/admin-header.php'; ?>      
<?php include 'includes/admin-info.php'; ?> 
<?php include 'includes/admin-nav.php'; ?>
    <?php
        //get User ID to edit

        if(isset($_GET['u_id'])){
            $user_to_edit_id = $_GET['u_id'];   
        }    
    ?>


     <?php 
            //Update user role Form Submit
            if(isset($_POST['update_user_submit'])){

                $new_user_role = $_POST['new_reward_role'];
                
                $update_user_role_string = "UPDATE users SET ";
                $update_user_role_string .= "reward_role_id = {$new_user_role} "; 
                $update_user_role_string .= "WHERE id = {$user_to_edit_id} ";

                $update_user_role_query = mysqli_query($connection, $update_user_role_string);

                if(!$update_user_role_query) {
                    die('Query Failed ' . mysqli_error($connection));                    
                }

            }        
    ?>






    <div class="dash__content">
        <h3 class="title u-mar-b__huge">Edit Admin</h3>

        <?php 
            
            //Select current user
            $select_user_string = "SELECT * FROM users WHERE id = $user_to_edit_id";
            $select_user_query = mysqli_query($connection, $select_user_string);
        
            while($row = mysqli_fetch_assoc($select_user_query)) {         
                $user_name = $row['name'];
                $user_reward_role_id = $row['reward_role_id'];    
        ?>    
        
            <h6 class="sub-title u-mar-b__tiny"><?php echo $user_name; ?></h6>
            <form class="dash-form dash-form--admin" method="post" enctype="multipart/form-data">      
                <div class="dash-form__form-group">
                    <label for="challenge_country" class="dash-form__label dash-form__label--admin">Rewards Role</label>
                    <select name="new_reward_role" class="dash-form__select" name="challenge_country">
                        <?php 
                            //Select current user role at display as first option
                            $select_current_role_string = "SELECT * FROM rewards_role WHERE id = $user_reward_role_id";                           
                            $select_current_role_query = mysqli_query($connection,  $select_current_role_string); 

                            while($row = mysqli_fetch_assoc($select_current_role_query)){
                               $role_id = $row['id'];
                               $role_label = $row['label'];
                               echo "<option value='{$role_id}'>{$role_label}</option>";                   
                            }  
                        ?>      
                  
                        <?php 
                            //Select all but the current user role and display as option
                            $select_role_string= "SELECT * FROM rewards_role WHERE id != $user_reward_role_id";
                            $select_role_query = mysqli_query($connection, $select_role_string);                          

                            while($row = mysqli_fetch_assoc($select_role_query)){
                               $role_id = $row['id'];
                               $role_label = $row['label'];
                               echo "<option value='{$role_id}'>{$role_label}</option>";                   
                            }  
                        ?>                       
                    </select>
                </div>  
                <div class="dash-form__form-group dash-form__form-group--submit">
                    <input class="dash-form__submit" name="update_user_submit" value="Submit" type="submit">  
                </div>                                                
            </form> 

        <?php 
        }
        ?>

       
        
        
    </div>


<?php include 'includes/admin-footer.php'; ?>
  