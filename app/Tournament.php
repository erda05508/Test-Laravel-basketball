<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 * @property string $title
*/
class Tournament extends Model
{
    protected $fillable = ['title', 'season', 'number_of_teams', 'team_id'];
    
    public function teams()
    {
        return $this->belongsToMany('App\Team', 'team_tournament', 'tournament_id', 'team_id');
    }
    
}
