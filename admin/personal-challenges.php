
<?php include 'includes/admin-header.php'; ?>      
<?php include 'includes/admin-info.php'; ?> 
<?php include 'includes/admin-nav.php'; ?>

    <div class="dash__content">      
        <h3 class="title u-mar-b__tiny">Personal Challenges</h3>
        <div class="btn-right">
            <a href="add-personal-challenge.php" class="dash__btn btn u-mar-b__sml">New Challenge</a>            
        </div>
        <table class="table">
           <tr>
               <th>Name (Admin Only)</th>
               <th>Title</th>
               <th>Partner</th>
               <th>Participants</th>
               <th>Overall Target</th>
               <th>Milestones</th>
               <th>Date Range</th>
               <th>Update Progress</th>
               <th>Edit</th>
               <th>Delete</th>
               <th>Clone</th>       
               <th>Preview</th>       
           </tr>
<?php 
                 switch($user_reward_role_id){
                    case 2: 
                    $select_all_challenges_string = "SELECT * FROM challenges_personal WHERE country_id = $user_country_id AND end_date > now()";
                    break;
    
                    case 3: 
                    $select_all_challenges_string = "SELECT * FROM challenges_personal WHERE end_date > now()";
                    break;
                }

                $select_all_challenges_query = mysqli_query($connection, $select_all_challenges_string);

                if(!$select_all_challenges_query) {
                    die('Query Failed ' . mysqli_error($connection));                    
                }
            
                while($row = mysqli_fetch_assoc($select_all_challenges_query)) {
                    $challenge_id = $row['id'];
                    $challenge_name = $row['name'];
                    $challenge_title = $row['title'];
                    $challenge_description = $row['description'];     
                    $challenge_partner_id = $row['partner_id'];   
                    $challenge_units = $row['units'];
                    $challenge_target = $row['target'];
                    $challenge_start_date = date("d-m-Y", strtotime($row['start_date']));
                    $challenge_end_date = date("d-m-Y", strtotime($row['end_date']));
                    $challenge_milestones = $row['milestones'];
                    $challenge_participant_id = $row['participant_id'];

                    $select_partner_name_string = "SELECT * FROM companies WHERE id = $challenge_partner_id";
                    $select_partner_query = mysqli_query($connection, $select_partner_name_string);
                    while($row = mysqli_fetch_assoc($select_partner_query)){
                        $challenge_partner_name = $row['name'];
                    }  
                
                    $select_participant_name_string = "SELECT * FROM users WHERE id = $challenge_participant_id";
                    $select_participant_name_query = mysqli_query($connection, $select_participant_name_string);           
                    while($user_row = mysqli_fetch_assoc($select_participant_name_query)){                                
                        $participant_name = $user_row['name'];
                    }
?>
            <tr>
                <td><?php echo $challenge_name; ?></td>
                <td><?php echo $challenge_title; ?></td>
                <td><?php echo $challenge_partner_name; ?></td>
                <td><?php echo $participant_name; ?></td>
                <td><?php echo $challenge_units . $challenge_target; ?></td>
                <td><?php echo $challenge_milestones; ?></td>
                <td class="u-center"><?php echo $challenge_start_date . ' ---- ' . $challenge_end_date; ?></td>
                <td class="u-center"><a href="update-personal-progress.php?c_id=<?php echo $challenge_id; ?>"><i class="fas fa-pen-nib"></i></a></td>
                <td class="u-center"><a href="edit-personal-challenge.php?c_id=<?php echo $challenge_id; ?>"><i class="fas fa-edit"></i></a></td>
                <td class="u-center"><a href="personal-challenges.php?delete=<?php echo $challenge_id; ?>"><i class="fas fa-trash"></i></a></td>
                <td class="u-center"><a href="personal-challenges.php?clone=<?php echo $challenge_id; ?>"><i class="fas fa-copy"></i></a></td>
                <td class="u-center"><a href="preview-personal-challenge.php?c_id=<?php echo $challenge_id; ?>" target="_blank"><i class="fas fa-eye"></i></a></td>
           </tr>
<?php 
                }
?>
        </table>                      
    </div>
<?php 
    //Delete Comment Query
    if(isset($_GET['delete'])){
        $to_delete_id = $_GET['delete'];   
        $delete_string = "DELETE FROM challenges_personal WHERE id = {$to_delete_id} ";
        $delete_query = mysqli_query($connection, $delete_string);
        echo "<script> location.replace('personal-challenges.php'); </script>";         
    }    
?>

