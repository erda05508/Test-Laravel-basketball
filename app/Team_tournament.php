<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 * @property string $title
*/
class Team_tournament extends Model
{
    protected $fillable = ['team_id', 'tournament_id'];
        
}
