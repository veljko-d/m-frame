<?php

namespace Tests\Unit\Controllers\Auth;

use App\Actions\Auth\LogoutAction;
use App\Controllers\Auth\LoginController;
use Tests\Unit\ControllerTestCase;

/**
 * Class LoginControllerTest
 *
 * @package Tests\Unit\Controllers\Auth
 */
class LoginControllerTest extends ControllerTestCase
{
    /**
     * @return LoginController
     */
    private function getController(): LoginController
    {
        return new LoginController(
            $this->request,
            $this->redirect,
            $this->sessionManager,
            $this->templateEngine
        );
    }

    /**
     * @test
     */
    public function testGetForm()
    {
        $loginController = $this->getController();

        $response = "Rendered template";

        $this->templateEngine->expects($this->once())
            ->method('render')
            ->with(
                $this->equalTo('auth/login'),
                $this->arrayHasKey('isLogged')
            )
            ->will($this->returnValue($response));

        $result = $loginController->getForm();

        $this->assertSame(
            $result,
            $response,
            'Response object is not the expected one.'
        );
    }

    /**
     * @test
     */
    public function testLogout()
    {
        $loginController = $this->getController();

        $logoutAction = $this->createMock(LogoutAction::class);

        $logoutAction->expects($this->once())
            ->method('execute')
            ->with($this->request);

        $this->redirect->expects($this->once())
            ->method('home');

        $loginController->logout($logoutAction);
    }
}
