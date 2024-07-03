<?php

class Login
{
    public static $is_wrong;

    public static function login($username, $password)
    {
        $result = get_login_models($username);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            if (password_verify($password, $data['password'])) {
                $access_token = password_hash($password . '_esteh' . $data['password'], PASSWORD_BCRYPT);

                update_access_token($access_token, $data['id']);
                $_SESSION['access_token'] = $access_token;

                refresh();
            } else {
                self::$is_wrong = true;
            }
        }

        self::$is_wrong = true;
    }

    public static function logout()
    {
    }

    public static function get_iswronng()
    {
        return self::$is_wrong;
    }
}
