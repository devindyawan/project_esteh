<?php

function get_login_models($username)
{
    $sql = "SELECT id,username,password FROM users WHERE username = '$username'";
    return Config::get_connection()->query($sql);
}

// function update_access_token($access_token, $id)
// {
//     $sql = "UPDATE users SET access_token = '$access_token' WHERE id = '$id'";
//     return Config::get_connection()->query($sql);
// }

// function remove_access_token($id)
// {
//     $sql = "UPDATE users SET access_token = '' WHERE id = '$id'";
//     return Config::get_connection()->query($sql);
// }