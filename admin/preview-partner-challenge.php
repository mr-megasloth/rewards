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
            <div class="challenge challenge--personal">
               <h3 class="title u-mar-b__tiny"></h3>              
               <table class="challenge__table u-mar-b__huge">
                    <thead>
                        <tr>     
                            <th></th>                      
                            <th>Challenge</th>
                            <th>Unit</th>
                            <th>Progress</th>         
                            <th>&nbsp;</th>                 
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $select_challenge_string = "SELECT * FROM challenges_partner WHERE id = $challenge_id";
                            $select_challenge_query = mysqli_query($connection, $select_challenge_string);
                              
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
                                    <tr>
                                        <td style="width:6rem;"><img class="challenge__icon" src="../uploads/images/<?php echo $challenge_dashboard_icon ?>" alt=""></td>
                                        <td><?php echo $challenge_title ?></td>
                                        <td><?php echo $challenge_units ?></td>
                                        <td><?php echo $challenge_percentage . '%'; ?></td>
                                        <td><a id="<?php echo $challenge_id; ?>" class="challenge-btn"  href="javascript:;"><i class="fas fa-arrow-circle-right"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="challenge-info-<?php echo $challenge_id; ?>" colspan="5" style="display:none; position:relative;">
                                            <div class="challenge__info-inner">
                                                <div class="challenge__text">
                                                    <h3 class="challenge__sub-title"><?php echo $challenge_description ?></h3>
                                                    <h4 class="challenge__date-range">Challenge Active From *date range here*</h4>
                                                    <p class="challenge__target-text">Target : <?php echo $challenge_units . "<span id='milestone-target'>" .  $challenge_target . "</span>"; ?></p>                                                    
                                                </div>

                                                <?php 
                                                    switch($challenge_milestones) {
                                                        case 1 :
                                                ?>                                                    
                                                            <div id="<?php echo $challenge_id; ?>" class="challenge__milestone challenge__milestone--1">
                                                                <div class="challenge__step challenge__step--1"></div>
                                                                <div class="challenge__step challenge__step--2"></div>
                                                                <div class="challenge__step challenge__step--3"></div>
                                                                <div class="challenge__step challenge__step--4"></div>
                                                                <div class="challenge__step challenge__step--5"></div>
                                                                <div class="challenge__step challenge__step--6"></div>
                                                                <div class="challenge__step challenge__step--7"></div>
                                                                <div class="challenge__step challenge__step--8"></div>
                                                                <div class="challenge__step challenge__step--9"></div>
                                                                <div class="challenge__goal challenge__goal--final challenge__step--milestone">
                                                                    <img src="../uploads/images/<?php echo $challenge_milestone_image_1;?>" alt="" class="challenge__milestone-image">                                                                    
                                                                </div>
                                                                <div class="challenge__celebration">
                                                                    <canvas id="celebration-1-<?php echo $challenge_id; ?>"></canvas>
                                                                    <script>
                                                                        $(function(){
                                                                            var confettiSettings = { 
                                                                                target: 'celebration-1-<?php echo $challenge_id; ?>',
                                                                                max : 20,
                                                                                size : .8,
                                                                                clock : 40, 
                                                                                width : 300,
                                                                                height: 220, 
                                                                                props : [
                                                                                    { "type": "svg", "src": "../assets/images/star.svg" }
                                                                                ]
                                                                            };    
                                                                            var confetti = new ConfettiGenerator(confettiSettings);
                                                                            confetti.render();
                                                                        });                                                                    
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                $(function(){
                                                                    var perComplete = <?php echo $challenge_percentage; ?>;
                                                                    var curChallange = $('.challenge-info-' + <?php echo $challenge_id; ?> );
                                                                    var steps;

                                                                    if(perComplete >= 10 && perComplete < 20){
                                                                         steps = 1;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 20 && perComplete < 30) {
                                                                         steps = 2;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 30 && perComplete < 40) {
                                                                         steps = 3;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 40 && perComplete < 50) {
                                                                         steps = 4;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 50 && perComplete < 60) {
                                                                         steps = 5;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 60 && perComplete < 70) {
                                                                         steps = 6;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 70 && perComplete < 80) {
                                                                         steps = 7;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 80 && perComplete < 90) {
                                                                         steps = 8;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 90 && perComplete < 100) {
                                                                         steps = 9;                                                                
                                                                        stepCounter(steps); 
                                                                    } else if (perComplete >= 100) {
                                                                        steps = 10;        
                                                                        stepCounter(steps);                                                                      
                                                                    }
                                                                
                                                                    function stepCounter(stepAmmount) {
                                                                        for(var i = 0; i < stepAmmount; i++) {
                                                                            var stepNum = i + 1;
                                                                          $(curChallange).find('.challenge__step--' + stepNum).addClass('challenge__step--active');                                                                         
                                                                        }    

                                                                        if(stepAmmount >= 10){
                                                                            $(curChallange).find($('.challenge__celebration')).addClass('challenge__celebration--active');
                                                                        }                                                            
                                                                    }                                                         
                                                                
                                                                });

                                                            </script>
                                                <?php
                                                        
                                                        break;   
                                                        case 2 :
                                                ?>                                                    
                                                            <div id="challenge-<?php echo $challenge_id; ?>" class="challenge__milestone challenge__milestone--2">
                                                                <div class="challenge__step challenge__step--1"></div>
                                                                <div class="challenge__step challenge__step--2"></div>
                                                                <div class="challenge__step challenge__step--3"></div>
                                                                <div class="challenge__step challenge__step--4"></div>
                                                                <div class="challenge__goal challenge__goal--1">
                                                                    <img src="../uploads/images/<?php echo $challenge_milestone_image_1;?>" alt="" class="challenge__milestone-image">
                                                                    <p class="challenge__goal-text"><?php echo $challenge_units . $challenge_milestone_target_1;?></p>
                                                                </div>
                                                                <div class="challenge__step challenge__step--6"></div>
                                                                <div class="challenge__step challenge__step--7"></div>
                                                                <div class="challenge__step challenge__step--8"></div>
                                                                <div class="challenge__step challenge__step--9"></div>
                                                                <div class="challenge__goal challenge__goal--final challenge__goal--2">
                                                                    <img src="../uploads/images/<?php echo $challenge_milestone_image_2;?>" alt="" class="challenge__milestone-image">
                                                                </div>
                                                                <div class="challenge__celebration challenge__celebration--1">
                                                                    <canvas id="celebration-1-<?php echo $challenge_id; ?>"></canvas>
                                                                        <script>
                                                                            $(function(){
                                                                                var confettiSettings = { 
                                                                                    target: 'celebration-1-<?php echo $challenge_id; ?>',
                                                                                    size : .5,
                                                                                    clock : 50, 
                                                                                    width : 300,
                                                                                    height: 220
                                                                                };    
                                                                                var confetti = new ConfettiGenerator(confettiSettings);
                                                                                confetti.render();
                                                                            });                                                                    
                                                                        </script>
                                                                    </div>
                                                                <div class="challenge__celebration challenge__celebration--2">
                                                                    <canvas id="celebration-2-<?php echo $challenge_id; ?>"></canvas>
                                                                    <script>
                                                                        $(function(){
                                                                            var confettiSettings = { 
                                                                                target: 'celebration-2-<?php echo $challenge_id; ?>',
                                                                                max : 20,
                                                                                size : .8,
                                                                                clock : 40, 
                                                                                width : 300,
                                                                                height: 220, 
                                                                                props : [
                                                                                    { "type": "svg", "src": "../assets/images/star.svg" }
                                                                                ]
                                                                            };    
                                                                            var confetti = new ConfettiGenerator(confettiSettings);
                                                                            confetti.render();
                                                                        });                                                                    
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                $(function(){
                                                                    var perComplete, curChallange, celebration1, celebration2, active, steps;

                                                                    perComplete = <?php echo $challenge_percentage; ?>;
                                                                    curChallange =  $('.challenge-info-' + <?php echo $challenge_id; ?> );
                                                                    celebration1 =  $('.challenge__celebration--1');
                                                                    celebration2 =  $('.challenge__celebration--2');
                                                                    active = "challenge__celebration--active";                                                                
                                                                  
                                                                    if(perComplete >= 10 && perComplete < 20){
                                                                        steps = 1;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 20 && perComplete < 30) {
                                                                        steps = 2;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 30 && perComplete < 40) {
                                                                        steps = 3;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 40 && perComplete < 50) {
                                                                        steps = 4;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 50 && perComplete < 60) {
                                                                        steps = 5;                                                                
                                                                        stepCounter(steps); 
                                                                    } else if (perComplete >= 60 && perComplete < 70) {
                                                                        steps = 6;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 70 && perComplete < 80) {
                                                                        steps = 7;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 80 && perComplete < 90) {
                                                                        steps = 8;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 90 && perComplete < 100) {
                                                                        steps = 9;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 100) {
                                                                        steps = 10;        
                                                                        stepCounter(steps);                                                                                                                    
                                                                    }

                                                                
                                                                    function stepCounter(stepAmmount) {
                                                                        for(var i = 0; i < stepAmmount; i++) {
                                                                            var stepNum = i + 1;
                                                                            curChallange.find('.challenge__step--' + stepNum).addClass('challenge__step--active'); 
                                                                        }         

                                                                        if(stepAmmount >= 5) {
                                                                            $(curChallange).find(celebration1).addClass(active);
                                                                        }

                                                                        if(stepAmmount >= 10) {
                                                                            $(curChallange).find(celebration2).addClass(active);
                                                                        }

                                                                    }

                                                                });

                                                            </script>
                                                <?php
                                                        
                                                        break;
                                                        case 3 :
                                                        ?>                                                    
                                                            <div class="challenge__milestone challenge__milestone--3">
                                                                <div class="challenge__step challenge__step--1"></div>
                                                                <div class="challenge__step challenge__step--2"></div>
                                                                <div class="challenge__goal challenge__goal--1">
                                                                    <img src="../uploads/images/<?php echo $challenge_milestone_image_1;?>" alt="" class="challenge__milestone-image">
                                                                    <p class="challenge__goal-text"><?php echo $challenge_units . $challenge_milestone_target_1;?></p>
                                                                </div>
                                                                <div class="challenge__step challenge__step--4"></div>
                                                               
                                                                <div class="challenge__goal challenge__goal--2">
                                                                    <img src="../uploads/images/<?php echo $challenge_milestone_image_2;?>" alt="" class="challenge__milestone-image">
                                                                    <p class="challenge__goal-text"><?php echo $challenge_units . $challenge_milestone_target_2;?></p>
                                                                </div>
                                                                <div class="challenge__step challenge__step--7"></div>
                                                                <div class="challenge__step challenge__step--8"></div>
                                                                <div class="challenge__goal challenge__goal--final challenge__goal--3">
                                                                    <img src="../uploads/images/<?php echo $challenge_milestone_image_2;?>" alt="" class="challenge__milestone-image">
                                                                    <p class="challenge__goal-text"><?php echo $challenge_units . $challenge_milestone_target_3;?></p>
                                                                </div>
                                                               
                                                                <div class="challenge__celebration challenge__celebration--1">
                                                                    <canvas id="celebration-1-<?php echo $challenge_id; ?>"></canvas>
                                                                    <script>
                                                                        $(function(){
                                                                            var confettiSettings = { 
                                                                                target: 'celebration-1-<?php echo $challenge_id; ?>',
                                                                                size : .5,
                                                                                clock : 50, 
                                                                                width : 300,
                                                                                height: 220
                                                                            };    
                                                                            var confetti = new ConfettiGenerator(confettiSettings);
                                                                            confetti.render();
                                                                        });                                                                    
                                                                    </script>
                                                                </div>
                                                                <div class="challenge__celebration challenge__celebration--2">
                                                                    <canvas id="celebration-2-<?php echo $challenge_id; ?>"></canvas>
                                                                    <script>
                                                                        $(function(){
                                                                            var confettiSettings = { 
                                                                                target: 'celebration-2-<?php echo $challenge_id; ?>',
                                                                                size : .5,
                                                                                clock : 50, 
                                                                                width : 300,
                                                                                height: 220
                                                                            };    
                                                                            var confetti = new ConfettiGenerator(confettiSettings);
                                                                            confetti.render();
                                                                        });                                                                    
                                                                    </script>
                                                                </div>
                                                                <div class="challenge__celebration challenge__celebration--3">
                                                                    <canvas id="celebration-3-<?php echo $challenge_id; ?>"></canvas>
                                                                    <script>
                                                                        $(function(){
                                                                            var confettiSettings = { 
                                                                                target: 'celebration-3-<?php echo $challenge_id; ?>',
                                                                                max : 20,
                                                                                size : .8,
                                                                                clock : 40, 
                                                                                width : 300,
                                                                                height: 220, 
                                                                                props : [
                                                                                    { "type": "svg", "src": "../assets/images/star.svg" }
                                                                                ]
                                                                            };    
                                                                            var confetti = new ConfettiGenerator(confettiSettings);
                                                                            confetti.render();
                                                                        });                                                                    
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                $(function(){
                                                                    var perComplete, curChallange, celebration1, celebration2, active, steps;

                                                                    perComplete = <?php echo $challenge_percentage; ?>;
                                                                    curChallange =  $('.challenge-info-' + <?php echo $challenge_id; ?> );
                                                                    celebration1 =  $('.challenge__celebration--1');
                                                                    celebration2 =  $('.challenge__celebration--2');
                                                                    celebration3 =  $('.challenge__celebration--3');
                                                                    active = "challenge__celebration--active";                                                                
                                                                  
                                                                    if(perComplete >= 11.11 && perComplete < 22.22){
                                                                        steps = 1;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 22.22 && perComplete < 33.33) {
                                                                        steps = 2;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 33.33 && perComplete < 44.44) {
                                                                        steps = 3;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 44.44 && perComplete < 55.55) {
                                                                        steps = 4;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 55.55 && perComplete < 66.66) {
                                                                        steps = 5;                                                                
                                                                        stepCounter(steps); 
                                                                    } else if (perComplete >= 66.66 && perComplete < 77.77) {
                                                                        steps = 6;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 77.77 && perComplete < 88.88) {
                                                                        steps = 7;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 88.88 && perComplete < 99.99) {
                                                                        steps = 8;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 100) {
                                                                        steps = 10;        
                                                                        stepCounter(steps);                                                                                                                    
                                                                    }

                                                                
                                                                    function stepCounter(stepAmmount) {
                                                                        for(var i = 0; i < stepAmmount; i++) {
                                                                            var stepNum = i + 1;
                                                                            curChallange.find('.challenge__step--' + stepNum).addClass('challenge__step--active'); 
                                                                        }         

                                                                        if(stepAmmount >= 3) {
                                                                            $(curChallange).find(celebration1).addClass(active);
                                                                        }

                                                                        if(stepAmmount >= 6) {
                                                                            $(curChallange).find(celebration2).addClass(active);
                                                                        }

                                                                        if(stepAmmount >= 9) {
                                                                            $(curChallange).find(celebration3).addClass(active);
                                                                        }

                                                                    }
                                                                });

                                                            </script>
                                                        <?php                                                                
                                                        break;   
                                                        case 4 :
                                                        ?>                                                    
                                                            <div class="challenge__milestone challenge__milestone--4">
                                                                <div class="challenge__step challenge__step--1"></div>
                                                                <div class="challenge__goal challenge__goal--1">
                                                                    <img src="../uploads/images/<?php echo $challenge_milestone_image_1;?>" alt="" class="challenge__milestone-image">
                                                                    <p class="challenge__goal-text"><?php echo $challenge_units . $challenge_milestone_target_1; ?></p>
                                                                </div>
                                                                <div class="challenge__step challenge__step--3"></div>                                                               
                                                                <div class="challenge__goal challenge__goal--2">
                                                                    <img src="../uploads/images/<?php echo $challenge_milestone_image_2;?>" alt="" class="challenge__milestone-image">
                                                                    <p class="challenge__goal-text"><?php echo $challenge_units . $challenge_milestone_target_2; ?></p>
                                                                </div>
                                                                <div class="challenge__step challenge__step--5"></div>
                                                                <div class="challenge__goal challenge__goal--3">
                                                                    <img src="../uploads/images/<?php echo $challenge_milestone_image_3;?>" alt="" class="challenge__milestone-image">
                                                                    <p class="challenge__goal-text"><?php echo $challenge_units . $challenge_milestone_target_3; ?></p>
                                                                </div>
                                                                <div class="challenge__step challenge__step--7"></div>
                                                                <div class="challenge__goal challenge__goal--final challenge__goal--3">
                                                                    <img src="../uploads/images/<?php echo $challenge_milestone_image_4;?>" alt="" class="challenge__milestone-image">
                                                                    <p class="challenge__goal-text"><?php echo $challenge_units . $challenge_milestone_target_4; ?></p>
                                                                </div>
                                                               
                                                                <div class="challenge__celebration challenge__celebration--1">
                                                                    <canvas id="celebration-1-<?php echo $challenge_id; ?>"></canvas>
                                                                    <script>
                                                                        $(function(){
                                                                            var confettiSettings = { 
                                                                                target: 'celebration-1-<?php echo $challenge_id; ?>',
                                                                                size : .5,
                                                                                clock : 50, 
                                                                                width : 300,
                                                                                height: 220
                                                                            };    
                                                                            var confetti = new ConfettiGenerator(confettiSettings);
                                                                            confetti.render();
                                                                        });                                                                    
                                                                    </script>
                                                                </div>
                                                                <div class="challenge__celebration challenge__celebration--2">
                                                                    <canvas id="celebration-2-<?php echo $challenge_id; ?>"></canvas>
                                                                    <script>
                                                                        $(function(){
                                                                            var confettiSettings = { 
                                                                                target: 'celebration-2-<?php echo $challenge_id; ?>',
                                                                                size : .5,
                                                                                clock : 50, 
                                                                                width : 300,
                                                                                height: 220
                                                                            };    
                                                                            var confetti = new ConfettiGenerator(confettiSettings);
                                                                            confetti.render();
                                                                        });                                                                    
                                                                    </script>
                                                                </div>
                                                                <div class="challenge__celebration challenge__celebration--3">
                                                                    <canvas id="celebration-3-<?php echo $challenge_id; ?>"></canvas>
                                                                    <script>
                                                                        $(function(){
                                                                            var confettiSettings = { 
                                                                                target: 'celebration-3-<?php echo $challenge_id; ?>',
                                                                                size : .5,
                                                                                clock : 50, 
                                                                                width : 300,
                                                                                height: 220
                                                                            };    
                                                                            var confetti = new ConfettiGenerator(confettiSettings);
                                                                            confetti.render();
                                                                        });                                                                    
                                                                    </script>
                                                                </div>
                                                                <div class="challenge__celebration challenge__celebration--4">
                                                                    <canvas id="celebration-4-<?php echo $challenge_id; ?>"></canvas>
                                                                    <script>
                                                                        $(function(){
                                                                            var confettiSettings = { 
                                                                                target: 'celebration-4-<?php echo $challenge_id; ?>',
                                                                                max : 20,
                                                                                size : .8,
                                                                                clock : 40, 
                                                                                width : 300,
                                                                                height: 220, 
                                                                                props : [
                                                                                    { "type": "svg", "src": "../assets/images/star.svg" }
                                                                                ]
                                                                            };    
                                                                            var confetti = new ConfettiGenerator(confettiSettings);
                                                                            confetti.render();
                                                                        });                                                                    
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <script>
                                                                $(function(){
                                                                    var perComplete, curChallange, celebration1, celebration2, active, steps;

                                                                    perComplete = <?php echo $challenge_percentage; ?>;
                                                                    curChallange =  $('.challenge-info-' + <?php echo $challenge_id; ?> );
                                                                    celebration1 =  $('.challenge__celebration--1');
                                                                    celebration2 =  $('.challenge__celebration--2');
                                                                    celebration3 =  $('.challenge__celebration--3');
                                                                    celebration3 =  $('.challenge__celebration--4');
                                                                    active = "challenge__celebration--active";                                                                
                                                                  
                                                                    if(perComplete >= 12.5 && perComplete < 25){
                                                                        steps = 1;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 25 && perComplete < 37.5) {
                                                                        steps = 2;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 37.5 && perComplete < 50) {
                                                                        steps = 3;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 50 && perComplete < 62.5) {
                                                                        steps = 4;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 62.5 && perComplete < 75) {
                                                                        steps = 5;                                                                
                                                                        stepCounter(steps); 
                                                                    } else if (perComplete >= 75 && perComplete < 87.5) {
                                                                        steps = 6;                                                                
                                                                        stepCounter(steps);
                                                                    } else if (perComplete >= 87.5 && perComplete < 100) {
                                                                        steps = 7;                                                                
                                                                        stepCounter(steps);
                                                                    }  else if (perComplete >= 100) {
                                                                        steps = 8;        
                                                                        stepCounter(steps);                                                                                                                    
                                                                    }

                                                                
                                                                    function stepCounter(stepAmmount) {
                                                                        for(var i = 0; i < stepAmmount; i++) {
                                                                            var stepNum = i + 1;
                                                                            curChallange.find('.challenge__step--' + stepNum).addClass('challenge__step--active'); 
                                                                        }         

                                                                        if(stepAmmount >= 2) {
                                                                            $(curChallange).find(celebration1).addClass(active);
                                                                        }

                                                                        if(stepAmmount >= 4) {
                                                                            $(curChallange).find(celebration2).addClass(active);
                                                                        }

                                                                        if(stepAmmount >= 6) {
                                                                            $(curChallange).find(celebration3).addClass(active);
                                                                        }

                                                                        if(stepAmmount >= 8) {
                                                                            $(curChallange).find(celebration4).addClass(active);
                                                                        }
                                                                    }
                                                                });

                                                            </script>
                                                        <?php                                                                
                                                        break;                                                                          
                                                    }                                                
                                                ?>                                              
                                            </div>
                                        </td>
                                    </tr>
                        <?php
                                }        
                        ?>
                    </tbody>
               </table>
              
               <script>
                    $('.challenge-btn').click(function(){
                        var cur = this.id;
                        $(this).find('i').toggleClass('u-rotate-90');

                        $('.challenge-info-' + cur).stop().slideToggle();
                    });
               </script>            
            </div>           
        </section>
    </main>
    
 
<?php include "../includes/footer.php"; ?>