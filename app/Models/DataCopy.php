<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCopy extends Model
{
    public $table = 'data_copy';
    public $primary_key = 'id';
    public $incremanting = true;
    public $timestamps = true;
}
