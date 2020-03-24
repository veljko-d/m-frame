<?php

namespace App\Controllers\Auth;

use App\Controllers\AbstractController;

/**
 * Class LoginController
 *
 * @package App\Controllers\Auth
 */
class LoginController extends AbstractController
{
    /**
     * @return string
     */
    public function getForm(): string
    {
        return $this->render('auth/login', []);
    }
}
