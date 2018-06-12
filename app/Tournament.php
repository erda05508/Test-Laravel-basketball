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
    protected $fillable = ['title', 'season', 'number_of_teams', 'teams_list'];
    private $id;

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTeamsAttribute($input)
    {
        $this->attributes['teams'] = $input ? $input : null;
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
    
}
