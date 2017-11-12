<?php

session_start();

// unlimited users
$_SESSION['user_id'] = 13;

// existing Regions - Nord(1), South(2), East(3), West(4)
$_SESSION['region_id'] = 1;
