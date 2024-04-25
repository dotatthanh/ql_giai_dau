<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
    	'tournament_id',
        'name'
    ];

    public function groupTeams()
    {
        return $this->hasMany(GroupTeam::class);
    }
    
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
