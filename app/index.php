<?php

// web document title
$GLOBALS['esteh_title'] = "Esteh";

session_start();

require_once('./hooks/hooks.php');
require_once('./model/migration.php');
require_once('esteh_config.php');
require_once('./model/db.php');
require_once('./controller/controller.php');
require_once('./app/admin_panel/dashboard_route.php');
require_once('./route/_template.php');
