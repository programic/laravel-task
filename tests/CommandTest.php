<?php

namespace Programic\Tasks\Tests;

use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Programic\Tasks\Facades\Task;

class CommandTest extends TestCase
{
    /** @test */
    public function it_can_create_task_migration()
    {
        $taskName = 'runTask';
        Artisan::call('make:task ' . $taskName);

        $taskName = Str::snake($taskName);
        $fileName = Carbon::now()->format('Y_m_d_His') . '_' . $taskName . '.php';

        if (file_exists(Task::getDirectory() . $fileName)) {
            $this->assertTrue(true);
        } else {
            $this->fail('Task migration not exists');
        }
    }
}
