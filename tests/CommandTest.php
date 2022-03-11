<?php

namespace Programic\Tasks\Tests;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Programic\Tasks\Facades\Task;

use function PHPUnit\Framework\assertFileExists;

class CommandTest extends TestCase
{
    /** @test */
    public function it_can_create_task_migration()
    {
        $taskName = 'runTask';
        $this->artisan('make:task ' . $taskName);

        $taskName = Str::snake($taskName);
        $fileName = Carbon::now()->format('Y_m_d_His') . '_' . $taskName . '.php';

        assertFileExists(Task::getDirectory() . $fileName);
    }
}
