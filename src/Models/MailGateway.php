<?php

namespace Leafwrap\MailGateways\Models;

use Illuminate\Database\Eloquent\Model;

class MailGateway extends Model
{
    protected $fillable = ['gateway', 'credentials', 'additional', 'status'];

    protected $casts = ['credentials' => 'array', 'additional' => 'array'];
}
