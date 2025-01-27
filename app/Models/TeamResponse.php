<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamResponse extends Model
{
    protected $fillable = [
        "remote_id",
        "json_path"
    ];
}
