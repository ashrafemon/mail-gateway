<?php

namespace Leafwrap\MailGateways\Facades;

use Illuminate\Support\Facades\Facade;

class MailGateway extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MailGateway';
    }
}