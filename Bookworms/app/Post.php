<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Reactable;

    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
