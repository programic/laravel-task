<?php

namespace Programic\Tasks;

use Illuminate\Contracts\Foundation\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

class Tasks
{
    protected Application $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param bool|callable $condition
     * @param callable $task
     * @return $this
     */
    public function when($condition, callable $task) : Tasks
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
    public function run(callable $task) : Tasks
    {
        $this->process($task);

        return $this;
    }

    /**
     * @param callable $task
     * @return $this
     */
    public function fresh(callable $task) : Tasks
    {
        $tenant = (string) new ArgvInput();

        $this->when(strpos($tenant, 'migrate:fresh') !== false, $task);

        return $this;
    }

    /**
     * @param callable $task
     * @return $this
     */
    public function noFresh(callable $task) : Tasks
    {
        $tenant = (string) new ArgvInput();

        $this->when(strpos($tenant, 'migrate:fresh') === false, $task);

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
