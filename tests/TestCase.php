<?php

namespace Facade\Ignition\Tests;

use Programic\Tasks\Facades\Task;
use Programic\Tasks\TaskServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [TaskServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Task' => Task::class,
        ];
    }
}
