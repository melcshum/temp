<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameSession extends Model
{
    use HasFactory;


    protected $fillable = [
        'session', 'xapi_profile_id', 'game_id'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function profile()
    {
        return $this->belongsTo(XApiProfile::class, 'xapi_profile_id');
    }

    public function session_xapi_statement()
    {
        return $this->hasMany(SessionXapiStatement::class, 'session_id', 'id');
    }
}
