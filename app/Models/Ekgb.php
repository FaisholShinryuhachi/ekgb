<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ekgb extends Model
{
    use HasFactory;
    protected $appends = ['deadline', 'stats'];
    // Casting untuk datetime
    protected $casts = [
        'kgb_terakhir' => 'datetime:Y-M-d',
    ];

    public function getDeadlineAttribute()
    {
        $date = new \DateTime($this->attributes['kgb_terakhir']);
        $date->add(new \DateInterval('P2Y'));
        return $date->format('Y-M-d');
    }

    public function getStatsAttribute()
    {
        $date_deadline = new \DateTime($this->attributes['kgb_terakhir']);
        $date_deadline->add(new \DateInterval('P2Y'));
        $date_deadline->format('Y-m-d');

        $date_now = Carbon::now();
        $date_now->format('Y-m-d');


        $diff = date_diff( $date_deadline, $date_now, 'DAY')->format("%r%a");
        if ($diff <= 60 || $date_now >= $date_deadline){
            return true;
        }
        else{
            return false;
        }
        
    }
}
