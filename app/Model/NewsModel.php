<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    protected $table='new_content';
    public $timestamps=false;
    public $updated_at = false;
}
