<?php

namespace Programic\Tasks;

use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\Console\Output\ConsoleOutput;

class Tasks
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param bool|callable $condition
     * @param callable $task
     * @return $this
     */
    public function when($condition, callable $task)
    {
        if (is_callable($condition)) {
            $condition = $condition();
        }

        if ($condition) {
            $this->process($task);
        }

        return $this;
    }

    /**
     * @param callable $task
     * @return $this
     */
    public function run(callable $task)
    {
        $this->process($task);

        return $this;
    }

    /**
     * @param callable $task
     */
    private function process(callable $task)
    {
        $task(new ConsoleOutput());
    }
}
