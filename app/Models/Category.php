<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get all of the items for the user.
     */
    public function items()
    {
        return $this->hasManyThrough(Item::class, Type::class);

        // return $this->hasManyThrough(
        //     Item::class,
        //     Type::class,
        //     'category_id', // Foreign key on the types table...
        //     'type_id', // Foreign key on the items table...
        //     'id', // Local key on the users table...
        //     'id' // Local key on the categories table...
        // );
    }
}
