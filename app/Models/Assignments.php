<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Assignments extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'assignments';
    public $timestamps = false;

    protected $primaryKey = 'IDAssignment';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'IDAssignment',
        'ID',
        'orderID'
    ];
}
