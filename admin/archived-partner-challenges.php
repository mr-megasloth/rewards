
<?php include 'includes/admin-header.php'; ?>      
<?php include 'includes/admin-info.php'; ?> 
<?php include 'includes/admin-nav.php'; ?>
    <div class="dash__content">
        <h3 class="title u-mar-b__tiny">Archived Partner Challenges</h3>
        <table class="table">
            <tr>
                <th>Name (Admin Only)</th>
                <th>Title</th>
                <th>Partner</th>
                <th>Overall Target</th>
                <th>Total Progress</th>
                <th>% Complete</th>
                <th>Milestones</th>                
                <th>Date Range</th>                
            </tr>
<?php 
            switch($user_reward_role_id){
                case 2: 
                $select_all_challenges_string = "SELECT * FROM challenges_partner WHERE country_id = $user_country_id AND end_date < now()";
                break;

                case 3: 
                $select_all_challenges_string = "SELECT * FROM challenges_partner AND end_date < now()";
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
                    $challenge_participant_id = $row['participant_id'];  

                    $find_participant_name_string = "SELECT * FROM companies WHERE id = $challenge_participant_id";
                    $find_participant_name_query = mysqli_query($connection, $find_participant_name_string);

                    while($participant_row = mysqli_fetch_assoc( $find_participant_name_query)){
                        $challenge_participant_name = $participant_row['name'];
                    }

                    $challenge_units = $row['units'];
                    $challenge_target = $row['target'];
                    $challenge_milestones = $row['milestones'];
                    $challenge_participant_id = $row['participant_id'];
                    $challenge_progress = $row['target_progress'];
                    $challenge_percentage = ($challenge_progress / $challenge_target) * 100;
                    $challenge_start_date = date("d-m-Y", strtotime($row['start_date']));
                    $challenge_end_date = date("d-m-Y", strtotime($row['end_date']));
?>
                    <tr>
                        <td><?php echo $challenge_name; ?></td>
                        <td><?php echo $challenge_title; ?></td>
                        <td><?php echo $challenge_participant_name; ?></td>
                         <td><?php echo $challenge_units . $challenge_target . '.00';  ?></td>       
                         <td><?php echo $challenge_units . $challenge_progress . '.00'; ?></td>       
                         <td><?php echo $challenge_percentage . '%'; ?></td>       
                         <td><?php echo $challenge_milestones; ?></td>
                         <td class="u-center"><?php echo $challenge_start_date . ' ---- ' . $challenge_end_date; ?></td>
                    </tr>
<?php 
                }
?>
        </table>                      
    </div>
<?php include 'includes/admin-footer.php'; ?> 





