<?php include "../includes/db.php";?>
<?php 
    if(isset($_GET['c_id'])){
        $challenge_id = $_GET['c_id'];
    } else {
        header("location: partner-challenges.php");
    }
?>

<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="notranslate">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="CunJtVDmE9G6aCcmGxprdf0uinHdJCRkcnHgMXe6">   
    <title>Ingram</title>  
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="../node_modules/confetti-js/dist/index.min.js"></script>
</head>
<body>
    <main>        
        <section class="dash dash--logged-in u-wrap">
            <div class="challenge challenge--personal challenge--preview-page">
               <h3 class="title u-mar-b__med">Challenge Preview:</h3>              
               <div class="challenge-table__body">   
                <?php 
                    $select_challenge_string = "SELECT * FROM challenges_personal WHERE id = $challenge_id";
                    $select_challenge_query = mysqli_query($connection, $select_challenge_string);
                    if (mysqli_num_rows($select_challenge_query) > 0) {
                        mysqli_num_rows($select_challenge_query);
                        while($row = mysqli_fetch_assoc($select_challenge_query)){
                            $challenge_id = $row['id'];
                            $challenge_title = $row['title'];
                            $challenge_description = $row['description'];
                            $challenge_dashboard_icon = $row['dashboard_icon'];
                            $challenge_units = $row['units'];
                            $challenge_target = $row['target'];
                            $challenge_progress = $row['target_progress'];
                            $challenge_percentage = ($challenge_progress / $challenge_target) * 100;
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
                ?>


                    <!-- Start of Challenge -->         
                    <div class="challenge">                
                        <div class="challenge__preview" style="border-top: solid 1px #c3c2c2;">
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
                                    <img src="../uploads/images/prize.png" alt="Prize" class="milestone__prize">
                                    <p class="milestone__title"><?php echo $challenge_milestone_title_1; ?></p>
                                    <p class="milestone__sub"><?php echo $challenge_milestone_sub_1; ?></p>
                                    <p class="milestone__target"><?php echo $challenge_milestone_target_1; ?></p>
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
                                    <img src="../uploads/images/prize.png" alt="Prize" class="milestone__prize">
                                    <p class="milestone__title"><?php echo $challenge_milestone_title_2; ?></p>
                                    <p class="milestone__sub"><?php echo $challenge_milestone_sub_2; ?></p>
                                    <p class="milestone__target"><?php echo $challenge_milestone_target_2; ?></p>
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
                                    <img src="../uploads/images/prize.png" alt="Prize" class="milestone__prize">
                                    <p class="milestone__title"><?php echo $challenge_milestone_title_3; ?></p>
                                    <p class="milestone__sub"><?php echo $challenge_milestone_sub_3; ?></p>
                                    <p class="milestone__target"><?php echo $challenge_milestone_target_3; ?></p>
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
                                                    { "type": "svg", "src": "../assets/images/star.svg" }
                                                ]
                                            };    
                                            var confetti = new ConfettiGenerator(confettiSettings);
                                            confetti.render();
                                        });                                                                    
                                    </script>
                                </div>
                                <img src="../uploads/images/prize.png" alt="Prize" class="milestone__prize">
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
                        echo "<script> location.replace('partner-challenges.php'); </script>"; 
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
    
 
<?php include "../includes/footer.php"; ?>