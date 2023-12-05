<?php

require_once 'plugins/login-password-less.php';

/**
 * Allow to login with empty password.
 */
class MyAdminerLoginPasswordLess extends AdminerLoginPasswordLess
{
    /**
     * @param  string $login    login
     * @param  string $password password
     *
     * @return bool
     */
    public function login($login, $password) {
        return true;
    }
}

/** Set allowed password
 *
 * @param string result of password_hash
 */
return new MyAdminerLoginPasswordLess(password_hash('', PASSWORD_DEFAULT));

