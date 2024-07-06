<?php

$session_is_set = isset($_SESSION['access_token']);


if (getUriSegment(1, 'dashboard')) {
    if (!$session_is_set) {
        require_once('./app/admin_panel/dashboard/login.php');

        set_url(home_url() . '/dashboard/login');
    } else if (
        getUriSegment(2) &&
        !getUriSegment(2, 'login') &&
        file_exists('./app/admin_panel' . _file_location() . '.php')
    ) {
        // Admin Panel

        require_once('./app/admin_panel' . _file_location() . '.php');
    } else if (!getUriSegment(2)) {
        unset($_POST);

        require_once('./app/admin_panel/dashboard/__dashboard.php');
        set_url(home_url() . '/dashboard');
    } else {
        // 404 Not Found

        require_once('./app/_notfound.php');
    }


    // If user access home url /dashboard/logout
    if (getUriSegment(2, 'logout')) {
        Login::logout();
    }
};

die;
