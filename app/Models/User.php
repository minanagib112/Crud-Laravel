<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->posts()->delete();
        });
    }

    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'email'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
