<?php

namespace Programic\Tasks\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Programic\Tasks\Facades\Task;

class MakeTaskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:task {task}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new task class';


    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws Exception
     */
    public function handle()
    {
        $taskName = Str::snake($this->argument('task'));
        $className = Str::studly($taskName);
        $fileName = Carbon::now()->format('Y_m_d_His') . '_' . $taskName . '.php';

        $stub = File::get(__DIR__ . '/../../stubs/task.php.stub');
        $stub = str_replace('TASK_NAME', $className, $stub);

        File::put(base_path() . '/tasks/' . $fileName, $stub);

        $this->line('<info>Task created:</info> ' . $fileName);
    }
}
