<?php include 'includes/admin-header.php'; ?>  
<?php 
    $select_current_string = "SELECT * FROM challenge_headers WHERE country_id = $user_country_id";
    $select_current_query = mysqli_query($connection, $select_current_string);
  
    while($row = mysqli_fetch_assoc($select_current_query)){
        $cur_header_title = $row['title'];
        $cur_header_body_text = $row['body_text'];
        $cur_header_image = $row['image'];          

        $select_cur_count_name_string = "SELECT * FROM countries WHERE id = $user_country_id";
        $select_cur_count_name_query = mysqli_query($connection, $select_cur_count_name_string);
        
        while($countryRow = mysqli_fetch_assoc($select_cur_count_name_query)){
            $cur_header_country_name = $countryRow['label'];
        }    
    }
?>
<?php 

    if(isset($_GET['updated']) == 'success'){
        echo '<h3 class="success">The header was successfully edited</h3>';
    }
?>
<?php 
    if(isset($_POST['update_header_submit'])){  
        $header_country = $_POST['header_country'];
        $header_title = $_POST['header_title'];
        $header_body_text = $_POST['header_body_text'];
        $header_image = $_FILES['header_image']['name'];    
        $header_image_temp = $_FILES['header_image']['tmp_name'];    
        
        move_uploaded_file($header_image_temp, "../uploads/images/{$header_image}"); 
        
         //If there is then just update
        if(!$header_image) {
            $header_image = $cur_header_image;
        } 
           

            $update_header_string = $update_challenge_string = "UPDATE challenge_headers SET ";
            $update_header_string .= "title = '{$header_title}', "; 
            $update_header_string .= "body_text = '{$header_body_text}', "; 
            $update_header_string .= "image = '{$header_image}', "; 
            $update_header_string .= "created_by_id = '{$user_id}' "; 
            $update_header_string .= " WHERE country_id = '{$header_country}' ";           

            $update_header_query = mysqli_query($connection, $update_header_string);

            if(!$update_header_query) {
                die('Query Failed' . mysqli_error($connection));
            } else {
                 echo "<script> location.replace('edit-header.php?updated=success'); </script>";  
            }
    }    
?>


<?php include 'includes/admin-info.php'; ?> 
<?php include 'includes/admin-nav.php'; ?>
    <div class="dash__content" style="font-size:12px;">
        <h3 class="title u-mar-b__sml">Edit Header</h3>
        <form id="update-partner-progress-form" class="dash-form " method="post" enctype="multipart/form-data">
       
  
        <div class="dash-form__form-group">
            <label for="header_country" class="dash-form__label">Country</label>
            <select id="country-selector" class="dash-form__select" name="header_country">
          
                <?php 
                   if($user_reward_role_id == 3){
                ?>                    
                      <option value="<?php echo $user_country_id ?>"><?php echo $cur_header_country_name; ?></option>
                <?php

                    //If SUPER ADMIN
                        $select_all_countries_string = "SELECT * FROM countries WHERE id != $user_country_id ORDER BY label";
                        $select_all_countries_query = mysqli_query($connection, $select_all_countries_string);

                        $countriesAr = array();
              
                        if(!$select_all_countries_query) {
                            die('Query Failed ' . mysqli_error($connection));                    
                        }
              
                        while($row = mysqli_fetch_assoc($select_all_countries_query)){
                              $country_id = $row['id'];
                              $country_reward_role = $row['reward_role'];
                              $country_label = $row['label']; 
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
            </div>   
            <div class="dash-form__form-group">
                <label for="header_title" class="dash-form__label">Title</label>
                <input id="input-title" name="header_title" type="text" class="dash-form__input"  value="<?php echo $cur_header_title; ?>">
            </div>
            <div class="dash-form__form-group">
                <label for="header_body-text" class="dash-form__label">Body Text</label>
                <input id="input-body-text" name="header_body_text" type="text" class="dash-form__input" value="<?php echo $cur_header_body_text; ?>">
            </div>
            <div class="dash-form__form-group">
                <label for="header_image"  class="dash-form__label">Header Image</label>                
                <input id="input-header-image"  name="header_image" type="file" class="dash-form__input dash-form__input--file">
            </div>
            <img class="dash-form__header-img" src="../uploads/images/<?php echo $cur_header_image; ?>" alt="">
            <div class="dash-from__form-group dash-form__form-group--submit">
                <input class="dash-form__submit" name="update_header_submit" value="Submit" type="submit">  
            </div>                        
        </form>
    </div>
    <script>
    $(function(){       

        var allHeaders = {};
       
        <?php 
            $all_header_data_string = "SELECT * FROM challenge_headers";
            $all_header_data_query = mysqli_query($connection, $all_header_data_string);

            while($row = mysqli_fetch_assoc($all_header_data_query)){
                $header_id = $row['id'];
                $header_title = $row['title'];
                $header_body_text = $row['body_text'];
                $header_image = $row['image'];
                $header_country_id = $row['country_id'];          
        ?>

                var title<?php echo $header_id; ?> = '<?php echo $header_title; ?>';
                var bodyText<?php echo $header_id; ?> = '<?php echo $header_body_text ?>';
                var image<?php echo $header_id; ?> = '<?php echo $header_image; ?>';

        <?php  
            }    
        ?>

        $('#country-selector').change(function(){
            var selectedId = $('#country-selector option:selected').attr('value');              
            $('#input-title').val(eval('title' + selectedId));    
            $('#input-body-text').val(eval('bodyText' + selectedId));    
            $('.dash-form__header-img').attr('src', '../uploads/images/' + eval('image' + selectedId));  
        });
    });

    </script>


<?php include 'includes/admin-footer.php'; ?>

