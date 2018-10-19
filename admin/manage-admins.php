

<?php include 'includes/admin-header.php'; ?>      
<?php include 'includes/admin-info.php'; ?> 
<?php include 'includes/admin-nav.php'; ?>

    <div class="dash__content">
        <h3 class="title u-mar-b__tiny">Manage Admins</h3>
        <table class="table u-mar-b__huge">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Role</th>
                <th>Edit</th>                               
            </tr>
            <?php 
            
            $select_all_admins_sql_string = "SELECT * FROM users ORDER BY name";
            $select_all_admins_query = mysqli_query($connection, $select_all_admins_sql_string);

            while($row = mysqli_fetch_assoc($select_all_admins_query)) {
                $user_id = $row['id'];
                $user_name = $row['name'];
                $user_email = $row['email'];
                $user_country_id = $row['country_id'];

                $select_country_name_string = "SELECT * FROM countries WHERE id = $user_country_id";
                $select_country_name_query = mysqli_query($connection, $select_country_name_string);

                while($countryRow = mysqli_fetch_assoc($select_country_name_query)) {
                    $user_country_name = $countryRow['label'];                    
                }

                $user_reward_role_id = $row['reward_role_id'];  

                $select_role_name_string = "SELECT * FROM rewards_role WHERE id = $user_reward_role_id ";
                $select_role_name_query = mysqli_query($connection, $select_role_name_string);

                while($roleRow = mysqli_fetch_assoc($select_role_name_query)) {
                    $user_role_name = $roleRow['label'];                    
                }                         
            ?>
                <tr>
                    <td><?php echo $user_name ?></td>
                    <td><?php echo $user_email ?></td>
                    <td><?php echo $user_country_name ?></td>
                    <td><?php echo $user_role_name ?></td>
                    <td class="u-center"><a href="edit-admin.php?u_id=<?php echo $user_id; ?>"><i class="fas fa-edit"></i></a></td>                         
                </tr>  
            <?php 
            }
            ?>
        </table>                      
    </div>


<?php include 'includes/admin-footer.php'; ?>
         