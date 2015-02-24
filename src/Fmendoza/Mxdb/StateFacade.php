<?php
namespace Fmendoza\Mxdb;
use Illuminate\Support\Facades\Facade;

class StateFacade extends Facade {
 
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'state'; }
 
}