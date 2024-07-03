<?php

function get_login_models($username)
{
    return Config::get_connection()->query("SELECT id,username,password FROM users WHERE username = '$username'");
}

function update_access_token($access_token, $id)
{
    return Config::get_connection()->query("UPDATE users SET access_token = '$access_token' WHERE id = '$id'");
}
