<?php

require_once 'init.php';
require_once 'controller/VotingsController.php';

$controller = new VotingsController();

$controller->handleRequest();

?>
