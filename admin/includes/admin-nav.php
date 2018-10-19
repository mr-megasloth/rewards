
<nav class="dash__nav">
    <ul class="dash__nav-ul">
        <li class="dash__nav-li">
            <a class="dash__nav-link" href="index.php" class="btn btn--admin">
                <i class="dash__nav-icon fas fa-home"></i>
                <span class="dash__nav-link-text">Home</span>                        
            </a>
        </li> 
        <li class="dash__nav-li">
             <a class="dash__nav-link" href="javascript:;" class="btn btn--admin">
                    <i class="dash__nav-icon fas fa-trophy"></i>
                <span class="dash__nav-link-text">Manage Challenges</span>
                <i class="fas fa-chevron-down dash__nav-link-drop-icon"></i>
            </a>
            <ul class="dash__sub-nav">           
                <li class="dash__nav-li dash__nav-li--sub"> 
                    <a class="dash__nav-link" href="partner-challenges.php" class="btn btn--admin">
                        <i class="dash__nav-icon far fa-star"></i>
                        <span class="dash__nav-link-text">Manage Partner Challenges</span>
                    </a>
                    <a class="dash__nav-link dash__nav-link--indent" href="add-partner-challenge.php" class="btn btn--admin">
                        <i class="dash__nav-icon fas fa-users"></i>
                        <span class="dash__nav-link-text">Add Partner Challenge</span>
                    </a>    
                    <a class="dash__nav-link dash__nav-link--indent" href="archived-partner-challenges.php" class="btn btn--admin">
                        <i class="dash__nav-icon fas fas fa-archive"></i>
                        <span class="dash__nav-link-text">Archived Partner Challenges</span>
                    </a>    
                    <a class="dash__nav-link" href="personal-challenges.php" class="btn btn--admin">
                        <i class="dash__nav-icon far fa-star"></i>
                        <span class="dash__nav-link-text">Manage Personal Challenges</span>
                    </a>                                      
                    <a class="dash__nav-link dash__nav-link--indent" href="add-personal-challenge.php" class="btn btn--admin">
                        <i class="dash__nav-icon fas fas fa-user"></i>
                        <span class="dash__nav-link-text">Add Personal Challenge</span>
                    </a>
                    <a class="dash__nav-link dash__nav-link--indent" href="archived-personal-challenges.php" class="btn btn--admin">
                        <i class="dash__nav-icon fas fa-archive"></i>
                        <span class="dash__nav-link-text">Archived Personal Challenges</span>
                    </a>    
                </li>              
            </ul>        
        </li>  
        <li class="dash__nav-li">
            <a class="dash__nav-link" href="edit-header.php" class="btn btn--admin">
                <i class="dash__nav-icon far fa-edit"></i>
                <span class="dash__nav-link-text">Edit Header</span>                        
            </a>
        </li>       
        <?php             
            if($user_reward_role_id == 3) {
                echo            
                '<li class="dash__nav-li">
                    <a class="dash__nav-link" href="javascript:;" class="btn btn--admin">
                        <i class="dash__nav-icon fas fa-lock"></i>
                        <span class="dash__nav-link-text">Super Admin</span>
                        <i class="fas fa-chevron-down dash__nav-link-drop-icon"></i>
                    </a>
                    <ul class="dash__sub-nav">
                        <li class="dash__nav-li dash__nav-li--sub"> 
                            <a class="dash__nav-link" href="manage-admins.php" class="btn btn--admin">
                                <i class="dash__nav-icon fas fa-unlock"></i>
                                <span class="dash__nav-link-text">Manage Admins</span>
                            </a>
                        </li>
                        <li class="dash__nav-li dash__nav-li--sub"> 
                            <a class="dash__nav-link" href="manage-countries.php" class="btn btn--admin">
                                <i class="dash__nav-icon fas fa-globe-americas"></i>
                                <span class="dash__nav-link-text">Manage Countries</span>
                            </a>
                        </li>                                                  
                    </ul>                  
                </li>';
            }
        ?>
    </ul>
</nav>   