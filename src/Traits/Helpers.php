<?php

namespace Programic\Tasks\Traits;

use Illuminate\Support\Facades\App;

trait Helpers {

    /**
     * @return string
     */
    public function getDirectory()
    {
        if (App::runningUnitTests()) {
            return __DIR__ . '/../../migrations/';
        }

        return base_path() . '/tasks/';
    }
}
