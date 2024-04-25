<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballMatch extends Model
{
    use HasFactory;

    protected $table = 'matchs';
    protected $fillable = [
    	'tournament_id',
        'team1_id',
        'team2_id',
        'score_team1',
        'score_team2',
        'description',
    ];
    
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }
    
    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
}
