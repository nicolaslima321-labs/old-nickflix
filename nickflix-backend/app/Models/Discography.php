<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discography extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'artist', 'description', 'picture', 'url_origin', 'extras' ];
}
