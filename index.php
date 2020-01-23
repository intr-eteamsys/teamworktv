<?php
require './reader.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="300">
    <link rel="stylesheet" href="./scss/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Mono&display=swap" rel="stylesheet">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./scss/slick.css"/>
    <link rel="stylesheet" type="text/css" href="./scss/slick-theme.css"/>
    <title>TeamWorkTv</title>
</head>

<body>
    <header>
        <div class="header-left-side">
            <p class="desk">Bureau X</p>
            <p class="gsd">GSD - <?= $data['gsd'] ?></p>
        </div>

        <div class="gif">
            <img src="./img/source.gif" alt="">
        </div>

        <div class="container-msg">
            <div class="msg-of-the-day">
                <p><?= $data['daily_message'] ?></p>
            </div>
        </div>
    </header>

    <div class="global-container">
    <?php foreach ($data['employees'] as $employee) : ?>
    <?php //var_dump($employee) ?>
        <?php $tasks_count = 0 ?>
        <?php foreach ($employee['tasklists'] as $tasklist){
            //var_dump($tasklist);
            $tasks_count += $tasklist['tasks_count'];
        } ?>
        <div class="container">
            <div class="block">
                <div class="identity">
                    <img src="<?= $employee['image'] ?>">
                    <div class="description">
                        <p><?= $employee['name'] ?> - <?= $employee['position'] ?></p>
                    </div>
                    <div class="list">
                        <ul>
                            <li>- PROJECTS : <?= $employee['total_projects'] ?></li>
                            <li>- TASKS : <?= $tasks_count ?></li>
                            <li>- MILESTONES : <?= $employee['number_of_milestones'] ?></li>
                        </ul>
                    </div>
                    <div class="w3-progress-container w3-round-xlarge">
                        <div class="w3-progressbar w3-round-xlarge" style="width:70%"></div>
                    </div>
                </div>
                <div class="global-projects">
                    <?php foreach ($employee['tasklists'] as $tasklist) : ?>
                        <div class="pro">
                            <div class="title-line">
                                <p class="title"><?= $tasklist['project'] ?></p>
                            </div>
                            <div class="projects">
                                <div class="global-tasks">
                                    <div class="achieve-task">
                                        <img src="./img/check-sign-png-6.png" alt="">
                                        <div class="task">
                                            <p><?= $tasklist['name'] ?></p>
                                            <p> - </p>
                                            <p>TASKS : <?= $tasklist['tasks_count'] ?></p>
                                            <p> - </p>
                                            <p><?= $tasklist['logged_hours'] ?>h / <?= $tasklist['full_hours_of_tasks'] ?>h</p>
                                        </div>
                                    </div>
                                    <div class="progress">
                                    
                                    <?php $text = "" ?>

                                    <?php $progress_color = "green"?>
                                    <?php 

                                        if ($tasklist['full_hours_of_tasks'] > 0) {
                                            $pourcent = round(($tasklist['logged_hours'] / $tasklist['full_hours_of_tasks'])*100);
                                            $text= $pourcent.'% de timeslog';
                                        } else {
                                            $pourcent= 0;
                                            $text = 'pas d’heures allouées';
                                            $progress_color = "orange";
                                        }
                                    ?>
                                        <?php $blink = "" ?>
                                        <?php if($pourcent > 100) {
                                            $progress_color = "red";
                                            $blink = "blink";
                                        }
                                        ?>
                                        <p class="pg-<?= $progress_color. " " .$blink ?>"><?= $text ?></p>
                                        <div class="w3-progress-container w3-round-xlarge">
                                            <div class="w3-progressbar w3-round-xlarge <?= $progress_color. " " .$blink ?>" style="max-width: 100%; width:<?= $pourcent ?>%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript" src="./js/slider.js"></script>
<script type="text/javascript" src="./js/slick.min.js"></script>

</body>

</html>