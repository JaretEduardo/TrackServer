<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Orders extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'orders';
    public $timestamps = false;

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'userID',
        'addressee',
        'address',
        'description',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID', 'IDUser');
    }
}
