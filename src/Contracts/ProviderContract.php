<?php

namespace Leafwrap\MailGateways\Contracts;

interface ProviderContract
{
    public function urlGen();
    public function dataGen($data, $type);
    public function tokenizer($data);
    public function send($data);
    public function retrieve($id);
}