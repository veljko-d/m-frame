<?php

namespace Tests\Unit\Actions;

use App\Core\Loggers\MonologDriver;
use App\Domain\User;
use App\Models\User\UserModelInterface;
use App\Utils\HashGenerator;
use Tests\AbstractTestCase;

/**
 * Class AuthTestCase
 *
 * @package Tests\Unit\Actions
 */
abstract class AuthTestCase extends AbstractTestCase
{
    /**
     * @var
     */
    protected $logger;

    /**
     * @var
     */
    protected $userModel;

    /**
     * @var
     */
    protected $user;

    /**
     * @var
     */
    protected $hashGenerator;

    /**
     * @setUp
     */
    public function setUp(): void
    {
        $this->logger = $this->createMock(MonologDriver::class);
        $this->userModel = $this->createMock(UserModelInterface::class);
        $this->user = $this->createMock(User::class);
        $this->hashGenerator = $this->createMock(HashGenerator::class);
    }
}
