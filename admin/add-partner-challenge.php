<?php include 'includes/admin-header.php'; ?>      
<?php include 'includes/admin-info.php'; ?> 
<?php include 'includes/admin-nav.php'; ?>



    <div class="dash__content" style="font-size:12px;">
        
<?php 

    if(isset($_POST['add_challenge_submit'])){

        $challenge_country_id = $_POST['challenge_country']; 
        $challenge_dashboard_icon = $_FILES['challenge_dashboard_icon']['name'];    
        $challenge_dashboard_icon_temp = $_FILES['challenge_dashboard_icon']['tmp_name'];    
        move_uploaded_file($challenge_dashboard_icon_temp, "../uploads/images/{$challenge_dashboard_icon}");
        $challenge_name = $_POST['challenge_name'];       
        $challenge_title = $_POST['challenge_title'];       
        $challenge_description = $_POST['challenge_description'];    
        $challenge_terms = $_FILES['challenge_terms']['name'];    
        $challenge_terms_temp = $_FILES['challenge_terms']['tmp_name']; 
        move_uploaded_file($challenge_terms_temp, "../uploads/terms/{$challenge_terms}");
        
        $challenge_units = $_POST['challenge_units'];   
        $challenge_milestones = $_POST['challenge_milestones'];
     
        $challenge_participants = $_POST['check_list'];

        $challenge_start_date_string = strtotime($_POST['challenge_start_date']);
        if($challenge_start_date_string) {
            $challenge_start_date = date('Y-m-d', $challenge_start_date_string);
        } else {
            echo 'Invalid Date: ' . $_POST['dateFrom'];
           // fix it.
         }

        $challenge_end_date_string = strtotime($_POST['challenge_end_date']);
        if($challenge_end_date_string) {
            $challenge_end_date = date('Y-m-d', $challenge_end_date_string);
        } else {
            echo 'Invalid Date: ' . $_POST['dateFrom'];
           // fix it.
         }
       

        foreach($challenge_participants as $participant => $participant_id){

            if($challenge_milestones == 1 ){
                
                $challenge_milestone_1_title = $_POST['milestone_title_1'];        
                $challenge_milestone_1_sub_text = $_POST['milestone_sub_1'];        
                $challenge_milestone_1_terms = $_FILES['milestone_terms_1']['name'];        
                $challenge_milestone_1_terms_temp = $_FILES['milestone_terms_1']['tmp_name'];      
                move_uploaded_file($challenge_milestone_1_terms_temp, "../uploads/terms/{$challenge_milestone_1_terms}");  
                $challenge_milestone_1_image = $_FILES['milestone_image_1']['name'];        
                $challenge_milestone_1_image_temp = $_FILES['milestone_image_1']['tmp_name'];      
                move_uploaded_file($challenge_milestone_1_image_temp, "../uploads/images/{$challenge_milestone_1_image}");  
                $challenge_milestone_1_target = $_POST['milestone_target_1']; 
                $challenge_target = $challenge_milestone_1_target;
             

                $insert_challenge_string = "INSERT INTO challenges_partner(
                    name,
                    title,
                    description,
                    country_id,
                    participant_id,
                    dashboard_icon,
                    terms, 
                    units,
                    milestones,
                    milestone_title_1,
                    milestone_sub_1,
                    milestone_terms_1,
                    milestone_image_1,
                    milestone_target_1, 
                    target,
                    start_date,
                    end_date
                ) ";
                $insert_challenge_string .= "VALUES(
                    '{$challenge_name}',
                    '{$challenge_title}',
                    '{$challenge_description}',
                    '{$challenge_country_id}',
                    '{$participant_id}',
                    '{$challenge_dashboard_icon}',
                    '{$challenge_terms}',
                    '{$challenge_units}',                    
                    '{$challenge_milestones}',
                    '{$challenge_milestone_1_title}',
                    '{$challenge_milestone_1_sub_text}',
                    '{$challenge_milestone_1_terms}',
                    '{$challenge_milestone_1_image}',
                    '{$challenge_milestone_1_target}', 
                    '{$challenge_target}',
                    '{$challenge_start_date}',
                    '{$challenge_end_date}' 
                ) ";               
            }

            if($challenge_milestones == 2 ){
                $challenge_milestone_1_title = $_POST['milestone_title_1'];        
                $challenge_milestone_1_sub_text = $_POST['milestone_sub_1'];        
                $challenge_milestone_1_terms = $_FILES['milestone_terms_1']['name'];        
                $challenge_milestone_1_terms_temp = $_FILES['milestone_terms_1']['tmp_name'];      
                move_uploaded_file($challenge_milestone_1_terms_temp, "../uploads/terms/{$challenge_milestone_1_terms}");  
                $challenge_milestone_1_image = $_FILES['milestone_image_1']['name'];        
                $challenge_milestone_1_image_temp = $_FILES['milestone_image_1']['tmp_name'];      
                move_uploaded_file($challenge_milestone_1_image_temp, "../uploads/images/{$challenge_milestone_1_image}");    
                $challenge_milestone_1_target = $_POST['milestone_target_1'];  

                $challenge_milestone_2_title = $_POST['milestone_title_2'];        
                $challenge_milestone_2_sub_text = $_POST['milestone_sub_2'];        
                $challenge_milestone_2_terms = $_FILES['milestone_terms_2']['name'];        
                $challenge_milestone_2_terms_temp = $_FILES['milestone_terms_2']['tmp_name'];    
                move_uploaded_file($challenge_milestone_2_terms_temp, "../uploads/terms/{$challenge_milestone_2_terms}");      
                $challenge_milestone_2_image = $_FILES['milestone_image_2']['name'];        
                $challenge_milestone_2_image_temp = $_FILES['milestone_image_2']['tmp_name'];   
                move_uploaded_file($challenge_milestone_2_image_temp, "../uploads/images/{$challenge_milestone_2_image}");      
                $challenge_milestone_2_target = $_POST['milestone_target_2'];    
                
                $challenge_target = $challenge_milestone_1_target + $challenge_milestone_2_target;

                $insert_challenge_string = "INSERT INTO challenges_partner(
                    name,
                    title,
                    description,
                    country_id,
                    participant_id,
                    dashboard_icon,
                    terms,
                    units,                    
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
                    target,
                    start_date,
                    end_date ) ";
                $insert_challenge_string .= "VALUES(
                    '{$challenge_name}',
                    '{$challenge_title}',
                    '{$challenge_description}',
                    '{$challenge_country_id}',
                    '{$participant_id}',
                    '{$challenge_dashboard_icon}',
                    '{$challenge_terms}',
                    '{$challenge_units}',                   
                    '{$challenge_milestones}',
                    '{$challenge_milestone_1_title}',
                    '{$challenge_milestone_1_sub_text}',
                    '{$challenge_milestone_1_terms}',
                    '{$challenge_milestone_1_image}' ,
                    '{$challenge_milestone_1_target}',
                    '{$challenge_milestone_2_title}',
                    '{$challenge_milestone_2_sub_text}',
                    '{$challenge_milestone_2_terms}',
                    '{$challenge_milestone_2_image}',
                    '{$challenge_milestone_2_target}',
                    '{$challenge_target}',
                    '{$challenge_start_date}',
                    '{$challenge_end_date}'  ) ";
            }

            if($challenge_milestones == 3 ){
                $challenge_milestone_1_title = $_POST['milestone_title_1'];        
                $challenge_milestone_1_sub_text = $_POST['milestone_sub_1'];        
                $challenge_milestone_1_terms = $_FILES['milestone_terms_1']['name'];        
                $challenge_milestone_1_terms_temp = $_FILES['milestone_terms_1']['tmp_name'];      
                move_uploaded_file($challenge_milestone_1_terms_temp, "../uploads/terms/{$challenge_milestone_1_terms}");  
                $challenge_milestone_1_image = $_FILES['milestone_image_1']['name'];        
                $challenge_milestone_1_image_temp = $_FILES['milestone_image_1']['tmp_name'];      
                move_uploaded_file($challenge_milestone_1_image_temp, "../uploads/images/{$challenge_milestone_1_image}");       
                $challenge_milestone_1_target = $_POST['milestone_target_1'];  

                $challenge_milestone_2_title = $_POST['milestone_title_2'];        
                $challenge_milestone_2_sub_text = $_POST['milestone_sub_2'];        
                $challenge_milestone_2_terms = $_FILES['milestone_terms_2']['name'];        
                $challenge_milestone_2_terms_temp = $_FILES['milestone_terms_2']['tmp_name'];    
                move_uploaded_file($challenge_milestone_2_terms_temp, "../uploads/terms/{$challenge_milestone_2_terms}");      
                $challenge_milestone_2_image = $_FILES['milestone_image_2']['name'];        
                $challenge_milestone_2_image_temp = $_FILES['milestone_image_2']['tmp_name'];   
                move_uploaded_file($challenge_milestone_2_image_temp, "../uploads/images/{$challenge_milestone_2_image}");      
                $challenge_milestone_2_target = $_POST['milestone_target_2']; 

                $challenge_milestone_3_title = $_POST['milestone_title_3'];        
                $challenge_milestone_3_sub_text = $_POST['milestone_sub_3'];        
                $challenge_milestone_3_terms = $_FILES['milestone_terms_3']['name'];        
                $challenge_milestone_3_terms_temp = $_FILES['milestone_terms_3']['tmp_name'];     
                move_uploaded_file($challenge_milestone_3_terms_temp, "../uploads/terms/{$challenge_milestone_3_terms}");         
                $challenge_milestone_3_image = $_FILES['milestone_image_3']['name'];        
                $challenge_milestone_3_image_temp = $_FILES['milestone_image_3']['tmp_name'];    
                move_uploaded_file($challenge_milestone_3_image_temp, "../uploads/images/{$challenge_milestone_3_image}");        
                $challenge_milestone_3_target = $_POST['milestone_target_3']; 

                $challenge_target = $challenge_milestone_1_target + $challenge_milestone_2_target + $challenge_milestone_3_target;

                $insert_challenge_string = "INSERT INTO challenges_partner(
                    name,
                    title,
                    description,
                    country_id,
                    participant_id,
                    dashboard_icon,
                    terms,
                    units,
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
                    target,
                    start_date,
                    end_date ) ";

                $insert_challenge_string .= "VALUES(
                    '{$challenge_name}',
                    '{$challenge_title}',
                    '{$challenge_description}',
                    '{$challenge_country_id}',
                    '{$participant_id}',
                    '{$challenge_dashboard_icon}',
                    '{$challenge_terms}',
                    '{$challenge_units}',                    
                    '{$challenge_milestones}',
                    '{$challenge_milestone_1_title}',
                    '{$challenge_milestone_1_sub_text}',
                    '{$challenge_milestone_1_terms}',
                    '{$challenge_milestone_1_image}' ,
                    '{$challenge_milestone_1_target}',
                    '{$challenge_milestone_2_title}',
                    '{$challenge_milestone_2_sub_text}',
                    '{$challenge_milestone_2_terms}',
                    '{$challenge_milestone_2_image}',
                    '{$challenge_milestone_2_target}',
                    '{$challenge_milestone_3_title}',
                    '{$challenge_milestone_3_sub_text}',
                    '{$challenge_milestone_3_terms}',
                    '{$challenge_milestone_3_image}',
                    '{$challenge_milestone_3_target}',
                    '{$challenge_target}',
                    '{$challenge_start_date}',
                    '{$challenge_end_date}'  ) "; 
            
            }
            if($challenge_milestones == 4 ){
                $challenge_milestone_1_title = $_POST['milestone_title_1'];        
                $challenge_milestone_1_sub_text = $_POST['milestone_sub_1'];        
                $challenge_milestone_1_terms = $_FILES['milestone_terms_1']['name'];        
                $challenge_milestone_1_terms_temp = $_FILES['milestone_terms_1']['tmp_name'];      
                move_uploaded_file($challenge_milestone_1_terms_temp, "../uploads/terms/{$challenge_milestone_1_terms}");  
                $challenge_milestone_1_image = $_FILES['milestone_image_1']['name'];        
                $challenge_milestone_1_image_temp = $_FILES['milestone_image_1']['tmp_name'];      
                move_uploaded_file($challenge_milestone_1_image_temp, "../uploads/images/{$challenge_milestone_1_image}");   
                $challenge_milestone_1_target = $_POST['milestone_target_1']; 

                $challenge_milestone_2_title = $_POST['milestone_title_2'];        
                $challenge_milestone_2_sub_text = $_POST['milestone_sub_2'];        
                $challenge_milestone_2_terms = $_FILES['milestone_terms_2']['name'];        
                $challenge_milestone_2_terms_temp = $_FILES['milestone_terms_2']['tmp_name'];    
                move_uploaded_file($challenge_milestone_2_terms_temp, "../uploads/terms/{$challenge_milestone_2_terms}");      
                $challenge_milestone_2_image = $_FILES['milestone_image_2']['name'];        
                $challenge_milestone_2_image_temp = $_FILES['milestone_image_2']['tmp_name'];   
                move_uploaded_file($challenge_milestone_2_image_temp, "../uploads/images/{$challenge_milestone_2_image}");   
                $challenge_milestone_2_target = $_POST['milestone_target_2'];  

                $challenge_milestone_3_title = $_POST['milestone_title_3'];        
                $challenge_milestone_3_sub_text = $_POST['milestone_sub_3'];        
                $challenge_milestone_3_terms = $_FILES['milestone_terms_3']['name'];        
                $challenge_milestone_3_terms_temp = $_FILES['milestone_terms_3']['tmp_name'];     
                move_uploaded_file($challenge_milestone_3_terms_temp, "../uploads/terms/{$challenge_milestone_3_terms}");         
                $challenge_milestone_3_image = $_FILES['milestone_image_3']['name'];        
                $challenge_milestone_3_image_temp = $_FILES['milestone_image_3']['tmp_name'];    
                move_uploaded_file($challenge_milestone_3_image_temp, "../uploads/images/{$challenge_milestone_3_image}");    
                $challenge_milestone_3_target = $_POST['milestone_target_3'];

                $challenge_milestone_4_title = $_POST['milestone_title_4'];        
                $challenge_milestone_4_sub_text = $_POST['milestone_sub_4'];        
                $challenge_milestone_4_terms = $_FILES['milestone_terms_4']['name'];        
                $challenge_milestone_4_terms_temp = $_FILES['milestone_terms_4']['tmp_name'];    
                move_uploaded_file($challenge_milestone_4_terms_temp, "../uploads/terms/{$challenge_milestone_4_terms}");          
                $challenge_milestone_4_image = $_FILES['milestone_image_4']['name'];        
                $challenge_milestone_4_image_temp = $_FILES['milestone_image_4']['tmp_name'];
                move_uploaded_file($challenge_milestone_4_image_temp, "../uploads/images/{$challenge_milestone_4_image}");    
                $challenge_milestone_4_target = $_POST['milestone_target_4']; 

                $challenge_target = $challenge_milestone_1_target + $challenge_milestone_2_target + $challenge_milestone_3_target +  $challenge_milestone_4_target;

                $insert_challenge_string = "INSERT INTO challenges_partner(
                    name,
                    title,
                    description,
                    country_id,
                    participant_id,
                    dashboard_icon,
                    terms,
                    units,                   
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
                    milestone_target_4,
                    target,
                    start_date,
                    end_date  ) ";
                $insert_challenge_string .= "VALUES(
                    '{$challenge_name}',
                    '{$challenge_title}',
                    '{$challenge_description}',
                    '{$challenge_country_id}',
                    '{$participant_id}',
                    '{$challenge_dashboard_icon}',
                    '{$challenge_terms}',
                    '{$challenge_units}',                    
                    '{$challenge_milestones}',
                    '{$challenge_milestone_1_title}',
                    '{$challenge_milestone_1_sub_text}',
                    '{$challenge_milestone_1_terms}',
                    '{$challenge_milestone_1_image}' ,
                    '{$challenge_milestone_1_target}',
                    '{$challenge_milestone_2_title}',
                    '{$challenge_milestone_2_sub_text}',
                    '{$challenge_milestone_2_terms}',
                    '{$challenge_milestone_2_image}',
                    '{$challenge_milestone_2_target}',
                    '{$challenge_milestone_3_title}',
                    '{$challenge_milestone_3_sub_text}',
                    '{$challenge_milestone_3_terms}',
                    '{$challenge_milestone_3_image}',
                    '{$challenge_milestone_3_target}',
                    '{$challenge_milestone_4_title}', 
                    '{$challenge_milestone_4_sub_text}',
                    '{$challenge_milestone_4_terms}',
                    '{$challenge_milestone_4_image}',
                    '{$challenge_milestone_4_target}',
                    '{$challenge_target}',
                    '{$challenge_start_date}',
                    '{$challenge_end_date}'  ) ";         
            }
            
            $insert_challenge_query = mysqli_query($connection, $insert_challenge_string);
    
            if(!$insert_challenge_query){
                die('Query Failed ' . mysqli_error($connection));
            } else {
                // echo "<script> location.replace('add-partner-challenge.php?challenge=added'); </script>";  
                echo $insert_challenge_string;
            }   
        }
    }
