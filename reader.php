<?php

$rawDatas = file_get_contents('./teamwork-tv-office1.json');
//echo '<pre>';
//var_dump($rawDatas);

$employees = json_decode($rawDatas, true);

$data = $employees['office1'];
