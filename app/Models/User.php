<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = false;

    protected $primaryKey = 'IDUser';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'IDUser',
        'ID',
        'userName',
        'email',
        'password',
        'rolID',
        'accountStatus',
    ];
}
