<?php include 'includes/admin-header.php'; ?>      
<?php include 'includes/admin-info.php'; ?> 
<?php include 'includes/admin-nav.php'; ?>

<?php 

if(isset($_GET['c_id'])){
    $country_to_edit_id = $_GET['c_id'];  
    
    $update_old_default_string = "UPDATE countries SET ";
    $update_old_default_string .= "reward_role = 0 "; 
    $update_old_default_string .= "WHERE reward_role = 1 ";

    $update_old_default_query = mysqli_query($connection, $update_old_default_string);

    if(!$update_old_default_query) {
        die('Query Failed ' . mysqli_error($connection));                    
    }
  
    $update_new_country_string = "UPDATE countries SET ";
    $update_new_country_string .= "reward_role = 1 "; 
    $update_new_country_string .= "WHERE id = {$country_to_edit_id} ";

    $update_new_country_query = mysqli_query($connection, $update_new_country_string);

    if(!$update_new_country_query) {
        die('Query Failed ' . mysqli_error($connection));                    
    }
}  

?>


    <div class="dash__content">
        <h3 class="title u-mar-b__tiny">Manage Admins</h3>
        <table class="table table--small u-mar-b__huge">
           <tr>
               <th>Country</th>                               
               <th>Default</th> 
           </tr>
           <?php 
           
           $select_all_countries_string = "SELECT * FROM countries ORDER BY label";
           $select_all_countries_query = mysqli_query($connection, $select_all_countries_string);

            if(!$select_all_countries_query) {
                die('Query Failed ' . mysqli_error($connection));                    
            }

            while($row = mysqli_fetch_assoc($select_all_countries_query)){
                $country_id = $row['id'];
                $country_reward_role = $row['reward_role'];
                $country_label = $row['label'];                    
            ?>
            <tr>
                <td><?php echo $country_label; ?></td>
                <td>
                    <?php if($country_reward_role == 1){
                        echo "Default Country";
                    } else {
                        echo "<a class='dash-form__submit dash-form__submit--default' href='manage-countries.php?c_id=$country_id'>Change to default</a>";
                    }
                    
                    ?>
                </td> 
            </tr>  

            <?php 
            }
            ?>                              
                           
        </table>                         
    </div>


<?php include 'includes/admin-footer.php'; ?>
  



 