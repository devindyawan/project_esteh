<?php

if (isset($_SESSION['access_token'])) {
    header('Location: ' . home_url() . '/dashboard');
    die;
}

if (isset($_POST['login'])) {
    Login::login($_POST['username'], $_POST['password']);
}

?>


<form action="" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="login" value="Login">
</form>

<?php
echo Login::get_iswronng() ? 'Wrong password or username' : '';
?>