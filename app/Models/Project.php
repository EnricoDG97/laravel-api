<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'slug', 'thumb', 'type_id'];

    public function setTitleAttribute($_title) {
        $this->attributes['title'] = $_title;
        $this->attributes['slug'] = Str::slug($_title); 
    }
    
    // relazione 1 a molti con tipologia
    public function type() {
        return $this->belongsTo(Type::class);
    }
    
    // relazione molti a molti con tecnologie
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
