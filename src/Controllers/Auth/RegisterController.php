<?php

namespace App\Controllers\Auth;

use App\Controllers\AbstractController;

/**
 * Class RegisterController
 *
 * @package App\Controllers\Auth
 */
class RegisterController extends AbstractController
{
    /**
     * @return string
     */
    public function getForm(): string
    {
        return $this->render('auth/register', []);
    }
}
