<?php include 'includes/admin-header.php'; ?>      
<?php include 'includes/admin-info.php'; ?> 
<?php include 'includes/admin-nav.php'; ?><?php
if(isset($_GET['c_id'])){
    //Get Values from the Database
    //Select the Challenge from the database and assign it's columns to variables.  
    $challenge_id = $_GET['c_id'];    
    $select_challenge_string = "SELECT * FROM challenges_personal WHERE id = $challenge_id";
    $select_challenge_query = mysqli_query($connection, $select_challenge_string);

    while($row = mysqli_fetch_assoc($select_challenge_query)){
        $cur_challenge_name = $row['name'];
        $cur_challenge_title = $row['title'];
        $cur_challenge_description = $row['description'];
        $cur_challenge_dasboard_icon = $row['dashboard_icon'];
        $cur_challenge_country_id = $row['country_id'];        

        //Work out Country Name
        $select_cur_country_name_string = "SELECT * FROM countries WHERE id = $cur_challenge_country_id";
        $select_cur_country_name_query = mysqli_query($connection, $select_cur_country_name_string);        
        while($countryRow = mysqli_fetch_assoc($select_cur_country_name_query)){
            $cur_challenge_country_name = $countryRow['label'];
        }

        $cur_challenge_partner_id = $row['partner_id'];        

        //Work out partner Name
        $select_cur_partner_name_string = "SELECT * FROM companies WHERE id = $cur_challenge_partner_id";
        $select_cur_partner_name_query = mysqli_query($connection, $select_cur_partner_name_string);        
        while($partnerRow = mysqli_fetch_assoc($select_cur_partner_name_query)){
            $cur_challenge_partner_name = $partnerRow['name'];
        }

        $cur_challenge_participant = $row['participant_id'];
        $cur_challenge_terms = $row['terms'];
        $cur_challenge_units = $row['units'];
        $cur_challenge_target = $row['target'];
        $cur_challenge_start_date = $row['start_date'];
        $cur_challenge_end_date = $row['end_date'];
        $cur_challenge_milestones = $row['milestones'];
        $cur_milestone_title_1 = '';
        $cur_milestone_sub_1 = '';
        $cur_milestone_terms_1 = '';
        $cur_milestone_image_1 = '';
        $cur_milestone_target_1 = '';
        $cur_milestone_title_2 = '';
        $cur_milestone_sub_2 = '';
        $cur_milestone_terms_2 = '';
        $cur_milestone_image_2 = '';
        $cur_milestone_target_2 = '';
        $cur_milestone_title_3 = '';
        $cur_milestone_sub_3 = '';
        $cur_milestone_terms_3 = '';
        $cur_milestone_image_3 = '';
        $cur_milestone_target_3 = '';
        $cur_milestone_title_4 = '';
        $cur_milestone_sub_4 = '';
        $cur_milestone_terms_4 = '';
        $cur_milestone_image_4 = '';
        $cur_milestone_target_4 = '';

        if($cur_challenge_milestones == 1){
            $cur_milestone_title_1 = $row['milestone_title_1'];
            $cur_milestone_sub_1 = $row['milestone_sub_1'];
            $cur_milestone_terms_1 = $row['milestone_terms_1'];
            $cur_milestone_image_1 = $row['milestone_image_1'];
            $cur_milestone_target_1 = $row['milestone_target_1'];         
        }

        if($cur_challenge_milestones == 2){
            $cur_milestone_title_1 = $row['milestone_title_1'];
            $cur_milestone_sub_1 = $row['milestone_sub_1'];
            $cur_milestone_terms_1 = $row['milestone_terms_1'];
            $cur_milestone_image_1 = $row['milestone_image_1'];
            $cur_milestone_target_1 = $row['milestone_target_1'];
            $cur_milestone_title_2 = $row['milestone_title_2'];
            $cur_milestone_sub_2 = $row['milestone_sub_2'];
            $cur_milestone_terms_2 = $row['milestone_terms_2'];
            $cur_milestone_image_2 = $row['milestone_image_2'];
            $cur_milestone_target_2 = $row['milestone_target_2'];
        }

        if($cur_challenge_milestones == 3){
            $cur_milestone_title_1 = $row['milestone_title_1'];
            $cur_milestone_sub_1 = $row['milestone_sub_1'];
            $cur_milestone_terms_1 = $row['milestone_terms_1'];
            $cur_milestone_image_1 = $row['milestone_image_1'];
            $cur_milestone_target_1 = $row['milestone_target_1'];
            $cur_milestone_title_2 = $row['milestone_title_2'];
            $cur_milestone_sub_2 = $row['milestone_sub_2'];
            $cur_milestone_terms_2 = $row['milestone_terms_2'];
            $cur_milestone_image_2 = $row['milestone_image_2'];
            $cur_milestone_target_2 = $row['milestone_target_2'];
            $cur_milestone_title_3 = $row['milestone_title_3'];
            $cur_milestone_sub_3 = $row['milestone_sub_3'];
            $cur_milestone_terms_3 = $row['milestone_terms_3'];
            $cur_milestone_image_3 = $row['milestone_image_3'];
            $cur_milestone_target_3 = $row['milestone_target_3'];
        }

        if($cur_challenge_milestones == 4){
            $cur_milestone_title_1 = $row['milestone_title_1'];
            $cur_milestone_sub_1 = $row['milestone_sub_1'];
            $cur_milestone_terms_1 = $row['milestone_terms_1'];
            $cur_milestone_image_1 = $row['milestone_image_1'];
            $cur_milestone_target_1 = $row['milestone_target_1'];
            $cur_milestone_title_2 = $row['milestone_title_2'];
            $cur_milestone_sub_2 = $row['milestone_sub_2'];
            $cur_milestone_terms_2 = $row['milestone_terms_2'];
            $cur_milestone_image_2 = $row['milestone_image_2'];
            $cur_milestone_target_2 = $row['milestone_target_2'];
            $cur_milestone_title_3 = $row['milestone_title_3'];
            $cur_milestone_sub_3 = $row['milestone_sub_3'];
            $cur_milestone_terms_3 = $row['milestone_terms_3'];
            $cur_milestone_image_3 = $row['milestone_image_3'];
            $cur_milestone_target_3 = $row['milestone_target_3'];            
            $cur_milestone_title_4 = $row['milestone_title_4'];
            $cur_milestone_sub_4 = $row['milestone_sub_4'];
            $cur_milestone_terms_4 = $row['milestone_terms_4'];
            $cur_milestone_image_4 = $row['milestone_image_4'];
            $cur_milestone_target_4 = $row['milestone_target_4'];
        }      
    }
}  else {
    echo "<script> location.replace('personal-challenges.php'); </script>"; 
}
?>
       <?php 
        //On Edit Submit Update the Challange
    if(isset($_POST['edit_challenge_submit'])){          
        $updated_name = $_POST['challenge_name'];
        $updated_title = $_POST['challenge_title'];
        $updated_description = $_POST['challenge_description'];
        $updated_country_id = $_POST['challenge_country'];
        $updated_partner_id = $_POST['challenge_partner'];
        
        $updated_dashboard_icon = $_FILES['challenge_dashboard_icon']['name'];    
        $updated_dashboard_icon_temp = $_FILES['challenge_dashboard_icon']['tmp_name'];    
        move_uploaded_file($updated_dashboard_icon_temp, "../uploads/images/{$updated_dashboard_icon}");
        //If the dashboard icon is not set then set the current one reference in the database.
        if(!$updated_dashboard_icon){
            $find_dashboard_icon_string = "SELECT * FROM challenges_partner WHERE id = $challenge_id";
            $find_dashboard_icon_query = mysqli_query($connection, $find_dashboard_icon_string);
            while($row = mysqli_fetch_assoc($find_dashboard_icon_query)){
                $updated_dashboard_icon = $row['dashboard_icon'];
            }            
        }
        $updated_terms = $_FILES['challenge_terms']['name'];         
        $updated_terms_temp = $_FILES['challenge_terms']['tmp_name'];    
        move_uploaded_file($updated_terms_temp, "../uploads/terms/{$updated_terms}");
        if(!$updated_terms){          
            $find_terms_string = "SELECT * FROM challenges_partner WHERE id = $challenge_id";
            $find_terms_query = mysqli_query($connection, $find_terms_string);
            while($row = mysqli_fetch_assoc( $find_terms_query)){
                $updated_terms = $row['terms'];
            }            
        } 
        $updated_units = $_POST['challenge_units'];
        $updated_milestones = $_POST['challenge_milestones'];    
           
        $updated_start_date_string = strtotime($_POST['challenge_start_date']);
        if($updated_start_date_string) {
            $updated_start_date = date('Y-m-d', $updated_start_date_string);
        } else {
            echo 'Invalid Date: ' . $_POST['dateFrom'];
           // fix it.
         }

        $updated_end_date_string = strtotime($_POST['challenge_end_date']);
        if($updated_end_date_string) {
            $updated_end_date = date('Y-m-d', $updated_end_date_string);
        } else {
            echo 'Invalid Date: ' . $_POST['dateFrom'];
           // fix it.
         }

        switch($updated_milestones){
            case 1 : 
                $updated_milestone_title_1 = $_POST['milestone_title_1'];
                $updated_milestone_sub_1 = $_POST['milestone_sub_1'];
                $updated_milestone_terms_1 = $_FILES['milestone_terms_1']['name'];        
                $updated_milestone_terms_1_temp = $_FILES['milestone_terms_1']['tmp_name'];      
                move_uploaded_file( $updated_milestone_terms_1_temp, "../uploads/terms/{ $updated_milestone_terms_1}"); 
                if(!$updated_milestone_terms_1){          
                    $find_terms_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_terms_query = mysqli_query($connection, $find_terms_string);
                    while($row = mysqli_fetch_assoc( $find_terms_query)){
                         $updated_milestone_terms_1 = $row['milestone_terms_1'];
                    }            
                } 
                 $updated_milestone_image_1 = $_FILES['milestone_image_1']['name'];        
                 $updated_milestone_image_1_temp = $_FILES['milestone_image_1']['tmp_name'];      
                move_uploaded_file( $updated_milestone_image_1_temp, "../uploads/images/{ $updated_milestone_image_1}"); 
                if(! $updated_milestone_image_1){          
                    $find_image_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_image_query = mysqli_query($connection, $find_image_string);
                    while($row = mysqli_fetch_assoc( $find_image_query)){
                         $updated_milestone_image_1 = $row['milestone_image_1'];
                    }            
                }   
                $updated_milestone_1_target = $_POST['milestone_target_1'];     
                $updated_target = $updated_milestone_1_target;           
            break;

            case 2 : 
                $updated_milestone_title_1 = $_POST['milestone_title_1'];
                $updated_milestone_sub_1 = $_POST['milestone_sub_1'];
                $updated_milestone_terms_1 = $_FILES['milestone_terms_1']['name'];        
                $updated_milestone_terms_1_temp = $_FILES['milestone_terms_1']['tmp_name'];      
                move_uploaded_file( $updated_milestone_terms_1_temp, "../uploads/terms/{ $updated_milestone_terms_1}"); 
                if(!$updated_milestone_terms_1){          
                    $find_terms_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_terms_query = mysqli_query($connection, $find_terms_string);
                    while($row = mysqli_fetch_assoc( $find_terms_query)){
                         $updated_milestone_terms_1 = $row['milestone_terms_1'];
                    }            
                } 
                 $updated_milestone_image_1 = $_FILES['milestone_image_1']['name'];        
                 $updated_milestone_image_1_temp = $_FILES['milestone_image_1']['tmp_name'];      
                move_uploaded_file( $updated_milestone_image_1_temp, "../uploads/images/{ $updated_milestone_image_1}"); 
                if(! $updated_milestone_image_1){          
                    $find_image_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_image_query = mysqli_query($connection, $find_image_string);
                    while($row = mysqli_fetch_assoc( $find_image_query)){
                         $updated_milestone_image_1 = $row['milestone_image_1'];
                    }            
                }   
                $updated_milestone_1_target = $_POST['milestone_target_1'];     

                $updated_milestone_title_2 = $_POST['milestone_title_2'];
                $updated_milestone_sub_2 = $_POST['milestone_sub_2'];
                $updated_milestone_terms_2 = $_FILES['milestone_terms_2']['name'];        
                $updated_milestone_terms_2_temp = $_FILES['milestone_terms_2']['tmp_name'];      
                move_uploaded_file( $updated_milestone_terms_2_temp, "../uploads/terms/{ $updated_milestone_terms_2}"); 
                if(!$updated_milestone_terms_2){          
                    $find_terms_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_terms_query = mysqli_query($connection, $find_terms_string);
                    while($row = mysqli_fetch_assoc( $find_terms_query)){
                         $updated_milestone_terms_2 = $row['milestone_terms_2'];
                    }            
                } 
                 $updated_milestone_image_2 = $_FILES['milestone_image_2']['name'];        
                 $updated_milestone_image_2_temp = $_FILES['milestone_image_2']['tmp_name'];      
                move_uploaded_file( $updated_milestone_image_2_temp, "../uploads/images/{ $updated_milestone_image_2}"); 
                if(! $updated_milestone_image_2){          
                    $find_image_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_image_query = mysqli_query($connection, $find_image_string);
                    while($row = mysqli_fetch_assoc( $find_image_query)){
                         $updated_milestone_image_2 = $row['milestone_image_2'];
                    }            
                }   
                $updated_milestone_2_target = $_POST['milestone_target_2'];    
                $updated_target = $updated_milestone_1_target + $updated_milestone_2_target;               
            break;

            case 3 : 
                $updated_milestone_title_1 = $_POST['milestone_title_1'];
                $updated_milestone_sub_1 = $_POST['milestone_sub_1'];
                $updated_milestone_terms_1 = $_FILES['milestone_terms_1']['name'];        
                $updated_milestone_terms_1_temp = $_FILES['milestone_terms_1']['tmp_name'];      
                move_uploaded_file( $updated_milestone_terms_1_temp, "../uploads/terms/{ $updated_milestone_terms_1}"); 
                if(!$updated_milestone_terms_1){          
                    $find_terms_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_terms_query = mysqli_query($connection, $find_terms_string);
                    while($row = mysqli_fetch_assoc( $find_terms_query)){
                         $updated_milestone_terms_1 = $row['milestone_terms_1'];
                    }            
                } 
                 $updated_milestone_image_1 = $_FILES['milestone_image_1']['name'];        
                 $updated_milestone_image_1_temp = $_FILES['milestone_image_1']['tmp_name'];      
                move_uploaded_file( $updated_milestone_image_1_temp, "../uploads/images/{ $updated_milestone_image_1}"); 
                if(! $updated_milestone_image_1){          
                    $find_image_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_image_query = mysqli_query($connection, $find_image_string);
                    while($row = mysqli_fetch_assoc( $find_image_query)){
                         $updated_milestone_image_1 = $row['milestone_image_1'];
                    }            
                }   
                $updated_milestone_1_target = $_POST['milestone_target_1'];     

                $updated_milestone_title_2 = $_POST['milestone_title_2'];
                $updated_milestone_sub_2 = $_POST['milestone_sub_2'];
                $updated_milestone_terms_2 = $_FILES['milestone_terms_2']['name'];        
                $updated_milestone_terms_2_temp = $_FILES['milestone_terms_2']['tmp_name'];      
                move_uploaded_file( $updated_milestone_terms_2_temp, "../uploads/terms/{ $updated_milestone_terms_2}"); 
                if(!$updated_milestone_terms_2){          
                    $find_terms_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_terms_query = mysqli_query($connection, $find_terms_string);
                    while($row = mysqli_fetch_assoc( $find_terms_query)){
                         $updated_milestone_terms_2 = $row['milestone_terms_2'];
                    }            
                } 
                 $updated_milestone_image_2 = $_FILES['milestone_image_2']['name'];        
                 $updated_milestone_image_2_temp = $_FILES['milestone_image_2']['tmp_name'];      
                move_uploaded_file( $updated_milestone_image_2_temp, "../uploads/images/{ $updated_milestone_image_2}"); 
                if(! $updated_milestone_image_2){          
                    $find_image_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_image_query = mysqli_query($connection, $find_image_string);
                    while($row = mysqli_fetch_assoc( $find_image_query)){
                         $updated_milestone_image_2 = $row['milestone_image_2'];
                    }            
                }   
                $updated_milestone_2_target = $_POST['milestone_target_2'];    
               

                $updated_milestone_title_3 = $_POST['milestone_title_3'];
                $updated_milestone_sub_3 = $_POST['milestone_sub_3'];
                $updated_milestone_terms_3 = $_FILES['milestone_terms_3']['name'];        
                $updated_milestone_terms_3_temp = $_FILES['milestone_terms_3']['tmp_name'];      
                move_uploaded_file( $updated_milestone_terms_3_temp, "../uploads/terms/{ $updated_milestone_terms_3}"); 
                if(!$updated_milestone_terms_3){          
                    $find_terms_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_terms_query = mysqli_query($connection, $find_terms_string);
                    while($row = mysqli_fetch_assoc( $find_terms_query)){
                         $updated_milestone_terms_3 = $row['milestone_terms_3'];
                    }            
                } 
                 $updated_milestone_image_3 = $_FILES['milestone_image_3']['name'];        
                 $updated_milestone_image_3_temp = $_FILES['milestone_image_3']['tmp_name'];      
                move_uploaded_file( $updated_milestone_image_3_temp, "../uploads/images/{ $updated_milestone_image_3}"); 
                if(! $updated_milestone_image_3){          
                    $find_image_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_image_query = mysqli_query($connection, $find_image_string);
                    while($row = mysqli_fetch_assoc( $find_image_query)){
                         $updated_milestone_image_3 = $row['milestone_image_3'];
                    }            
                }   
                $updated_milestone_3_target = $_POST['milestone_target_3'];   
                 
                $updated_target = $updated_milestone_1_target + $updated_milestone_2_target + $updated_milestone_3_target;               
            break;
            
            case 4 : 
                $updated_milestone_title_1 = $_POST['milestone_title_1'];
                $updated_milestone_sub_1 = $_POST['milestone_sub_1'];
                $updated_milestone_terms_1 = $_FILES['milestone_terms_1']['name'];        
                $updated_milestone_terms_1_temp = $_FILES['milestone_terms_1']['tmp_name'];      
                move_uploaded_file( $updated_milestone_terms_1_temp, "../uploads/terms/{ $updated_milestone_terms_1}"); 
                if(!$updated_milestone_terms_1){          
                    $find_terms_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_terms_query = mysqli_query($connection, $find_terms_string);
                    while($row = mysqli_fetch_assoc( $find_terms_query)){
                         $updated_milestone_terms_1 = $row['milestone_terms_1'];
                    }            
                } 
                 $updated_milestone_image_1 = $_FILES['milestone_image_1']['name'];        
                 $updated_milestone_image_1_temp = $_FILES['milestone_image_1']['tmp_name'];      
                move_uploaded_file( $updated_milestone_image_1_temp, "../uploads/images/{ $updated_milestone_image_1}"); 
                if(! $updated_milestone_image_1){          
                    $find_image_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_image_query = mysqli_query($connection, $find_image_string);
                    while($row = mysqli_fetch_assoc( $find_image_query)){
                         $updated_milestone_image_1 = $row['milestone_image_1'];
                    }            
                }   
                $updated_milestone_1_target = $_POST['milestone_target_1'];     

                $updated_milestone_title_2 = $_POST['milestone_title_2'];
                $updated_milestone_sub_2 = $_POST['milestone_sub_2'];
                $updated_milestone_terms_2 = $_FILES['milestone_terms_2']['name'];        
                $updated_milestone_terms_2_temp = $_FILES['milestone_terms_2']['tmp_name'];      
                move_uploaded_file( $updated_milestone_terms_2_temp, "../uploads/terms/{ $updated_milestone_terms_2}"); 
                if(!$updated_milestone_terms_2){          
                    $find_terms_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_terms_query = mysqli_query($connection, $find_terms_string);
                    while($row = mysqli_fetch_assoc( $find_terms_query)){
                         $updated_milestone_terms_2 = $row['milestone_terms_2'];
                    }            
                } 
                 $updated_milestone_image_2 = $_FILES['milestone_image_2']['name'];        
                 $updated_milestone_image_2_temp = $_FILES['milestone_image_2']['tmp_name'];      
                move_uploaded_file( $updated_milestone_image_2_temp, "../uploads/images/{ $updated_milestone_image_2}"); 
                if(! $updated_milestone_image_2){          
                    $find_image_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_image_query = mysqli_query($connection, $find_image_string);
                    while($row = mysqli_fetch_assoc( $find_image_query)){
                         $updated_milestone_image_2 = $row['milestone_image_2'];
                    }            
                }   
                $updated_milestone_2_target = $_POST['milestone_target_2'];    
               

                $updated_milestone_title_3 = $_POST['milestone_title_3'];
                $updated_milestone_sub_3 = $_POST['milestone_sub_3'];
                $updated_milestone_terms_3 = $_FILES['milestone_terms_3']['name'];        
                $updated_milestone_terms_3_temp = $_FILES['milestone_terms_3']['tmp_name'];      
                move_uploaded_file( $updated_milestone_terms_3_temp, "../uploads/terms/{ $updated_milestone_terms_3}"); 
                if(!$updated_milestone_terms_3){          
                    $find_terms_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_terms_query = mysqli_query($connection, $find_terms_string);
                    while($row = mysqli_fetch_assoc( $find_terms_query)){
                         $updated_milestone_terms_3 = $row['milestone_terms_3'];
                    }            
                } 
                 $updated_milestone_image_3 = $_FILES['milestone_image_3']['name'];        
                 $updated_milestone_image_3_temp = $_FILES['milestone_image_3']['tmp_name'];      
                move_uploaded_file( $updated_milestone_image_3_temp, "../uploads/images/{ $updated_milestone_image_3}"); 
                if(! $updated_milestone_image_3){          
                    $find_image_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_image_query = mysqli_query($connection, $find_image_string);
                    while($row = mysqli_fetch_assoc( $find_image_query)){
                         $updated_milestone_image_3 = $row['milestone_image_3'];
                    }            
                }   
                $updated_milestone_3_target = $_POST['milestone_target_3'];   

                $updated_milestone_title_3 = $_POST['milestone_title_4'];
                $updated_milestone_sub_4 = $_POST['milestone_sub_4'];
                $updated_milestone_terms_4 = $_FILES['milestone_terms_4']['name'];        
                $updated_milestone_terms_4_temp = $_FILES['milestone_terms_4']['tmp_name'];      
                move_uploaded_file( $updated_milestone_terms_4_temp, "../uploads/terms/{ $updated_milestone_terms_4}"); 
                if(!$updated_milestone_terms_4){          
                    $find_terms_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_terms_query = mysqli_query($connection, $find_terms_string);
                    while($row = mysqli_fetch_assoc( $find_terms_query)){
                         $updated_milestone_terms_4 = $row['milestone_terms_4'];
                    }            
                } 
                 $updated_milestone_image_4 = $_FILES['milestone_image_4']['name'];        
                 $updated_milestone_image_4_temp = $_FILES['milestone_image_4']['tmp_name'];      
                move_uploaded_file( $updated_milestone_image_4_temp, "../uploads/images/{ $updated_milestone_image_4}"); 
                if(! $updated_milestone_image_4){          
                    $find_image_string = "SELECT * FROM challenges_partner WHERE id =  $challenge_id";
                    $find_image_query = mysqli_query($connection, $find_image_string);
                    while($row = mysqli_fetch_assoc( $find_image_query)){
                         $updated_milestone_image_4 = $row['milestone_image_4'];
                    }            
                }   
                $updated_milestone_4_target = $_POST['milestone_target_4'];   

                $updated_target = $updated_milestone_1_target + $updated_milestone_2_target + $updated_milestone_3_target + $updated_milestone_4_target;               
            break;
        }

        $updated_participants = $_POST['check_list'];       
        foreach($updated_participants as $participant => $participant_id){

            $update_challenge_string = "UPDATE challenges_personal SET ";
            $update_challenge_string .= "name = '{$updated_name}', "; 
            $update_challenge_string .= "title = '{$updated_title}', "; 
            $update_challenge_string .= "description = '{$updated_description}', "; 
            $update_challenge_string .= "country_id = '{$updated_country_id}', "; 
            $update_challenge_string .= "partner_id = '{$updated_partner_id}', "; 
            $update_challenge_string .= "participant_id = '{$participant_id}', "; 
            $update_challenge_string .= "dashboard_icon = '{$updated_dashboard_icon}', "; 
            $update_challenge_string .= "terms = '{$updated_terms}', "; 
            $update_challenge_string .= "units = '{$updated_units}', "; 
            $update_challenge_string .= "target = '{$updated_target}', "; 
            $update_challenge_string .= "start_date = '{$updated_start_date}', "; 
            $update_challenge_string .= "end_date = '{$updated_end_date}', "; 
            $update_challenge_string .= "milestones = '{$updated_milestones}' ";
                switch($updated_milestones) {
                    case 1 : 
                        $update_challenge_string .= ", milestone_title_1 = '{$updated_milestone_title_1}', "; 
                        $update_challenge_string .= "milestone_sub_1 = '{$updated_milestone_sub_1}', "; 
                        $update_challenge_string .= "milestone_terms_1 = '{$updated_milestone_terms_1}', "; 
                        $update_challenge_string .= "milestone_image_1 = '{$updated_milestone_image_1}', "; 
                        $update_challenge_string .= "milestone_target_1 = '{$updated_milestone_1_target}' ";
                    break;
                    case 2 : 
                        $update_challenge_string .= ", milestone_title_1 = '{$updated_milestone_title_1}', "; 
                        $update_challenge_string .= "milestone_sub_1 = '{$updated_milestone_sub_1}', "; 
                        $update_challenge_string .= "milestone_terms_1 = '{$updated_milestone_terms_1}', "; 
                        $update_challenge_string .= "milestone_image_1 = '{$updated_milestone_image_1}', "; 
                        $update_challenge_string .= "milestone_target_1 = '{$updated_milestone_1_target}', ";
                        $update_challenge_string .= "milestone_title_2 = '{$updated_milestone_title_2}', "; 
                        $update_challenge_string .= "milestone_sub_2 = '{$updated_milestone_sub_2}', "; 
                        $update_challenge_string .= "milestone_terms_2 = '{$updated_milestone_terms_2}', "; 
                        $update_challenge_string .= "milestone_image_2 = '{$updated_milestone_image_2}', "; 
                        $update_challenge_string .= "milestone_target_2 = '{$updated_milestone_2_target}' "; 
                    break;
                    case 3 : 
                        $update_challenge_string .= ", milestone_title_1 = '{$updated_milestone_title_1}', "; 
                        $update_challenge_string .= "milestone_sub_1 = '{$updated_milestone_sub_1}', "; 
                        $update_challenge_string .= "milestone_terms_1 = '{$updated_milestone_terms_1}', "; 
                        $update_challenge_string .= "milestone_image_1 = '{$updated_milestone_image_1}', "; 
                        $update_challenge_string .= "milestone_target_1 = '{$updated_milestone_1_target}', ";
                        $update_challenge_string .= "milestone_title_2 = '{$updated_milestone_title_2}', "; 
                        $update_challenge_string .= "milestone_sub_2 = '{$updated_milestone_sub_2}', "; 
                        $update_challenge_string .= "milestone_terms_2 = '{$updated_milestone_terms_2}', "; 
                        $update_challenge_string .= "milestone_image_2 = '{$updated_milestone_image_2}', "; 
                        $update_challenge_string .= "milestone_target_2 = '{$updated_milestone_2_target}', "; 
                        $update_challenge_string .= "milestone_title_3 = '{$updated_milestone_title_3}', "; 
                        $update_challenge_string .= "milestone_sub_3 = '{$updated_milestone_sub_3}', "; 
                        $update_challenge_string .= "milestone_terms_3 = '{$updated_milestone_terms_3}', "; 
                        $update_challenge_string .= "milestone_image_3 = '{$updated_milestone_image_3}', "; 
                        $update_challenge_string .= "milestone_target_3 = '{$updated_milestone_3_target}' "; 
                    break;
                    case 4: 
                        $update_challenge_string .= ", milestone_title_1 = '{$updated_milestone_title_1}', "; 
                        $update_challenge_string .= "milestone_sub_1 = '{$updated_milestone_sub_1}', "; 
                        $update_challenge_string .= "milestone_terms_1 = '{$updated_milestone_terms_1}', "; 
                        $update_challenge_string .= "milestone_image_1 = '{$updated_milestone_image_1}', "; 
                        $update_challenge_string .= "milestone_target_1 = '{$updated_milestone_1_target}', ";
                        $update_challenge_string .= "milestone_title_2 = '{$updated_milestone_title_2}', "; 
                        $update_challenge_string .= "milestone_sub_2 = '{$updated_milestone_sub_2}', "; 
                        $update_challenge_string .= "milestone_terms_2 = '{$updated_milestone_terms_2}', "; 
                        $update_challenge_string .= "milestone_image_2 = '{$updated_milestone_image_2}', "; 
                        $update_challenge_string .= "milestone_target_2 = '{$updated_milestone_2_target}', "; 
                        $update_challenge_string .= "milestone_title_3 = '{$updated_milestone_title_3}', "; 
                        $update_challenge_string .= "milestone_sub_3 = '{$updated_milestone_sub_3}', "; 
                        $update_challenge_string .= "milestone_terms_3 = '{$updated_milestone_terms_3}', "; 
                        $update_challenge_string .= "milestone_image_3 = '{$updated_milestone_image_3}', "; 
                        $update_challenge_string .= "milestone_target_3 = '{$updated_milestone_3_target}', "; 
                        $update_challenge_string .= "milestone_title_4 = '{$updated_milestone_title_4}', "; 
                        $update_challenge_string .= "milestone_sub_4 = '{$updated_milestone_sub_4}', "; 
                        $update_challenge_string .= "milestone_terms_4 = '{$updated_milestone_terms_4}', "; 
                        $update_challenge_string .= "milestone_image_4 = '{$updated_milestone_image_4}', "; 
                        $update_challenge_string .= "milestone_target_4 = '{$updated_milestone_4_target}' ";                 
                }

            $update_challenge_string .= " WHERE id = '{$challenge_id}' ";    
            $update_challenge_query = mysqli_query($connection, $update_challenge_string);

            if(!$update_challenge_query){
                die('Query Failed ' . mysqli_error($connection));
            }

            echo "<script> location.replace('edit-personal-challenge.php?c_id=$challenge_id'); </script>"; 
        }
    }
