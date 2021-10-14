<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfileScenarioRating extends Model
{
    use HasFactory;
    protected $table = 'profile_scenarioratings';


    protected $fillable = [
        'profile_id', 'scenario_id', 'rating', 'attempt',
        'uncertainty',
        'kfactor',
        'timetaken', 'lastplaytime'
    ];

    public function scenario()
    {
        return $this->belongsTo(Scenario::class, 'scenario_id');
    }

    public function profile()
    {
        return $this->belongsTo(XapiProfile::class, 'profile_id');
    }
}
