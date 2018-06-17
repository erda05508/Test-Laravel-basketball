<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Game
 *
 * @package App
 * @property string $team1
 * @property string $team2
 * @property string $start_time
 * @property integer $result1
 * @property integer $result2
 * @property integer $tournament_id
 * @property string $g2point1
 * @property string $g2point2
 * @property integer $g3point1
 * @property integer $g3point2
 * @property string $fine1
 * @property string $fine2
 * @property integer $transfers1
 * @property integer $transfers2
 * @property integer $rebounds1
 * @property integer $rebounds2
 * @property integer $interceptions1
 * @property integer $interceptions2
 * @property integer $fouls1
 * @property integer $fouls2
*/
class Game extends Model
{
    use SoftDeletes;

    protected $fillable = ['start_time', 'tournament_id', 'result1', 'result2', 'team1_id', 'team2_id', 'g2point1', 'g2point2', 'g3point1', 'g3point2', 'fine1', 'fine2', 'transfers1', 'transfers2', 'rebounds1', 'rebounds2', 'interceptions1', 'interceptions2', 'fouls1', 'fouls2'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTeam1IdAttribute($input)
    {
        $this->attributes['team1_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTeam2IdAttribute($input)
    {
        $this->attributes['team2_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setStartTimeAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['start_time'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['start_time'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getStartTimeAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setResult1Attribute($input)
    {
        $this->attributes['result1'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setResult2Attribute($input)
    {
        $this->attributes['result2'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setG2point1Attribute($input)
    {
        $this->attributes['g2point1'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setG2point2Attribute($input)
    {
        $this->attributes['g2point2'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setG3point1Attribute($input)
    {
        $this->attributes['g3point1'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setG3point2Attribute($input)
    {
        $this->attributes['g3point2'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setFine1Attribute($input)
    {
        $this->attributes['fine1'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setFine2Attribute($input)
    {
        $this->attributes['fine2'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setTransfers1Attribute($input)
    {
        $this->attributes['transfers1'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setTransfers2Attribute($input)
    {
        $this->attributes['transfers2'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setRebounds1Attribute($input)
    {
        $this->attributes['rebounds1'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setRebounds2Attribute($input)
    {
        $this->attributes['rebounds2'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setInterceptions1Attribute($input)
    {
        $this->attributes['interceptions1'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setInterceptions2Attribute($input)
    {
        $this->attributes['interceptions2'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setFouls1Attribute($input)
    {
        $this->attributes['fouls1'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */

    public function setFouls2Attribute($input)
    {
        $this->attributes['fouls2'] = $input ? $input : null;
    }

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id')->withTrashed();
    }
    
    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id')->withTrashed();
    }
    
}
