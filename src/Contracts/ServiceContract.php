<?php

namespace Leafwrap\MailGateways\Contracts;

interface ServiceContract
{
    public function send();
    public function retrieve();
}
