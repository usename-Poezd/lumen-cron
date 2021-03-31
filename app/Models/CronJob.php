<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CronJob extends Model
{
    protected $table = 'cron_jobs';

    protected $fillable = [
        'command',
        'time'
    ];
}
