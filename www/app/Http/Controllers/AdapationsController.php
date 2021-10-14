<?php


namespace App\Http\Controllers;
use App\Models\Adapation;
use Illuminate\Http\Request;

class AdapationsController extends Controller
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

        $adapations = Adapation::latest()->paginate(20);

        return view('adapations.index', compact('adapations'));
    }
}
