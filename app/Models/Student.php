<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        "names", "surnames", "identification_number", "date_of_birth", "identification_type_id", "genre_id", "career_id"
    ];
    
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre','genre_id','id');
    }

    public function identification_type()
    {
        return $this->belongsTo('App\Models\IdentificationType','identification_type_id','id');
    }

    public function career()
    {
        return $this->belongsTo('App\Models\Career','career_id','id');
    }
}
