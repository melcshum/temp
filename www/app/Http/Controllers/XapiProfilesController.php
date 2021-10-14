<?php


namespace App\Http\Controllers;

use App\Models\ProfileScenarioRating;
use App\Models\XapiProfile;

use Illuminate\Http\Request;

class XapiProfilesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $xapi_profiles = XapiProfile::latest()->paginate(20);

        return view('xapiprofiles.index', compact('xapi_profiles'));
    }

    public function show($id)
    {
        $profile =  XapiProfile::with(['game_sessions', 'game_sessions.game', 'scenario_ratings.scenario'])->where('id', '=', $id)->get()->first();


        $scenario_ratings = $profile->scenario_ratings->sortby('scenario.name');

        $game_sessions = $profile->game_sessions()->paginate(20);

        return view("xapiprofiles.show", compact(['profile', 'game_sessions', 'scenario_ratings']));
    }
}
