<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WebLoginRequest;
use Auth;
use DB;
use App\Models\Room;
use App\Models\Customer;
use App\Models\Province;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Prescription;
use App\Models\Booking;
use App\Models\FootballMatch;
use App\Models\HealthCertification;
use App\Models\University;
use App\Models\Utiliti;
use App\Models\Type;
use App\Models\Tournament;

class WebController extends Controller
{
    public function index(Request $request)
    {
       $tournaments = Tournament::paginate(10);

        $data = [
            'tournaments' => $tournaments,
        ];

    	return view('web.index', $data);
    }

    public function tournamentDetail($id)
    {
        $tournament = Tournament::find($id);

        $data = [
            'tournament' => $tournament
        ];

        return view('web.tournament-detail', $data);
    }
    
    public function matchDetail($id)
    {
        $match = FootballMatch::find($id);

        $data = [
            'match' => $match
        ];

        return view('web.match-detail', $data);
    }
}
