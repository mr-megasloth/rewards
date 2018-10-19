<?php

$select_role_name_string = "SELECT * FROM rewards_role WHERE id = $user_reward_role_id";
$select_role_name_query = mysqli_query($connection, $select_role_name_string);
while($row = mysqli_fetch_assoc($select_role_name_query)){
    $user_reward_role_name = $row['label'];
}

?>


<div class="dash__info">           
    <!-- <a href="#" class="dash__message">
        <i class="far fa-envelope dash__message-icon"></i>
        <span class="dash__message-num">3</span>
    </a>
    
    <a href="#" class="dash__notification">
        <i class="far fa-bell dash__notification-icon"></i>
        <span class="dash__notification-num">1</span>
    </a> -->
    <div class="dash__user-cont">
        <p class="dash__user-name"><?php echo $user_name . ' (' . $user_reward_role_name . ')';  ?></p>
        <div class="dash__user-img-cont">
            <img src="../assets/images/user.png" alt="User Icon" class="dash__user-img">
        </div>                   
    </div>
</div>
<div class="dash__interface">