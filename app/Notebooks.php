<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebooks extends Model
{
    //
    protected $fillable = ['name', 'user_id', 'description'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function note()
    {
        return $this->hasMany(Notes::class,'notebook_id');
    }
}