<?php 
    //Delete Comment Query
    if(isset($_GET['clone'])){
        $to_clone_id = $_GET['clone'];   
        $to_clone_string = "SELECT * FROM challenges_personal WHERE id = {$to_clone_id} ";
        $to_clone_query = mysqli_query($connection, $to_clone_string);
        while($row = mysqli_fetch_assoc($to_clone_query)){
            $to_clone_name = $row['name'];                
            $to_clone_title = $row['title'];                
            $to_clone_description = $row['description'];                
            $to_clone_country_id = $row['country_id'];  
            $to_clone_partner = $row['partner_id'];                 
            $to_clone_participant = $row['participant_id'];                
            $to_clone_dashboard_icon = $row['dashboard_icon'];                
            $to_clone_terms = $row['terms'];                
            $to_clone_units = $row['units'];                
            $to_clone_target = $row['target'];                
            $to_clone_milestones = $row['milestones'];                
            $to_clone_milestone_title_1 = $row['milestone_title_1'];                
            $to_clone_milestone_sub_1 = $row['milestone_sub_1'];                
            $to_clone_milestone_terms_1 = $row['milestone_terms_1'];                
            $to_clone_milestone_image_1 = $row['milestone_image_1'];                
            $to_clone_milestone_target_1 = $row['milestone_target_1'];                
            $to_clone_milestone_title_2 = $row['milestone_title_2'];                
            $to_clone_milestone_sub_2 = $row['milestone_sub_2'];                
            $to_clone_milestone_terms_2 = $row['milestone_terms_2'];                
            $to_clone_milestone_image_2 = $row['milestone_image_2'];                
            $to_clone_milestone_target_2 = $row['milestone_target_2'];                
            $to_clone_milestone_title_3 = $row['milestone_title_3'];                
            $to_clone_milestone_sub_3 = $row['milestone_sub_3'];                
            $to_clone_milestone_terms_3 = $row['milestone_terms_3'];                
            $to_clone_milestone_image_3 = $row['milestone_image_3'];                
            $to_clone_milestone_target_3 = $row['milestone_target_3'];                
            $to_clone_milestone_title_4 = $row['milestone_title_4'];                
            $to_clone_milestone_sub_4 = $row['milestone_sub_4'];                
            $to_clone_milestone_terms_4 = $row['milestone_terms_4'];                
            $to_clone_milestone_image_4 = $row['milestone_image_4'];                
            $to_clone_milestone_target_4 = $row['milestone_target_4'];                
        }

        $clone_string = "INSERT INTO challenges_personal(
            name,
            title,
            description,
            country_id,
            partner_id,
            participant_id,
            dashboard_icon,
            terms,
            units,
            target,
            milestones,
            milestone_title_1,
            milestone_sub_1,
            milestone_terms_1,
            milestone_image_1,
            milestone_target_1,
            milestone_title_2,
            milestone_sub_2,
            milestone_terms_2,
            milestone_image_2,
            milestone_target_2,
            milestone_title_3,
            milestone_sub_3,
            milestone_terms_3,
            milestone_image_3,
            milestone_target_3,
            milestone_title_4,
            milestone_sub_4,
            milestone_terms_4,
            milestone_image_4,
            milestone_target_4
        ) ";
        $clone_string .=  "VALUES(
            '{$to_clone_name}',
            '{$to_clone_title}',
            '{$to_clone_description}',
            '{$to_clone_country_id}',
            '{$to_clone_partner}',
            '{$to_clone_participant}',
            '{$to_clone_dashboard_icon}',
            '{$to_clone_terms}',
            '{$to_clone_units}',
            '{$to_clone_target}',
            '{$to_clone_milestones}',
            '{$to_clone_milestone_title_1}',
            '{$to_clone_milestone_sub_1}',
            '{$to_clone_milestone_terms_1}',
            '{$to_clone_milestone_image_1}' ,
            '{$to_clone_milestone_target_1}',
            '{$to_clone_milestone_title_2}',
            '{$to_clone_milestone_sub_2}',
            '{$to_clone_milestone_terms_2}',
            '{$to_clone_milestone_image_2}',
            '{$to_clone_milestone_target_2}',
            '{$to_clone_milestone_title_3}',
            '{$to_clone_milestone_sub_3}',
            '{$to_clone_milestone_terms_3}',
            '{$to_clone_milestone_image_3}',
            '{$to_clone_milestone_target_3}',
            '{$to_clone_milestone_title_4}',
            '{$to_clone_milestone_sub_4}',
            '{$to_clone_milestone_terms_4}',
            '{$to_clone_milestone_image_4}',
            '{$to_clone_milestone_target_4}'
        ) ";       
        
        $clone_query = mysqli_query($connection, $clone_string);
        if(!$clone_query){
            die('Query Failed ' . mysqli_error($connection));
        }

        echo "<script> location.replace('personal-challenges.php'); </script>";         
    }    
?>
<?php include 'includes/admin-footer.php'; ?> 