?>
<?php 
if(isset($_GET['challenge'])){
   echo '<h3 class="success">Your Challenge was added succesfully</h3>';
}
?>

        <h3 class="title u-mar-b__sml">Create a new Partner Challenge</h3>
        <form id="add-challenge-form" class="dash-form" method="post" enctype="multipart/form-data">
            <div class="dash-form__form-group">
                <label for="challenge_country" class="dash-form__label">Country</label>
                <select id="country-selector" class="dash-form__select" name="challenge_country">
                    <option>Select Country to see Partners</option>
                   <?php 
                        if($user_reward_role_id == 3){
                            //If SUPER ADMIN
                            $select_all_countries_string = "SELECT * FROM countries ORDER BY label";
                            $select_all_countries_query = mysqli_query($connection, $select_all_countries_string);

                            $countriesAr = array();
                            
                            if(!$select_all_countries_query) {
                                die('Query Failed ' . mysqli_error($connection));                    
                            }
                        
                            while($row = mysqli_fetch_assoc($select_all_countries_query)){
                                  $country_id = $row['id'];
                                  $country_reward_role = $row['reward_role'];
                                  $country_label = $row['label'];  
                                  $countriesAr[] = $row['id'];
                                  echo "<option value='{$country_id}'>{$country_label}</option>";                              
                            }
                        } else {
                            //IF COUNTRY ADMIN
                            $select_user_country_string = "SELECT * FROM countries WHERE id = $user_country_id";
                            $select_user_country_query = mysqli_query($connection, $select_user_country_string);

                            while($row = mysqli_fetch_assoc($select_user_country_query)){
                                $country_label = $row['label'];
                                echo "<option value='{$user_country_id}'>{$country_label}</option>";                                   
                            }
                        }
                   ?>
                </select>
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
            </div>   
            <div class="dash-form__form-group">
                <label for="check_list[]"  class="dash-form__label dash-form__label--top">Challenge participants</label>
                <!-- <input type="hidden" name="participants" value=""> -->
    
                <?php    
                if($user_reward_role_id == 3){   
                    //SUPER ADMIN

                    foreach ($countriesAr as $country => $country_id) {

                        $select_partners_string = "SELECT * FROM companies WHERE country_id = $country_id ORDER BY name";
                        $select_partners_query = mysqli_query($connection, $select_partners_string);
                    ?>
                        <div class="dash-form__participants-cont" id="partners-from-<?php echo $country_id; ?>">
                            <?php
                                while($row = mysqli_fetch_assoc($select_partners_query)){
                                    $partner_id = $row['id'];
                                    $partner_name = $row['name'];                     
                            ?>  
                                    <div class="dash-form__participant">
                                        <label for="participant" class="dash-form__participant-label"><?php echo $partner_name ?></label>
                                        <input type="checkbox" class="dash-form__checkbox" name="check_list[]"  value="<?php echo $partner_id ?>">
                                    </div>     
                            <?php            
                                }
                            ?>
                        </div>  

                       
                <?php                                
                    }
                } else {
                    //COUNTRY ADMIN
                    $select_partners_string = "SELECT * FROM companies WHERE country_id =  $user_country_id ORDER BY name";
                    $select_partners_query = mysqli_query($connection, $select_partners_string);
                ?>
                    <div class="dash-form__participants-cont" id="partners-from-<?php echo $user_country_id; ?>">
                        <?php 
                            while($row = mysqli_fetch_assoc($select_partners_query)){
                                $partner_id = $row['id'];
                                $partner_name = $row['name'];    
                        ?>
                                <div class="dash-form__participant">
                                    <label for="participant" class="dash-form__participant-label"><?php echo $partner_name ?></label>
                                    <input type="checkbox" class="dash-form__checkbox" name="check_list[]"  value="<?php echo $partner_id ?>">
                                </div>     
                        <?php
                            }
                        ?>
                    </div>
                <?php
                }
                ?> 

            </div>
            <p class="dash-form__error dash-form__error--partner-select">Please select at least 1 Partner</p>
            <div class="dash-form__form-group">
                <label for="challenge_dashboard_icon"  class="dash-form__label">Dashboard Icon</label>
                <input id="input-dashboard-icon" name="challenge_dashboard_icon" type="file" class="dash-form__input dash-form__input--file">
            </div>
            <p class="dash-form__error dash-form__error--dashboard-icon">Please select a dasboard icon</p>
            <div class="dash-form__form-group">
                <label for="challenge_name"  class="dash-form__label">Name (Admin Panel only)</label>
                <input id="input-name" name="challenge_name" type="text" class="dash-form__input">
            </div>
            <p class="dash-form__error dash-form__error--name">Please input a Name</p>
            <div class="dash-form__form-group">
                <label for="challenge_title"  class="dash-form__label">Title</label>
                <input id="input-title" name="challenge_title" type="text" class="dash-form__input">
            </div>
            <p class="dash-form__error dash-form__error--title">Please input a title</p>
            
            <div class="dash-form__form-group">
                <label for="challenge_description"  class="dash-form__label">Description</label>
                <input id="input-description" name="challenge_description" type="text" class="dash-form__input">
            </div>
            <p class="dash-form__error dash-form__error--description">Please input a description</p>
            <div class="dash-form__form-group">
                <label for="challenge_start_date"  class="dash-form__label">Start Date</label>
                <input id="input-start-date" name="challenge_start_date" type="text" class="dash-form__input" >
                <script>
                    $( function() {
                         $("#input-start-date").datepicker({ minDate: 0 });
                    });
                </script>
            </div>
            <p class="dash-form__error dash-form__error--start-date">Please input a start date</p>
            <div class="dash-form__form-group">
                <label for="challenge_end_date"  class="dash-form__label">End Date</label>
                <input id="input-end-date" name="challenge_end_date" type="text" class="dash-form__input">
                <script>
                    $( function() {
                         $("#input-end-date").datepicker({ minDate: 1 });
                    });
                </script>
            </div>
            <p class="dash-form__error dash-form__error--end-date">Please input a end date</p>
            <div class="dash-form__form-group">
                <label for="challenge_terms"  class="dash-form__label">Terms and Conditions</label>
                <input id="input-terms" name="challenge_terms" type="file" class="dash-form__input dash-form__input--file">
            </div>
            <p class="dash-form__error dash-form__error--terms">Please select the terms and conditions</p>
            <div class="dash-form__form-group">
                <label for="challenge_units"  class="dash-form__label">Units (eg. $, £, people)</label>
                <input id="input-units" name="challenge_units" type="text" class="dash-form__input">
            </div>
            <p class="dash-form__error dash-form__error--units">Please select a unit of measurement</p>           
            <div class="dash-form__form-group">
                <label for="challenge_milestones"  class="dash-form__label">Milestones</label>
                <input id="milestones-amount" name="challenge_milestones" value="1" class="dash-from__input dash-form__input--hide" type="number">
                <a class="subtract-milestone" href="javascript:;">
                    <i class="fas fa-minus-circle"></i>
                </a>&nbsp;
                <a class="add-milestone" href="javascript:;">
                    <i class="fas fa-plus-circle"></i>
                </a>&nbsp;
                <p class="milestone-counter">1</p>
                <script>
                    var $counter = 1;
                    $('.add-milestone').click(function(){                      
                        if($counter < 4) {
                            $counter += 1;
                            $('.milestone-counter').text($counter);
                            $('#milestones-amount').val($counter);
                            displayMilestones($counter);
                        }
                    });

                    $('.subtract-milestone').click(function(){
                        if($counter > 1) {
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
                </script>
            </div>                      
            <div id="milestone-1" class="dash-form__milestone dash-form__milestone--active">
                <h6 class="sub-title">Milestone 1</h6>
                <div class="dash-form__form-group">
                    <label for="milestone_title_1"  class="dash-form__label">Title</label>
                    <input id="input-milestone-1-title" name="milestone_title_1" type="text" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-1-title">Please add milestone title</p>
                <div class="dash-form__form-group">
                    <label for="milestone_sub_1"  class="dash-form__label">Sub Text</label>
                    <input id="input-milestone-1-sub" name="milestone_sub_1" type="text" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-1-sub">Please add milestone sub</p>
                <div class="dash-form__form-group">
                    <label for="milestone_terms_1"  class="dash-form__label">Terms and Conditions</label>
                    <input id="input-milestone-1-terms" name="milestone_terms_1" type="file" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-1-terms">Please add milestone terms</p>
                <div class="dash-form__form-group">
                    <label for="milestone_image_1"  class="dash-form__label">Image</label>
                    <input id="input-milestone-1-image" name="milestone_image_1" type="file" class="dash-form__input dash-form__input--file">
                </div>    
                <p class="dash-form__error dash-form__error--milestone-1-image">Please add milestone image</p>     
                <div class="dash-form__form-group">
                    <label for="milestone_target_1"  class="dash-form__label">Target</label>
                    <input id="input-milestone-1-target" name="milestone_target_1" type="number" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-1-target">Please enter a target</p>      
            </div>
            <div id="milestone-2" class="dash-form__milestone">
                <h6 class="sub-title">Milestone 2</h6>
                <div class="dash-form__form-group">
                    <label for="milestone_title_2"  class="dash-form__label">Milestone Title</label>
                    <input id="input-milestone-2-title" name="milestone_title_2" type="text" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-2-title">Please add milestone title or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_sub_2"  class="dash-form__label">Milestone Sub Text</label>
                    <input id="input-milestone-2-sub" name="milestone_sub_2" type="text" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-2-sub">Please add milestone sub or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_terms_2"  class="dash-form__label">Terms and Conditions</label>
                    <input id="input-milestone-2-terms" name="milestone_terms_2" type="file" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-2-terms">Please add milestone terms or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_image_2"  class="dash-form__label">Milestone Image</label>
                    <input id="input-milestone-2-image" name="milestone_image_2" type="file" class="dash-form__input dash-form__input--file">
                </div>    
                <p class="dash-form__error dash-form__error--milestone-2-image">Please add milestone image or remove milestone</p>    
                <div class="dash-form__form-group">
                    <label for="milestone_target_2"  class="dash-form__label">Target</label>
                    <input id="input-milestone-2-target" name="milestone_target_2" type="number" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-2-target">Please enter a target or remove milestone</p>         
            </div>
            <div id="milestone-3" class="dash-form__milestone">
                <h6 class="sub-title">Milestone 3</h6>
                <div class="dash-form__form-group">
                    <label for="milestone_title_3"  class="dash-form__label">Milestone Title</label>
                    <input id="input-milestone-3-title" name="milestone_title_3" type="text" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-3-title">Please add milestone title or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_sub_3"  class="dash-form__label">Milestone Sub Text</label>
                    <input id="input-milestone-3-sub" name="milestone_sub_3" type="text" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-3-sub">Please add milestone sub or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_terms_3"  class="dash-form__label">Terms and Conditions</label>
                    <input id="input-milestone-3-terms" name="milestone_terms_3" type="file" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-3-terms">Please add milestone terms or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_image_3"  class="dash-form__label">Milestone Image</label>
                    <input id="input-milestone-3-image" name="milestone_image_3" type="file" class="dash-form__input dash-form__input--file">
                </div>        
                <p class="dash-form__error dash-form__error--milestone-3-image">Please add milestone image or remove milestone</p>        
                <div class="dash-form__form-group">
                    <label for="milestone_target_3"  class="dash-form__label">Target</label>
                    <input id="input-milestone-3-target" name="milestone_target_3" type="number" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-3-target">Please enter a target or remove milestone</p>  
            </div>
            <div id="milestone-4" class="dash-form__milestone">
                <h6 class="sub-title">Milestone 4</h6>
                <div class="dash-form__form-group">
                    <label for="milestone_title_4"  class="dash-form__label">Milestone Title</label>
                    <input id="input-milestone-4-title" name="milestone_title_4" type="text" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-4-title">Please add milestone title or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_sub_4"  class="dash-form__label">Milestone Sub Text</label>
                    <input id="input-milestone-4-sub" name="milestone_sub_4" type="text" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-4-sub">Please add milestone sub or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_terms_4"  class="dash-form__label">Terms and Conditions</label>
                    <input id="input-milestone-4-terms" name="milestone_terms_4" type="file" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-4-terms">Please add milestone terms or remove milestone</p>
                <div class="dash-form__form-group">
                    <label for="milestone_image_4"  class="dash-form__label">Milestone Image</label>
                    <input id="input-milestone-4-image" name="milestone_image_4" type="file" class="dash-form__input dash-form__input--file">
                </div>    
                <p class="dash-form__error dash-form__error--milestone-4-image">Please add milestone image or remove milestone</p>       
                <div class="dash-form__form-group">
                    <label for="milestone_target_4"  class="dash-form__label">Target</label>
                    <input id="input-milestone-4-target" name="milestone_target_4" type="number" class="dash-form__input">
                </div>
                <p class="dash-form__error dash-form__error--milestone-4-target">Please enter a target or remove milestone</p>       
            </div>
            <div class="dash-form__form-group dash-form__form-group--submit">
                <input class="dash-form__submit" name="add_challenge_submit" value="Submit" type="submit">  
            </div>   

            <script>

                $('#add-challenge-form').submit(function(e){
                    var activeClass = 'dash-form__error--active';
        

                    
                                     
                    if($('.dash-form__checkbox').filter(':checked').length < 1){                    
                        e.preventDefault();
                        $('.dash-form__error--partner-select').addClass(activeClass)
                    } else {
                        $('.dash-form__error--partner-select').removeClass(activeClass);
                    }

                    if($('#input-dashboard-icon').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--dashboard-icon').addClass(activeClass)
                    } else {
                        $('.dash-form__error--dashboard-icon').removeClass(activeClass)
                    }

                    if($('#input-name').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--name').addClass(activeClass)
                    } else {
                        $('.dash-form__error--name').removeClass(activeClass)
                    }

                    if($('#input-title').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--title').addClass(activeClass)
                    } else {
                        $('.dash-form__error--title').removeClass(activeClass)
                    }

                    if($('#input-description').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--description').addClass(activeClass)
                    } else {
                        $('.dash-form__error--description').removeClass(activeClass)
                    }

                    if($('#input-start-date').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--start-date').addClass(activeClass)
                    } else {
                        $('.dash-form__error--start-date').removeClass(activeClass)
                    }

                    


                    if($('#input-end-date').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--end-date').addClass(activeClass)
                    } else {
                        $('.dash-form__error--end-date').removeClass(activeClass)
                    }

                    if($('#input-terms').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--terms').addClass(activeClass)
                    } else {
                        $('.dash-form__error--terms').removeClass(activeClass)
                    }

                    if($('#input-units').val() < 1){
                        e.preventDefault();
                        $('.dash-form__error--units').addClass(activeClass)
                    } else {
                        $('.dash-form__error--units').removeClass(activeClass)
                    }
                    
                    var numberOfMilestones = parseInt($('.milestone-counter').text());
                    

                    for(var i = 0; i < numberOfMilestones; i++){
                        var cur = i + 1;

                        if($('#input-milestone-' + cur + '-title').val() < 1){
                            $('.dash-form__error--milestone-' + cur + '-title').addClass(activeClass);
                        } else {
                            $('.dash-form__error--milestone-' + cur + '-title').removeClass(activeClass);
                        }

                        if($('#input-milestone-' + cur + '-sub').val() < 1){
                            $('.dash-form__error--milestone-' + cur + '-sub').addClass(activeClass);
                        } else {
                            $('.dash-form__error--milestone-' + cur + '-sub').removeClass(activeClass);
                        }

                        if($('#input-milestone-' + cur + '-terms').val() < 1){
                            $('.dash-form__error--milestone-' + cur + '-terms').addClass(activeClass);
                        } else {
                            $('.dash-form__error--milestone-' + cur + '-terms').removeClass(activeClass);
                        }

                        if($('#input-milestone-' + cur + '-image').val() < 1){
                            $('.dash-form__error--milestone-' + cur + '-image').addClass(activeClass);
                        } else {
                            $('.dash-form__error--milestone-' + cur + '-image').removeClass(activeClass);
                        }

                        if($('#input-milestone-' + cur + '-target').val() < 1){
                            $('.dash-form__error--milestone-' + cur + '-target').addClass(activeClass);
                        } else {
                            $('.dash-form__error--milestone-' + cur + '-target').removeClass(activeClass);
                        }
                    }
                });
            
            </script>                                             
        </form>                  
    </div>


<?php include 'includes/admin-footer.php'; ?>
