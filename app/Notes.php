<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    //
    protected $fillable = ['title', 'content', 'notebook_id', 'is_bookmark'];
    public function notebook()
    {
        return $this->belongsTo(Notebooks::class);
    }
}
