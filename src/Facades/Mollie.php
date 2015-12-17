<?php

namespace Eboost\Mollie\Facades;

class Mollie extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor() { return 'mollie'; }
}
