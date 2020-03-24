<?php

namespace Tests\Unit\Controllers\Auth;

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
}
