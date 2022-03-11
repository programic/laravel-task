<?php

namespace Programic\Tasks\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Programic\Tasks\Tasks run(\Closure $callback)
 * @method static \Programic\Tasks\Tasks when(bool|\Closure $bool, \Closure $callback)
 * @method static \Programic\Tasks\Tasks fresh(\Closure $callback)
 * @method static \Programic\Tasks\Tasks noFresh(\Closure $callback)
 * @method static \Programic\Tasks\Tasks getDirectory(): string
 *
 * @see \Illuminate\Database\Schema\Builder
 */
class Task extends Facade
{

    /**
     * Get a task builder instance.
     *
     * @return \Illuminate\Database\Schema\Builder
     */
    protected static function getFacadeAccessor()
    {
        return 'tasks';
    }
}
