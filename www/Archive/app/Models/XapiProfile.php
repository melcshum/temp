<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class XapiProfile extends Model
{
    use HasFactory;
    protected $table = 'xapi_profiles';


    protected $fillable = [
        'name', 'rating', 'kfactor', 'uncertainty', 'lastplaytime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute()
    {
        return route('xapiprofiles.show', $this->id);
    }

    public function game_sessions()
    {
        return $this->hasMany(GameSession::class);
    }

    public function scenario_ratings()
    {
        return $this->hasMany(ProfileScenarioRating::class, 'profile_id', 'id');
    }
}
