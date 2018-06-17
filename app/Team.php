<?php
namespace App;

use Doctrine\DBAL\Schema\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Game;
use Illuminate\Support\Facades\DB;

/**
 * Class Team
 *
 * @package App
 * @property string $name
*/
class Team extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class);
    }

    public function getGamesAttribute()
    {
        return Game::where(function($query) {
            $query->where('team1_id', $this->attributes['id'])->orWhere('team2_id', $this->attributes['id']);
        })
        ->whereNotNull('result1')
        ->count();
    }

    public function getWonAttribute()
    {
        return Game::whereNotNull('result1')
            ->where(function($query) {
                $query->where(function($query2) {
                    $query2->where('team1_id', $this->attributes['id'])->whereRaw('result1 > result2');
                })->orWhere(function($query2) {
                    $query2->where('team2_id', $this->attributes['id'])->whereRaw('result1 < result2');
                });
            })
            ->count();
    }



//    public function getTiedAttribute()
//    {
//        return Game::whereNotNull('result1')
//            ->whereRaw('result1 = result2')
//            ->where(function($query) {
//                $query->where('team1_id', $this->attributes['id'])
//                    ->orWhere('team2_id', $this->attributes['id']);
//            })
//            ->count();
//    }

    public function getLostAttribute()
    {
        return Game::whereNotNull('result1')
            ->where(function($query) {
                $query->where(function($query2) {
                    $query2->where('team1_id', $this->attributes['id'])->whereRaw('result1 < result2');
                })->orWhere(function($query2) {
                    $query2->where('team2_id', $this->attributes['id'])->whereRaw('result1 > result2');
                });
            })
            ->count();
    }

    public function getPointsAttribute()
    {
        return $this->getWonAttribute() * 2 + $this->getLostAttribute() * 1;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function stat($attr)
    {
        $sum1 = Game::where('team1_id', $this->attributes['id'])
            ->sum($attr.'1');

        $sum2 = Game::where('team2_id', $this->attributes['id'])
            ->sum($attr.'2');

        return $sum1 + $sum2;

    }

//    public function getG3pointAttribute()
//    {
//        $sum1 = Game::where('team1_id', $this->attributes['id'])
//            ->sum('g3point1');
//
//        $sum2 = Game::where('team2_id', $this->attributes['id'])
//            ->sum('g3point2');
//
//        return $sum1 + $sum2;
//
//    }

//    public function getG2pointsAttribute()
//    {
//        return Game::where(function($query) {
//            $query->where('team1_id', $this->attributes['id'])->orWhere('team2_id', $this->attributes['id']);
//        })
//            ->max('g2_point1');
//    }

    /**
     *
     */
//    public function getPdoAttribute()
//    {
//        return Game::where('g2_point1', 'team1_id')->get();
//    }
//
//    public function getVdoAttribute()
//    {
//        return Game::whereNotNull('g2_point1')
//            ->where(function($query) {
//                $query->where(function($query2) {
//                    $query2->where('team1_id', $this->attributes['id'])->whereRaw('g2_point1 < g2_point2');
//                })->orWhere(function($query2) {
//                    $query2->where('team2_id', $this->attributes['id'])->whereRaw('g2_point1 > g2_point2');
//                });
//            })
//            ->sum('g2_point1');
//    }
//
//    public function getG2pointsAttribute()
//    {
//        return $this->getPdoAttribute() + $this->getVdoAttribute();
//    }

}
