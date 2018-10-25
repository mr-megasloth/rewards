<?php include "includes/db.php";?>
<?php session_start(); ?>
<?php 
if(isset($_SESSION['status'])){
    $user_id =$_SESSION['id'];
    $user_name = $_SESSION['name'];
    $user_email = $_SESSION['email'];
    $user_country_id = $_SESSION['country_id'];
    $user_company_id = $_SESSION['company_id'];
    $user_reward_role_id = $_SESSION['reward_role_id'];

    $select_company_name_string = "SELECT * FROM companies WHERE id = $user_company_id ";
    $select_company_name_query = mysqli_query($connection, $select_company_name_string);
    while($row = mysqli_fetch_assoc($select_company_name_query)) {
        $user_company_name = $row['name'];
    }

    $select_country_name_string = "SELECT * FROM countries WHERE id = $user_country_id ";
    $select_country_name_query = mysqli_query($connection, $select_country_name_string);
    while($row = mysqli_fetch_assoc($select_country_name_query)) {
        $user_country_name = $row['label'];
    }
} else {
    echo "<script> location.replace('../index.php?logout=yes');</script>";      
}
    
?>
<?php 
if(isset($_GET['logout'])){
    $logout_status = $_GET['logout'];
    if($logout_status == 'true') {
        session_destroy(); 
        $_SESSION = array();
        echo "<script> location.replace('index.php?logout=yes'); </script>";      
    }
}
?>
<?php include "includes/header.php";?>
    <main id="dashboard"> 
        <header class="header u-wrap">
            <div class="header__logo-cont">
                <img src="assets/images/flyhigher-reward-logo.png" alt="Ingram FlyHigher Rewards, Partner Incentive Program" class="header__logo">
            </div>
         
            <div class="header__right">
                <div class="header__ingram-logo-cont">
                    <img src="assets/images/ingram-logo-blue.png" alt="Ingram Logo" class="header__ingram-logo">
                </div>
                <a href="dashboard.php?logout=true" class="country-select__logout-link country-select__logout-link--active">Logout</a>       
            </div>           
        </header>
        <section class="challenge-header u-wrap u-center">
            <?php             
                $select_header_string = "SELECT * FROM challenge_headers WHERE country_id = $user_country_id";
                $select_header_query = mysqli_query($connection, $select_header_string);

                while($row = mysqli_fetch_assoc($select_header_query)){
                    $header_title = $row['title'];
                    $header_body_text = $row['body_text'];
                    $header_image = $row['image'];
                }
            ?>    
            <div class="challenge-header__img-cont">
                <img src="uploads/images/<?php echo $header_image; ?>" alt="Header Image" class="challenge-header__img">
            </div>        
            <h3 class="challenge-header__title"><?php echo $header_title; ?></h3>
            <p class="challenge-header__text u-mar-b__huge"><?php echo $header_body_text; ?></p>

            <h3 class="challenge-header__welcome title ">Welcome <?php echo $user_name;?></h3>           
        </section>
    
        <section class="dash dash--logged-in u-wrap challenge-wrapper">
        
            <div class="challenge-table u-mar-b__huge">                
                <h3 class="challenge-table__title title u-mar-b__tiny">Personal Challenge : </h3>                           
                <div class="challenge-table__head">
                    <div class="challenge-table__head-item challenge-table__head-item--title">
                        <span class="challenge-table__head-item-title">Challenge</span>
                    </div>
                    <div class="challenge-table__head-item challenge-table__head-item--units">
                        <span class="challenge-table__head-item-title">Units</span>
                    </div>
                    <div class="challenge-table__head-item challenge-table__head-item--progress">
                        <span class="challenge-table__head-item-title">Progress</span>
                    </div>
                    <div class="challenge-table__head-item challenge-table__head-item--btn-cont">
                        
                    </div>
                </div>
                <div class="challenge-table__body">   
                <?php 
                    $select_challenge_string = "SELECT * FROM challenges_personal WHERE participant_id = $user_id";
                    $select_challenge_query = mysqli_query($connection, $select_challenge_string);
                    if (mysqli_num_rows($select_challenge_query) > 0) {
                        mysqli_num_rows($select_challenge_query);
                        while($row = mysqli_fetch_assoc($select_challenge_query)){
                            $challenge_id = $row['id'];
                            $challenge_title = $row['title'];
                            $challenge_description = $row['description'];
                            $challenge_dashboard_icon = $row['dashboard_icon'];
                            $challenge_units = $row['units'];
                          
                            $challenge_progress = $row['target_progress'];
                           
                            $challenge_milestones = $row['milestones'];
                            $challenge_milestone_title_1 = $row['milestone_title_1'];
                            $challenge_milestone_sub_1 = $row['milestone_sub_1'];
                            $challenge_milestone_terms_1 = $row['milestone_terms_1'];
                            $challenge_milestone_image_1 = $row['milestone_image_1'];
                            $challenge_milestone_target_1 = $row['milestone_target_1'];
                            $challenge_milestone_title_2 = $row['milestone_title_2'];
                            $challenge_milestone_sub_2 = $row['milestone_sub_2'];
                            $challenge_milestone_terms_2 = $row['milestone_terms_2'];
                            $challenge_milestone_image_2 = $row['milestone_image_2'];
                            $challenge_milestone_target_2 = $row['milestone_target_2'];
                            $challenge_milestone_title_3 = $row['milestone_title_3'];
                            $challenge_milestone_sub_3 = $row['milestone_sub_3'];
                            $challenge_milestone_terms_3 = $row['milestone_terms_3'];
                            $challenge_milestone_image_3 = $row['milestone_image_3'];
                            $challenge_milestone_target_3 = $row['milestone_target_3'];
                            $challenge_milestone_title_4 = $row['milestone_title_4'];
                            $challenge_milestone_sub_4 = $row['milestone_sub_4'];
                            $challenge_milestone_terms_4 = $row['milestone_terms_4'];
                            $challenge_milestone_image_4 = $row['milestone_image_4'];
                            $challenge_milestone_target_4 = $row['milestone_target_4'];
                            
                            switch($challenge_milestones) {
                                case 1: $challenge_target = $row['milestone_target_1'];
                                        $final_milestone_image = $challenge_milestone_image_1;
                                        $final_milestone_target = $challenge_milestone_target_1;
                                        $final_milestone_title = $challenge_milestone_title_1;
                                        $final_milestone_sub = $challenge_milestone_sub_1;
                                break;
                                case 2: $challenge_target = $row['milestone_target_2'];
                                        $final_milestone_image = $challenge_milestone_image_2;
                                        $final_milestone_target = $challenge_milestone_target_2;
                                        $final_milestone_title = $challenge_milestone_title_2;
                                        $final_milestone_sub = $challenge_milestone_sub_2;
                                break;
                                case 3: $challenge_target = $row['milestone_target_3'];
                                        $final_milestone_image = $challenge_milestone_image_3;
                                        $final_milestone_target = $challenge_milestone_target_3;
                                        $final_milestone_title = $challenge_milestone_title_3;
                                        $final_milestone_sub = $challenge_milestone_sub_3;
                                break;
                                case 4: $challenge_target = $row['milestone_target_4'];
                                        $final_milestone_image = $challenge_milestone_image_4;
                                        $final_milestone_target = $challenge_milestone_target_4;
                                        $final_milestone_title = $challenge_milestone_title_4;
                                        $final_milestone_sub = $challenge_milestone_sub_4;
                                break;
                            }

                            $challenge_percentage = ($challenge_progress / $challenge_target) * 100;
                ?>


                    <!-- Start of Challenge -->         
                    <div class="challenge">                
                        <div class="challenge__preview">
                            <div class="challenge__preview-item challenge__preview-item--title">
                                <span class="challenge__preview-item-title"><?php echo $challenge_title; ?></span>
                            </div>
                            <div class="challenge__preview-item challenge__preview-item--units">
                                <span class="challenge__preview-item-title"><?php echo $challenge_units; ?></span>
                            </div>
                            <div class="challenge__preview-item challenge__preview-item--progress">
                                <span class="challenge__preview-item-title"><?php echo $challenge_percentage . '%';?></span>
                            </div>
                            <div class="challenge__preview-item challenge__preview-item--btn-cont">
                                <a class="challenge__btn" data-challenge-btn-id="<?php echo $challenge_id; ?>" href="javascript:;"><i  class="challenge__arrow-icon fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- 1 Milestone -->
                        <div data-challenge-id="<?php echo $challenge_id; ?>" class="challenge__content">                 
                            <div class="challenge__milestones-cont">
                            <script>
                                $(function(){
                                    var cur = <?php echo $challenge_id; ?>;
                                    var curSelector = $("div[data-challenge-id = '" + cur + "']");

                                    var milestones = <?php echo $challenge_milestones;?>;
                                    var progress = <?php echo $challenge_progress; ?>;
                                    var overallPercentage = <?php echo $challenge_percentage; ?>;
                             
                                    var overallTarget = <? echo $challenge_target;?>;                           

                                    var target1 = <?php echo $challenge_milestone_target_1;?>;
                                    var target1Percentage = (target1 / overallTarget) * 100;

                                    var target2 = <?php echo $challenge_milestone_target_2;?>;
                                    var target2Percentage = (target2 / overallTarget) * 100;

                                    var target3 = <?php echo $challenge_milestone_target_3;?>;
                                    var target3Percentage = (target3 / overallTarget) * 100;

                                    var selector =  $('div[data-challenge-id="<?php $challenge_id ?>"]');
                                   
                                    switch(milestones){
                                        case 2: 
                                            $(curSelector).find('.milestone--step-1').addClass('milestone--step-active').css('left',  target1Percentage + '%');
                                            if(progress >= target1) {
                                                $(curSelector).find('.milestone--step-1').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-1').find('.milestone__prize').addClass('milestone__prize--active');
                                            }
                                        break
                                        case 3:
                                            $(curSelector).find('.milestone--step-1').addClass('milestone--step-active').css('left',  target1Percentage + '%');
                                            $(curSelector).find('.milestone--step-2').addClass('milestone--step-active').css('left',  target2Percentage + '%');

                                            if(progress >= target1) {
                                                $(curSelector).find('.milestone--step-1').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-1').find('.milestone__prize').addClass('milestone__prize--active');
                                            }

                                            if(progress >= target2) {
                                                $(curSelector).find('.milestone--step-2').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-2').find('.milestone__prize').addClass('milestone__prize--active');
                                            }
                                        break
                                        case 4:
                                            $(curSelector).find('.milestone--step-1').addClass('milestone--step-active').css('left',  target1Percentage + '%');
                                            $(curSelector).find('.milestone--step-2').addClass('milestone--step-active').css('left',  target2Percentage + '%');
                                            $(curSelector).find('.milestone--step-3').addClass('milestone--step-active').css('left',  target3Percentage + '%');

                                            if(progress >= target1) {
                                                $(curSelector).find('.milestone--step-1').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-1').find('.milestone__prize').addClass('milestone__prize--active');
                                            }

                                            if(progress >= target2) {
                                                $(curSelector).find('.milestone--step-2').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-2').find('.milestone__prize').addClass('milestone__prize--active');
                                            }

                                            if(progress >= target3) {
                                                $(curSelector).find('.milestone--step-3').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-3').find('.milestone__prize').addClass('milestone__prize--active');
                                            }                                           
                                        break
                                        default:                                                                                    
                                    }
                                    
                                    $(curSelector).find('.progress-bar__inner').css('width',  overallPercentage + '%');         

                                    if(overallPercentage == 100) {                              
                                        $(curSelector).find('.milestone--final').find('.milestone__complete').addClass('milestone__complete--active');
                                        $(curSelector).find('.milestone--final').find('.milestone__prize').addClass('milestone__prize--active');
                                    } 
                                });

                            </script>

                            <!--Milestone Step 1-->
                                <div class="milestone milestone--step milestone--step-1 ">
                                    <div class="milestone__complete">
                                        <canvas class="milestone__canvas" id="confetti-1-<?php echo $challenge_id; ?>"></canvas>
                                        <script>
                                            $(function(){
                                                var confettiSettings = { 
                                                    target: 'confetti-1-<?php echo $challenge_id; ?>',
                                                    max : 20,
                                                    size : 1.4,
                                                    clock : 40, 
                                                    width : 300,
                                                    height: 300
                                                };    
                                                var confetti = new ConfettiGenerator(confettiSettings);
                                                confetti.render();
                                            });                                                                    
                                        </script>
                                    </div>
                                    <img src="uploads/images/<?php echo $challenge_milestone_image_1 ?>" alt="Prize" class="milestone__prize">
                                    <p class="milestone__title"><?php echo $challenge_milestone_title_1; ?></p>
                                    <p class="milestone__sub"><?php echo $challenge_milestone_sub_1; ?></p>
                                    <p class="milestone__target"><?php echo $challenge_units . $challenge_milestone_target_1; ?></p>
                                </div>
                            <!--Milestone Step 2-->
                                <div class="milestone milestone--step milestone--step-2">
                                    <div class="milestone__complete">
                                        <canvas class="milestone__canvas" id="confetti-2-<?php echo $challenge_id; ?>"></canvas>
                                        <script>
                                            $(function(){
                                                var confettiSettings = { 
                                                    target: 'confetti-2-<?php echo $challenge_id; ?>',
                                                    max : 20,
                                                    size : 1.4,
                                                    clock : 40, 
                                                    width : 300,
                                                    height: 300
                                                };    
                                                var confetti = new ConfettiGenerator(confettiSettings);
                                                confetti.render();
                                            });                                                                    
                                        </script>
                                    </div>
                                    <img src="uploads/images/<?php echo $challenge_milestone_image_2 ?>" alt="Prize" class="milestone__prize">
                                    <p class="milestone__title"><?php echo $challenge_milestone_title_2; ?></p>
                                    <p class="milestone__sub"><?php echo $challenge_milestone_sub_2; ?></p>
                                    <p class="milestone__target"><?php echo $challenge_units . $challenge_milestone_target_2; ?></p>
                                </div>
                            <!--Milestone Step 3-->
                                <div class="milestone milestone--step milestone--step-3">
                                    <div class="milestone__complete">
                                        <canvas class="milestone__canvas" id="confetti-3-<?php echo $challenge_id; ?>"></canvas>
                                        <script>
                                            $(function(){
                                                var confettiSettings = { 
                                                    target: 'confetti-3-<?php echo $challenge_id; ?>',
                                                    max : 20,
                                                    size : 1.4,
                                                    clock : 40, 
                                                    width : 300,
                                                    height: 300
                                                };    
                                                var confetti = new ConfettiGenerator(confettiSettings);
                                                confetti.render();
                                            });                                                                    
                                        </script>
                                    </div>
                                    <img src="uploads/images/<?php echo $challenge_milestone_image_3 ?>" alt="Prize" class="milestone__prize">
                                    <p class="milestone__title"><?php echo $challenge_milestone_title_3; ?></p>
                                    <p class="milestone__sub"><?php echo $challenge_milestone_sub_3; ?></p>
                                    <p class="milestone__target"><?php echo $challenge_units . $challenge_milestone_target_3; ?></p>
                                </div>
                            </div>
                              <!--Milestone Final Step-->
                            <div class="milestone milestone--final">
                                <div class="milestone__complete">
                                    <canvas class="milestone__canvas" id="confetti-final-<?php echo $challenge_id; ?>"></canvas>
                                    <script>
                                        $(function(){
                                            var confettiSettings = { 
                                                target: 'confetti-final-<?php echo $challenge_id; ?>',
                                                max : 20,
                                                size : 1,
                                                clock : 40, 
                                                width : 300,
                                                height: 300, 
                                                props : [
                                                    { "type": "svg", "src": "assets/images/star.svg" }
                                                ]
                                            };    
                                            var confetti = new ConfettiGenerator(confettiSettings);
                                            confetti.render();
                                        });                                                                    
                                    </script>
                                </div>
                                <img src="uploads/images/<?php echo $final_milestone_image; ?>" alt="Prize" class="milestone__prize milestone__prize--final">
                                <p class="milestone__title"><?php echo $final_milestone_title; ?></p>
                                <p class="milestone__sub"><?php echo $final_milestone_sub; ?></p>
                                <p class="milestone__target"><?php echo $challenge_units . $final_milestone_target; ?></p>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-bar__inner"></div>
                                <div class="progress-bar__marker progress-bar__marker--1"></div>
                            </div>                            
                        </div>  
                        <!--end of 1 Milestone-->             
                    </div> 
                    <!-- End of Challenge -->
                    <?php
                        } 
                    }else {
                        echo "You have not challenges at this time";
                    }                            
                        ?>
        

                </div>
            </div>  
        
            <div class="challenge-table">                
                <h3 class="challenge-table__title title u-mar-b__tiny">Partner Challenge : </h3>                           
                <div class="challenge-table__head">
                    <div class="challenge-table__head-item challenge-table__head-item--title">
                        <span class="challenge-table__head-item-title">Challenge</span>
                    </div>
                    <div class="challenge-table__head-item challenge-table__head-item--units">
                        <span class="challenge-table__head-item-title">Units</span>
                    </div>
                    <div class="challenge-table__head-item challenge-table__head-item--progress">
                        <span class="challenge-table__head-item-title">Progress</span>
                    </div>
                    <div class="challenge-table__head-item challenge-table__head-item--btn-cont">
                        
                    </div>
                </div>
                <div class="challenge-table__body">   
                <?php 
                    $select_challenge_string = "SELECT * FROM challenges_partner WHERE participant_id = $user_company_id";
                    $select_challenge_query = mysqli_query($connection, $select_challenge_string);
                    if (mysqli_num_rows($select_challenge_query) > 0) {
                        mysqli_num_rows($select_challenge_query);
                        while($row = mysqli_fetch_assoc($select_challenge_query)){
                            $challenge_id = $row['id'];
                            $challenge_title = $row['title'];
                            $challenge_description = $row['description'];
                            $challenge_dashboard_icon = $row['dashboard_icon'];
                            $challenge_units = $row['units'];                 
                            $challenge_progress = $row['target_progress'];                            
                            $challenge_milestones = $row['milestones'];
                            $challenge_milestone_title_1 = $row['milestone_title_1'];
                            $challenge_milestone_sub_1 = $row['milestone_sub_1'];
                            $challenge_milestone_terms_1 = $row['milestone_terms_1'];
                            $challenge_milestone_image_1 = $row['milestone_image_1'];
                            $challenge_milestone_target_1 = $row['milestone_target_1'];
                            $challenge_milestone_title_2 = $row['milestone_title_2'];
                            $challenge_milestone_sub_2 = $row['milestone_sub_2'];
                            $challenge_milestone_terms_2 = $row['milestone_terms_2'];
                            $challenge_milestone_image_2 = $row['milestone_image_2'];
                            $challenge_milestone_target_2 = $row['milestone_target_2'];
                            $challenge_milestone_title_3 = $row['milestone_title_3'];
                            $challenge_milestone_sub_3 = $row['milestone_sub_3'];
                            $challenge_milestone_terms_3 = $row['milestone_terms_3'];
                            $challenge_milestone_image_3 = $row['milestone_image_3'];
                            $challenge_milestone_target_3 = $row['milestone_target_3'];
                            $challenge_milestone_title_4 = $row['milestone_title_4'];
                            $challenge_milestone_sub_4 = $row['milestone_sub_4'];
                            $challenge_milestone_terms_4 = $row['milestone_terms_4'];
                            $challenge_milestone_image_4 = $row['milestone_image_4'];
                            $challenge_milestone_target_4 = $row['milestone_target_4'];

                            switch($challenge_milestones) {
                                case 1: $challenge_target = $row['milestone_target_1'];
                                        $final_milestone_image = $challenge_milestone_image_1;
                                        $final_milestone_target = $challenge_milestone_target_1;
                                        $final_milestone_title = $challenge_milestone_title_1;
                                        $final_milestone_sub = $challenge_milestone_sub_1;
                                break;
                                case 2: $challenge_target = $row['milestone_target_2'];
                                        $final_milestone_image = $challenge_milestone_image_2;
                                        $final_milestone_target = $challenge_milestone_target_2;
                                        $final_milestone_title = $challenge_milestone_title_2;
                                        $final_milestone_sub = $challenge_milestone_sub_2;
                                break;
                                case 3: $challenge_target = $row['milestone_target_3'];
                                        $final_milestone_image = $challenge_milestone_image_3;
                                        $final_milestone_target = $challenge_milestone_target_3;
                                        $final_milestone_title = $challenge_milestone_title_3;
                                        $final_milestone_sub = $challenge_milestone_sub_3;
                                break;
                                case 4: $challenge_target = $row['milestone_target_4'];
                                        $final_milestone_image = $challenge_milestone_image_4;
                                        $final_milestone_target = $challenge_milestone_target_4;
                                        $final_milestone_title = $challenge_milestone_title_4;
                                        $final_milestone_sub = $challenge_milestone_sub_4;
                                break;
                            }

                            $challenge_percentage = ($challenge_progress / $challenge_target) * 100;
                ?>


                    <!-- Start of Challenge -->         
                    <div class="challenge">                
                        <div class="challenge__preview">
                            <div class="challenge__preview-item challenge__preview-item--title">
                                <span class="challenge__preview-item-title"><?php echo $challenge_title; ?></span>
                            </div>
                            <div class="challenge__preview-item challenge__preview-item--units">
                                <span class="challenge__preview-item-title"><?php echo $challenge_units; ?></span>
                            </div>
                            <div class="challenge__preview-item challenge__preview-item--progress">
                                <span class="challenge__preview-item-title"><?php echo $challenge_percentage . '%';?></span>
                            </div>
                            <div class="challenge__preview-item challenge__preview-item--btn-cont">
                                <a class="challenge__btn" data-challenge-btn-id="<?php echo $challenge_id; ?>" href="javascript:;"><i  class="challenge__arrow-icon fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- 1 Milestone -->
                        <div data-challenge-id="<?php echo $challenge_id; ?>" class="challenge__content">                 
                            <div class="challenge__milestones-cont">
                            <script>
                                $(function(){
                                    var cur = <?php echo $challenge_id; ?>;
                                    var curSelector = $("div[data-challenge-id = '" + cur + "']");

                                    var milestones = <?php echo $challenge_milestones;?>;
                                    var progress = <?php echo $challenge_progress; ?>;
                                    var overallPercentage = <?php echo $challenge_percentage; ?>;
                             
                                    var overallTarget = <? echo $challenge_target;?>;                           

                                    var target1 = <?php echo $challenge_milestone_target_1;?>;
                                    var target1Percentage = (target1 / overallTarget) * 100;

                                    var target2 = <?php echo $challenge_milestone_target_2;?>;
                                    var target2Percentage = (target2 / overallTarget) * 100;

                                    var target3 = <?php echo $challenge_milestone_target_3;?>;
                                    var target3Percentage = (target3 / overallTarget) * 100;

                                    var selector =  $('div[data-challenge-id="<?php $challenge_id ?>"]');
                                   
                                    switch(milestones){
                                        case 2: 
                                            $(curSelector).find('.milestone--step-1').addClass('milestone--step-active').css('left',  target1Percentage + '%');
                                            if(progress >= target1) {
                                                $(curSelector).find('.milestone--step-1').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-1').find('.milestone__prize').addClass('milestone__prize--active');
                                            }
                                        break
                                        case 3:
                                            $(curSelector).find('.milestone--step-1').addClass('milestone--step-active').css('left',  target1Percentage + '%');
                                            $(curSelector).find('.milestone--step-2').addClass('milestone--step-active').css('left',  target2Percentage + '%');

                                            if(progress >= target1) {
                                                $(curSelector).find('.milestone--step-1').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-1').find('.milestone__prize').addClass('milestone__prize--active');
                                            }

                                            if(progress >= target2) {
                                                $(curSelector).find('.milestone--step-2').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-2').find('.milestone__prize').addClass('milestone__prize--active');
                                            }
                                        break
                                        case 4:
                                            $(curSelector).find('.milestone--step-1').addClass('milestone--step-active').css('left',  target1Percentage + '%');
                                            $(curSelector).find('.milestone--step-2').addClass('milestone--step-active').css('left',  target2Percentage + '%');
                                            $(curSelector).find('.milestone--step-3').addClass('milestone--step-active').css('left',  target3Percentage + '%');

                                            if(progress >= target1) {
                                                $(curSelector).find('.milestone--step-1').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-1').find('.milestone__prize').addClass('milestone__prize--active');
                                            }

                                            if(progress >= target2) {
                                                $(curSelector).find('.milestone--step-2').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-2').find('.milestone__prize').addClass('milestone__prize--active');
                                            }

                                            if(progress >= target3) {
                                                $(curSelector).find('.milestone--step-3').find('.milestone__complete').addClass('milestone__complete--active');
                                                $(curSelector).find('.milestone--step-3').find('.milestone__prize').addClass('milestone__prize--active');
                                            }                                           
                                        break
                                        default:                                                                                    
                                    }
                                    
                                    $(curSelector).find('.progress-bar__inner').css('width',  overallPercentage + '%');         

                                    if(overallPercentage == 100) {                              
                                        $(curSelector).find('.milestone--final').find('.milestone__complete').addClass('milestone__complete--active');
                                        $(curSelector).find('.milestone--final').find('.milestone__prize').addClass('milestone__prize--active');
                                    } 
                                });

                            </script>

                            <!--Milestone Step 1-->
                                <div class="milestone milestone--step milestone--step-1 ">
                                    <div class="milestone__complete">
                                        <canvas class="milestone__canvas" id="confetti-1-<?php echo $challenge_id; ?>"></canvas>
                                        <script>
                                            $(function(){
                                                var confettiSettings = { 
                                                    target: 'confetti-1-<?php echo $challenge_id; ?>',
                                                    max : 20,
                                                    size : 1.4,
                                                    clock : 40, 
                                                    width : 300,
                                                    height: 300
                                                };    
                                                var confetti = new ConfettiGenerator(confettiSettings);
                                                confetti.render();
                                            });                                                                    
                                        </script>
                                    </div>
                                    <img src="uploads/images/<?php echo $challenge_milestone_image_1 ?>" alt="Prize" class="milestone__prize">
                                    <p class="milestone__title"><?php echo $challenge_milestone_title_1; ?></p>
                                    <p class="milestone__sub"><?php echo $challenge_milestone_sub_1; ?></p>
                                    <p class="milestone__target"><?php echo $challenge_units . $challenge_milestone_target_1; ?></p>
                                </div>
                            <!--Milestone Step 2-->
                                <div class="milestone milestone--step milestone--step-2">
                                    <div class="milestone__complete">
                                        <canvas class="milestone__canvas" id="confetti-2-<?php echo $challenge_id; ?>"></canvas>
                                        <script>
                                            $(function(){
                                                var confettiSettings = { 
                                                    target: 'confetti-2-<?php echo $challenge_id; ?>',
                                                    max : 20,
                                                    size : 1.4,
                                                    clock : 40, 
                                                    width : 300,
                                                    height: 300
                                                };    
                                                var confetti = new ConfettiGenerator(confettiSettings);
                                                confetti.render();
                                            });                                                                    
                                        </script>
                                    </div>
                                    <img src="uploads/images/<?php echo $challenge_milestone_image_2 ?>" alt="Prize" class="milestone__prize">
                                    <p class="milestone__title"><?php echo $challenge_milestone_title_2; ?></p>
                                    <p class="milestone__sub"><?php echo $challenge_milestone_sub_2; ?></p>
                                    <p class="milestone__target"><?php echo $challenge_units . $challenge_milestone_target_2; ?></p>
                                </div>
                            <!--Milestone Step 3-->
                                <div class="milestone milestone--step milestone--step-3">
                                    <div class="milestone__complete">
                                        <canvas class="milestone__canvas" id="confetti-3-<?php echo $challenge_id; ?>"></canvas>
                                        <script>
                                            $(function(){
                                                var confettiSettings = { 
                                                    target: 'confetti-3-<?php echo $challenge_id; ?>',
                                                    max : 20,
                                                    size : 1.4,
                                                    clock : 40, 
                                                    width : 300,
                                                    height: 300
                                                };    
                                                var confetti = new ConfettiGenerator(confettiSettings);
                                                confetti.render();
                                            });                                                                    
                                        </script>
                                    </div>
                                    <img src="uploads/images/<?php echo $challenge_milestone_image_3 ?>" alt="Prize" class="milestone__prize">
                                    <p class="milestone__title"><?php echo $challenge_milestone_title_3; ?></p>
                                    <p class="milestone__sub"><?php echo $challenge_milestone_sub_3; ?></p>
                                    <p class="milestone__target"><?php echo $challenge_units . $challenge_milestone_target_3; ?></p>
                                </div>
                            </div>
                              <!--Milestone Final Step-->
                            <div class="milestone milestone--final">
                                <div class="milestone__complete">
                                    <canvas class="milestone__canvas" id="confetti-final-<?php echo $challenge_id; ?>"></canvas>
                                    <script>
                                        $(function(){
                                            var confettiSettings = { 
                                                target: 'confetti-final-<?php echo $challenge_id; ?>',
                                                max : 20,
                                                size : 1,
                                                clock : 40, 
                                                width : 300,
                                                height: 300, 
                                                props : [
                                                    { "type": "svg", "src": "assets/images/star.svg" }
                                                ]
                                            };    
                                            var confetti = new ConfettiGenerator(confettiSettings);
                                            confetti.render();
                                        });                                                                    
                                    </script>
                                </div>
                                <img src="uploads/images/<?php echo $final_milestone_image; ?>" alt="Prize" class="milestone__prize milestone__prize--final">
                                <p class="milestone__title"><?php echo $final_milestone_title; ?></p>
                                <p class="milestone__sub"><?php echo $final_milestone_sub; ?></p>
                                <p class="milestone__target"><?php echo $challenge_units . $final_milestone_target; ?></p>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-bar__inner"></div>
                                <div class="progress-bar__marker progress-bar__marker--1"></div>
                              
                            </div>                            
                        </div>  
                        <!--end of 1 Milestone-->             
                    </div> 
                    <!-- End of Challenge -->
                    <?php
                        } 
                    }else {
                        echo "You have not challenges at this time";
                    }                            
                        ?>
        

                </div>
            </div>  

           




        </section>
    </main>
    <script>
        $(function(){
            $('.challenge__btn').click(function(){
                var cur = $(this).attr('data-challenge-btn-id');
                $('div[data-challenge-id="' + cur + '"]').stop().slideToggle();
                $(this).find('.challenge__arrow-icon').stop().toggleClass('challenge__arrow-icon--close');
            });
        });
    
    </script>

 
<?php include "includes/footer.php"; ?>