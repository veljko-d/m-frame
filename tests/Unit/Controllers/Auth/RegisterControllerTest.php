<?php

namespace Tests\Unit\Controllers\Auth;

use App\Controllers\Auth\RegisterController;
use Tests\Unit\ControllerTestCase;

/**
 * Class RegisterControllerTest
 *
 * @package Tests\Unit\Controllers\Auth
 */
class RegisterControllerTest extends ControllerTestCase
{
    /**
     * @return RegisterController
     */
    private function getController(): RegisterController
    {
        return new RegisterController(
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
        $registerController = $this->getController();

        $response = "Rendered template";

        $this->templateEngine->expects($this->once())
            ->method('render')
            ->with(
                $this->equalTo('auth/register'),
                $this->arrayHasKey('isLogged')
            )
            ->will($this->returnValue($response));

        $result = $registerController->getForm();

        $this->assertSame(
            $result,
            $response,
            'Response object is not the expected one.'
        );
    }
}