?> 

    <div class="dash__content" style="font-size:12px;">
        <h3 class="title u-mar-b__sml">Edit Challenge :  <span style="text-decoration: underline; text-transform:uppercase;"><?php echo $cur_challenge_name;?></span></h3>
        <form id="add-challenge-form" class="dash-form" method="post" enctype="multipart/form-data">
            <div class="dash-form__form-group">
                <label for="challenge_country" class="dash-form__label">Country</label>
                <select id="country-selector" class="dash-form__select" name="challenge_country">

                    <!-- Add Current Country to the top of the list -->
                    <option <?php echo"value='{$cur_challenge_country_id}'"; ?>> <?php echo $cur_challenge_country_name; ?> </option>

                   <?php 
                    if($user_reward_role_id == 3){
                        // Get all countries except the current country and echo as options in the select element
                        $select_all_countries_string = "SELECT * FROM countries WHERE id != $cur_challenge_country_id ORDER BY label";
                        $select_all_countries_query = mysqli_query($connection, $select_all_countries_string);                      
                        $countriesAr = array(); 
              
                        while($row = mysqli_fetch_assoc($select_all_countries_query)){
                              $country_id = $row['id'];
                              $country_reward_role = $row['reward_role'];
                              $country_label = $row['label'];
                              //Pass all countries except current country into an Array.  
                              $countriesAr[] = $row['id'];            
                              echo "<option value='{$country_id}'>{$country_label}</option>";                              
                        }
                    }
                   ?>
                </select>
            </div>   
            <script>
                $(function(){
                    $('#country-selector').change(function(){
                        $('.dash_form__message--select-country').remove();
                        var selectedId = $('#country-selector option:selected').attr('value');
                        //Remove Currentley Selected Partner   
                        $('.dash-form__partner-option').removeClass('dash-form__partner-option--active');
                        //Add New list of Partners
                        $('.partners-from-' + selectedId).addClass('dash-form__partner-option--active');                                              
                        $('.dash-form__select--message').addClass('dash-form__partner-option--active');                                              
                        $('.dash-form__participants-cont').removeClass('dash-form__participants-cont--active');
                        $('.dash-form__checkbox').prop('checked', false);
                        $('#partner-selector').prepend('<option class="dash_form__message--select-country">Please Select a Partner</option>');
                        $('.dash_form__message--select-country').attr("selected", true);
                    });
                });
               
            </script>  
            
            <script>            
                $(function(){
                    $('#partner-selector').change(function(){
                        var selectedId = $('#partner-selector option:selected').attr('value');
                        $('.dash-form__participants-cont').removeClass('dash-form__participants-cont--active');
                        $('.dash-form__checkbox').prop('checked', false);
                        $('#members-from-' + selectedId).addClass('dash-form__participants-cont--active');
                    });
                });
            </script>
            <div class="dash-form__form-group">
                <label for="challenge_partner" class="dash-form__label">Partner</label>
                <select id="partner-selector" class="dash-form__select" name="challenge_partner">

                    <!-- Add Current Country to the top of the list -->
                    <option <?php echo"value='{$cur_challenge_partner_id}'"; ?> class="dash-form__partner-option dash-form__partner-option--active partners-from-<?php echo $cur_challenge_country_id ?>"> <?php echo $cur_challenge_partner_name; ?> </option>

                   <?php 
                        // Get all partners from current country except the current partner and echo as an active option in the select element
                        $select_all_active_partners_string = "SELECT * FROM companies WHERE country_id = $cur_challenge_country_id AND id != $cur_challenge_partner_id ORDER BY name";
                        $select_all_active_partners_query = mysqli_query($connection, $select_all_active_partners_string);      
                        
                        if(!$select_all_active_partners_query){
                            die('Query Failed ' . mysqli_error());
                        }
                        $partnersAr = array(); 
              
                        while($row = mysqli_fetch_assoc($select_all_active_partners_query)){
                              $partner_id = $row['id'];                              
                              $partner_name = $row['name'];
                              //Pass all partners except current country into an Array.  
                              $partnersAr[] = $row['id'];    
                              echo "<option value='{$partner_id}' class='dash-form__partner-option dash-form__partner-option--active partners-from-{$cur_challenge_country_id}' ?> {$partner_name}</option> ";                   
                        }

                        //GET all other partners by country and put into select element in an inactive state.
                      ;
                        
                        $select_all_other_partners_string = "SELECT * FROM companies WHERE country_id != $cur_challenge_country_id ORDER BY name";
                        $select_all_other_partners_query = mysqli_query($connection, $select_all_other_partners_string);

                        while($row = mysqli_fetch_assoc($select_all_other_partners_query)){

                            $partner_id = $row['id'];                              
                            $partner_name = $row['name'];
                            $partner_country = $row['country_id'];

                            echo "<option value='{$partner_id}' class='dash-form__partner-option partners-from-{$partner_country}' ?> {$partner_name}</option> ";    
                        }
                   ?>
                </select>
            </div>   
            <div class="dash-form__form-group">
                <label for="check_list[]"  class="dash-form__label dash-form__label--top">Challenge participants</label>
                <div class="dash-form__participants-cont dash-form__participants-cont--active" id="members-from-<?php echo $cur_challenge_partner_id; ?>">  
                <?php 
                    //Select members for current country
                    $select_cur_partner_members_string = "SELECT * FROM users WHERE company_id = $cur_challenge_partner_id ORDER BY name";
                    $select_cur_partner_members_query = mysqli_query($connection,  $select_cur_partner_members_string);
                    while($row = mysqli_fetch_assoc($select_cur_partner_members_query)){
                        $user_id = $row['id'];
                        $user_name = $row['name'];  
                ?>
                <div class="dash-form__participant">
                    <label for="participant" class="dash-form__participant-label"><?php echo $user_name ?></label>
                    <input type="checkbox" class="dash-form__checkbox" name="check_list[]" id="<?php echo $user_id ?>" value="<?php echo $user_id ?>">
                </div> 
                <?php
                    }                          
                ?>                   
                </div>              
                <script>
                    $(function(){
                        //Check the boxes of the current participants
                        $('#members-from-<?php echo $cur_challenge_partner_id; ?>').addClass('dash-form__participants-cont--active');
                        $('#' + <?php echo $cur_challenge_participant; ?>).prop('checked', true);                       
                    });    
                </script>
                 <script>
                    $('.dash-form__checkbox').click(function(){
                        $('.dash-form__checkbox').prop('checked', false);
                        $(this).prop('checked', true);
                    });
                </script>    
                <?php   
                        $select_other_partners_string = "SELECT * FROM companies WHERE id != $cur_challenge_partner_id";
                        $select_other_partners_query = mysqli_query($connection, $select_other_partners_string);

                        while($partner_row = mysqli_fetch_assoc($select_other_partners_query)){
                            $partner_id = $partner_row['id'];
                    ?>
                            <div class="dash-form__participants-cont" id="members-from-<?php echo $partner_id; ?>"> 
                    <?php
                            $select_other_users_string = "SELECT * FROM users WHERE company_id = $partner_id";
                            $select_other_users_query = mysqli_query($connection, $select_other_users_string);

                            while($user_row = mysqli_fetch_assoc($select_other_users_query)){
                                $user_id = $user_row['id'];
                                $user_name = $user_row['name'];
                    ?>                                
                                <div class="dash-form__participant">
                                    <label for="participant" class="dash-form__participant-label"><?php echo $user_name ?></label>
                                    <input type="checkbox" class="dash-form__checkbox" name="check_list[]" id="<?php echo $user_id ?>" value="<?php echo $user_id ?>">
                                </div> 
                    <?php
                            } 
                    ?>
                            </div>
                    <?php
                        }
                ?> 
            </div>
            <p class="dash-form__error dash-form__error--partner-select">Please select at least 1 Participant</p>
            <div class="dash-form__form-group">
                <label for="challenge_dashboard_icon"  class="dash-form__label">Dashboard Icon</label>
                <img class="dash-form__icon" src="../uploads/images/<?php echo $cur_challenge_dasboard_icon; ?>" alt="">
                <input id="input-dashboard-icon"  name="challenge_dashboard_icon" type="file" class="dash-form__input dash-form__input--file">
            </div>
            <p class="dash-form__error dash-form__error--dashboard-icon">Please select a dasboard icon</p>
            <div class="dash-form__form-group">
                <label for="challenge_name"  class="dash-form__label">Name (Admin Panel only)</label>
                <input id="input-name" name="challenge_name" type="text" class="dash-form__input"  value="<?php echo $cur_challenge_name; ?>">
            </div>
            <p class="dash-form__error dash-form__error--name">Please input a Name</p>
            <div class="dash-form__form-group">
                <label for="challenge_title"  class="dash-form__label">Title</label>
                <input id="input-title" name="challenge_title" type="text" class="dash-form__input"  value="<?php echo $cur_challenge_title; ?>">
            </div>
            <p class="dash-form__error dash-form__error--title">Please input a title</p>
            
            <div class="dash-form__form-group">
                <label for="challenge_description"  class="dash-form__label">Description</label>
                <input id="input-description" name="challenge_description" type="text" class="dash-form__input"  value="<?php echo $cur_challenge_description; ?>">
            </div>
            <p class="dash-form__error dash-form__error--description">Please input a description</p>
            <div class="dash-form__form-group">
                <label for="challenge_start_date"  class="dash-form__label">Start Date</label>
                <input id="input-start-date" name="challenge_start_date" type="text" class="dash-form__input" value="<?php echo $cur_challenge_start_date; ?>">
                <script>
                    $( function() {
                         $("#input-start-date").datepicker({ minDate: 0 });
                    });
                </script>
            </div>
            <p class="dash-form__error dash-form__error--start-date">Please input a start date</p>
            <div class="dash-form__form-group">
                <label for="challenge_end_date"  class="dash-form__label">End Date</label>
                <input id="input-end-date" name="challenge_end_date" type="text" class="dash-form__input" value="<?php echo $cur_challenge_end_date; ?>">
                <script>
                    $( function() {
                         $("#input-end-date").datepicker({ minDate: 1 });
                    });
                </script>
            </div>
            <p class="dash-form__error dash-form__error--end-date">Please input a end date</p>
            <div class="dash-form__form-group">
                <label for="challenge_terms"  class="dash-form__label">Terms and Conditions</label>
                <p class="dash-form__current-file"><?php echo $cur_challenge_terms; ?></p>
                <input id="input-terms" name="challenge_terms" type="file" class="dash-form__input dash-form__input--file">
            </div>
            <p class="dash-form__error dash-form__error--terms">Please select the terms and conditions</p>
            <div class="dash-form__form-group">
                <label for="challenge_units"  class="dash-form__label">Units (eg. $, £, people)</label>
                <input id="input-units" name="challenge_units" type="text" class="dash-form__input"  value="<?php echo $cur_challenge_units; ?>">
            </div>
            <p class="dash-form__error dash-form__error--units">Please select a unit of measurement</p>
            <!-- <div class="dash-form__form-group">
                <label for="challenge_target"  class="dash-form__label">Target</label>
                <input id="input-target" name="challenge_target" type="number" class="dash-form__input"  value="<?php echo $cur_challenge_target; ?>">
            </div> -->
            <p class="dash-form__error dash-form__error--target">Please enter a target</p>
            <div class="dash-form__form-group">
                <label for="challenge_milestones"  class="dash-form__label">Milestones</label>
                <input id="milestones-amount" name="challenge_milestones"  value="<?php echo $cur_challenge_milestones; ?>" class="dash-from__input dash-form__input--hide" type="number">
                <a class="subtract-milestone" href="javascript:;">
                    <i class="fas fa-minus-circle"></i>
                </a>&nbsp;
                <a class="add-milestone" href="javascript:;">
                    <i class="fas fa-plus-circle"></i>
                </a>&nbsp;
                <p class="milestone-counter"> <?php echo $cur_challenge_milestones; ?></p>
                <script>
                    $(function(){
                        var $counter = <?php echo $cur_challenge_milestones; ?>;
                        $('.add-milestone').click(function(){
                            if($counter < 4) {
                                $counter += 1;
                                $('.milestone-counter').text($counter);
                                $('#milestones-amount').val($counter);
                                displayMilestones($counter);
                            }
                        });

                        $('.subtract-milestone').click(function(){
                            if($counter > 0) {
                                $counter -= 1;
                                $('.milestone-counter').text($counter);
                                $('#milestones-amount').val($counter);
                                displayMilestones($counter);
                            }
                        });

                        function displayMilestones(num){                     
                            $('.dash-form__milestone').removeClass('dash-form__milestone--active');
                            for(var i = 0; i < num; i++){                            
                                $('#milestone-' + (i + 1)).addClass('dash-form__milestone--active');
                            }   
                        }
                        
                        switch($counter){
                            case 1:                        
                            $('#milestone-1').addClass('dash-form__milestone--active');                        
                            break;
                            case 2:

                            $('#milestone-1').addClass('dash-form__milestone--active');
                            $('#milestone-2').addClass('dash-form__milestone--active');                        
                            break;
                            case 3:

                            $('#milestone-1').addClass('dash-form__milestone--active');
                            $('#milestone-2').addClass('dash-form__milestone--active');
                            $('#milestone-3').addClass('dash-form__milestone--active');                        
                            break;
                            case 4:

                            $('#milestone-1').addClass('dash-form__milestone--active');
                            $('#milestone-2').addClass('dash-form__milestone--active');
                            $('#milestone-3').addClass('dash-form__milestone--active');
                            $('#milestone-4').addClass('dash-form__milestone--active');                        
                            break;

                            default:    
                            $('.dash-form__milestone').removeClass('dash-form__milestone--active');
                        }    
                    });
                </script>
            </div>                      
            <div id="milestone-1" class="dash-form__milestone">
                <h6 class="sub-title">Milestone 1</h6>
                <div class="dash-form__form-group">
                    <label for="milestone_title_1"  class="dash-form__label">Milestone Title</label>
                    <input id="input-milestone-1-title" name="milestone_title_1" type="text" class="dash-form__input" value="<?php echo  $cur_milestone_title_1; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-1-title">Please add milestone title or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_sub_1"  class="dash-form__label">Milestone Sub Text</label>
                    <input id="input-milestone-1-sub" name="milestone_sub_1" type="text" class="dash-form__input" value="<?php echo  $cur_milestone_sub_1; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-1-sub">Please add milestone sub or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_terms_1"  class="dash-form__label">Terms and Conditions</label>
                    <input id="input-milestone-1-terms" name="milestone_terms_1" type="file" class="dash-form__input">
                    <p class="dash-form__current-file"><?php echo   $cur_milestone_terms_1; ?></p>
                    
                </div>
                <p class="dash-form__error dash-form__error--milestone-1-terms">Please add milestone terms or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_image_1"  class="dash-form__label">Milestone Image</label>
                    <img src="../uploads/images/<?php echo  $cur_milestone_image_1; ?>" alt="" class="dash-form__icon">
                    <input id="input-milestone-1-image" name="milestone_image_1" type="file" class="dash-form__input dash-form__input--file">
                </div>    
                <p class="dash-form__error dash-form__error--milestone-1-image">Please add milestone image or remove milestone</p>     
                <div class="dash-form__form-group">
                    <label for="milestone_target_1"  class="dash-form__label">Target</label>
                    <input id="input-milestone-1-target" name="milestone_target_1" type="number" class="dash-form__input" value="<?php echo  $cur_milestone_target_1; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-1-target">Please enter a target or remove milestone</p>      
            </div>
            <div id="milestone-2" class="dash-form__milestone">
                <h6 class="sub-title">Milestone 2</h6>
                <div class="dash-form__form-group">
                    <label for="milestone_title_2"  class="dash-form__label">Milestone Title</label>
                    <input id="input-milestone-2-title" name="milestone_title_2" type="text" class="dash-form__input"  value="<?php echo  $cur_milestone_title_2; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-2-title">Please add milestone title or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_sub_2"  class="dash-form__label">Milestone Sub Text</label>
                    <input id="input-milestone-2-sub" name="milestone_sub_2" type="text" class="dash-form__input" value="<?php echo  $cur_milestone_sub_2; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-2-sub">Please add milestone sub or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_terms_2"  class="dash-form__label">Terms and Conditions</label>
                    <p class="dash-form__current-file"><?php echo   $cur_milestone_terms_2; ?></p>
                    <input id="input-milestone-2-terms" name="milestone_terms_2" type="file" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-2-terms">Please add milestone terms or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_image_2"  class="dash-form__label">Milestone Image</label>
                    <img src="../uploads/images/<?php echo  $cur_milestone_image_2; ?>" alt="" class="dash-form__icon">
                    <input id="input-milestone-2-image" name="milestone_image_2" type="file" class="dash-form__input dash-form__input--file">
                </div>    
                <p class="dash-form__error dash-form__error--milestone-2-image">Please add milestone image or remove milestone</p>    
                <div class="dash-form__form-group">
                    <label for="milestone_target_2"  class="dash-form__label">Target</label>
                    <input id="input-milestone-2-target" name="milestone_target_2" type="number" class="dash-form__input" value="<?php echo  $cur_milestone_target_2; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-2-target">Please enter a target or remove milestone</p>         
            </div>
            <div id="milestone-3" class="dash-form__milestone">
                <h6 class="sub-title">Milestone 3</h6>
                <div class="dash-form__form-group">
                    <label for="milestone_title_3"  class="dash-form__label">Milestone Title</label>
                    <input id="input-milestone-3-title" name="milestone_title_3" type="text" class="dash-form__input" value="<?php echo  $cur_milestone_title_3; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-3-title">Please add milestone title or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_sub_3"  class="dash-form__label">Milestone Sub Text</label>
                    <input id="input-milestone-3-sub" name="milestone_sub_3" type="text" class="dash-form__input"  value="<?php echo  $cur_milestone_sub_3; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-3-sub">Please add milestone sub or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_terms_3"  class="dash-form__label">Terms and Conditions</label>
                    <p class="dash-form__current-file"><?php echo   $cur_milestone_terms_3; ?></p>
                    <input id="input-milestone-3-terms" name="milestone_terms_3" type="file" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-3-terms">Please add milestone terms or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_image_3"  class="dash-form__label">Milestone Image</label>
                    <img src="../uploads/images/<?php echo  $cur_milestone_image_3; ?>" alt="" class="dash-form__icon">
                    <input id="input-milestone-3-image" name="milestone_image_3" type="file" class="dash-form__input dash-form__input--file">
                </div>        
                <p class="dash-form__error dash-form__error--milestone-3-image">Please add milestone image or remove milestone</p>        
                <div class="dash-form__form-group">
                    <label for="milestone_target_3"  class="dash-form__label">Target</label>
                    <input id="input-milestone-3-target" name="milestone_target_3" type="number" class="dash-form__input" value="<?php echo  $cur_milestone_target_3; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-3-target">Please enter a target or remove milestone</p>  
            </div>
            <div id="milestone-4" class="dash-form__milestone">
                <h6 class="sub-title">Milestone 4</h6>
                <div class="dash-form__form-group">
                    <label for="milestone_title_4"  class="dash-form__label">Milestone Title</label>
                    <input id="input-milestone-4-title" name="milestone_title_4" type="text" class="dash-form__input" value="<?php echo  $cur_milestone_title_4; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-4-title">Please add milestone title or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_sub_4"  class="dash-form__label">Milestone Sub Text</label>
                    <input id="input-milestone-4-sub" name="milestone_sub_4" type="text" class="dash-form__input" value="<?php echo  $cur_milestone_sub_4; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-4-sub">Please add milestone sub or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_terms_4"  class="dash-form__label">Terms and Conditions</label>
                    <p class="dash-form__current-file"><?php echo   $cur_milestone_terms_4; ?></p>
                    <input id="input-milestone-4-terms" name="milestone_terms_4" type="file" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-4-terms">Please add milestone terms or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_image_4"  class="dash-form__label">Milestone Image</label>
                    <img src="../uploads/images/<?php echo  $cur_milestone_image_4; ?>" alt="" class="dash-form__icon">
                    <input id="input-milestone-4-image" name="milestone_image_4" type="file" class="dash-form__input dash-form__input--file">
                </div>    
                <p class="dash-form__error dash-form__error--milestone-4-image">Please add milestone image or remove milestone</p>       
                <div class="dash-form__form-group">
                    <label for="milestone_target_4"  class="dash-form__label">Target</label>
                    <input id="input-milestone-4-target" name="milestone_target_4" type="number" class="dash-form__input" value="<?php echo  $cur_milestone_target_4; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-4-target">Please enter a target or remove milestone</p>       
            </div>
            <div class="dash-form__form-group dash-form__form-group--submit">
                <input class="dash-form__submit" name="edit_challenge_submit" value="Submit" type="submit">  
            </div>  

             <script>
                $(function(){
                    $('#country-selector').change(function(){
                        var selectedId = $('#country-selector option:selected').attr('value');
                        $('.dash-form__participants-cont').removeClass('dash-form__participants-cont--active');
                        $('.dash-form__checkbox').prop('checked', false);
                        $('#partners-from-' + selectedId).addClass('dash-form__participants-cont--active');
                    });
                });
            </script> 

            <script>
                $('#add-challenge-form').submit(function(e){
                  
                    if($('.dash-form__checkbox').filter(':checked').length < 1){                    
                        e.preventDefault();
                        $('.dash-form__error--partner-select').addClass('dash-form__error--active')
                    } else {
                        $('.dash-form__error--partner-select').removeClass('dash-form__error--active');
                    }

                    if($('#input-name').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--name').addClass('dash-form__error--active')
                    } else {
                        $('.dash-form__error--name').removeClass('dash-form__error--active')
                    }

                    if($('#input-title').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--title').addClass('dash-form__error--active')
                    } else {
                        $('.dash-form__error--title').removeClass('dash-form__error--active')
                    }

                    if($('#input-description').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--description').addClass('dash-form__error--active')
                    } else {
                        $('.dash-form__error--description').removeClass('dash-form__error--active')
                    }                  

                    if($('#input-units').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--units').addClass('dash-form__error--active')
                    } else {
                        $('.dash-form__error--units').removeClass('dash-form__error--active')
                    }

                    if($('#input-target').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--target').addClass('dash-form__error--active')
                    } else {
                        $('.dash-form__error--target').removeClass('dash-form__error--active')
                    }
                    
                    var numberOfMilestones = parseInt($('.milestone-counter').text());                    

                    for(var i = 0; i < numberOfMilestones; i++){
                        var cur = i + 1;

                        if($('#input-milestone-' + cur + '-title').val() < 1){
                            e.preventDefault();
                            $('.dash-form__error--milestone-' + cur + '-title').addClass('dash-form__error--active');
                        } else {
                            $('.dash-form__error--milestone-' + cur + '-title').removeClass('dash-form__error--active');
                        }

                        if($('#input-milestone-' + cur + '-sub').val() < 1){
                            e.preventDefault();
                            $('.dash-form__error--milestone-' + cur + '-sub').addClass('dash-form__error--active');
                        } else {
                            $('.dash-form__error--milestone-' + cur + '-sub').removeClass('dash-form__error--active');
                        }                        
                    }

                });
            
            </script>                                             
        </form>  
    </div>
<?php include 'includes/admin-footer.php'; ?>

