<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all of the posts for the user.
     */
    public function posts()
    {
        return $this->hasManyThrough(Post::class, Category::class);

        // return $this->hasManyThrough(
        //     Post::class,
        //     Category::class,
        //     'user_id', // Foreign key on the categories table...
        //     'category_id', // Foreign key on the posts table...
        //     'id', // Local key on the users table...
        //     'id' // Local key on the categories table...
        // );
    }
}
