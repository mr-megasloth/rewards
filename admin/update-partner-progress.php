<?php include 'includes/admin-header.php'; ?>    
<?php
    if(isset($_GET['c_id'])){
        //Get Values from the Database
        //Select the Challenge from the database and assign it's columns to variables.  
        $challenge_id = $_GET['c_id'];

        $select_challenge_string = "SELECT * FROM challenges_partner WHERE id = $challenge_id";
        $select_challenge_query = mysqli_query($connection, $select_challenge_string);

        while($row = mysqli_fetch_assoc($select_challenge_query)){          
            $cur_challenge_name = $row['name'];
            $cur_challenge_units = $row['units'];
            $cur_challenge_target_progress = $row['target_progress'];
        }
    }  else {
        header("location: partner-challenges.php");
    }
?>

<?php 
    if(isset($_POST['update_progress_submit'])){
        $updated_target_progress = $_POST['target_progress'];
        
        $update_challenge_progress_string = "UPDATE challenges_partner SET ";
        $update_challenge_progress_string .= "target_progress = '{$updated_target_progress}' ";
        $update_challenge_progress_string .= "WHERE id = '{$challenge_id}' ";

        $update_challenge_progress_query = mysqli_query($connection, $update_challenge_progress_string);   
        
        echo "<script> location.replace('update-partner-progress.php?c_id=$challenge_id'); </script>"; 
    }

?>
  
<?php include 'includes/admin-info.php'; ?> 
<?php include 'includes/admin-nav.php'; ?>
    <div class="dash__content" style="font-size:12px;">
        <h3 class="title u-mar-b__sml">Updating Progress For : <span style="text-decoration: underline; text-transform:uppercase;"><?php echo $cur_challenge_name;?></span></h3>
        <form id="update-partner-progress-form" class="dash-form dash-form--admin" method="post" enctype="multipart/form-data">
            <div class="dash-form__form-group">
                    <label for="target_progress"  class="dash-form__label">Total Progress (<?php echo $cur_challenge_units; ?>)</label>
                    <input id="input-milestone-4-target" name="target_progress" type="number" class="dash-form__input" value="<?php echo  $cur_challenge_target_progress; ?>">
                </div>
                <p class="dash-form__error dash-form__error--milestone-4-target">Please enter a target or remove milestone</p>  
                <div class="dash-form__form-group dash-form__form-group--submit">
                    <input class="dash-form__submit" name="update_progress_submit" value="Submit" type="submit">  
                </div>                        
        </form>
    </div>
<?php include 'includes/admin-footer.php'; ?>

