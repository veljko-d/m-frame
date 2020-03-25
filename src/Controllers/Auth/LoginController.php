<?php

namespace App\Controllers\Auth;

use App\Actions\Auth\LogoutAction;
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

    /**
     * @param LogoutAction $logoutAction
     */
    public function logout(LogoutAction $logoutAction)
    {
        $logoutAction->execute($this->request);

        $this->redirect->home();
    }
}
