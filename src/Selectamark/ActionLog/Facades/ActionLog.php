<?php namespace Selectamark\ActionLog\Facades;

use Illuminate\Support\Facades\Facade;

class ActionLog extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'action-log'; }

}