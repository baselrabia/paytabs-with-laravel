<?php

namespace Basel\Paytabs\Facades;

use Illuminate\Support\Facades\Facade;

class PaytabsFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'Paytabs';
    }

}
