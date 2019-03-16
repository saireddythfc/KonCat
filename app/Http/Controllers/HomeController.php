<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Team;
use App\User;
use App\Registration;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index() {
        
        return view('home2');
    }
    public function setLocation(Request $r, $city) {
        $r->session()->put('location', $city);
        return redirect('/home2');
    }
    public function index2(Request $r)
    {
        if($r->session()->has('location'))
            $location = $r->session()->get('location');
        else
            $location = 'Not set';
        /*$teams = new Team();
        $teams = $teams->all();

        $locations = array();
        foreach($teams as $team){
            $tempArray = array($team->location => 'ye');
            $locations = $locations + $tempArray;
        }

        $domains = array();
        foreach($teams as $team){
            $tempArray = array($team->domain => 'ye');
            $domains = $domains + $tempArray;
        }

        $teams = new Team();
        $teams = $teams->all();
        */
        $data = array(/*'locations' => $locations,
            'domains' => $domains,
            'teams' => $teams,*/
            'location' => $location);
        return view('home')->with($data);
    }
    public function teamBuild(Request $r)
    {

        if($r->session()->has('location'))
            $location = $r->session()->get('location');
        else
            $location = 'Not set';


        $loggedInUser = Auth::user();
        $user_id = $loggedInUser->id;
        return view('teamBuild')->with('user_id', $user_id)->with('location', $location);
    }

    public function processTeam(Request $data)
    {
        $data = $data->all();

        $team = new Team();
        $team->domain = $data['domain'];
        $team->user_id = $data['user_id'];
        $team->event = $data['event'];
        $team->date = $data['date'];
        $team->time = $data['time'];
        $team->location = $data['location'];
        $team->contact_no = $data['contact_no'];
        $team->requirements = $data['requirements'];
        $team->description = $data['description'];

        $team->save();

        return redirect('/showTeams');
    }

    public function showTeams()
    {
        $user_id = Auth::user()->id;

        $teams = User::find($user_id)->team;

        foreach ($teams as $team) {
            $temp = DB::select("SELECT * FROM Users, Registrations WHERE Registrations.team_id = '$team->id' 
                AND Registrations.user_id = Users.id");
            $team['registrations'] = $temp;
        }

        //return $teams;

    
        $yourRequestedTeams =  DB::select("SELECT * FROM teams, Registrations WHERE teams.id = Registrations.team_id
            AND Registrations.user_id = '$user_id'");
        
        $data = array('teams' => $teams,
            'yourRequestedTeams' => $yourRequestedTeams);
  
        return view('showTeams')->with($data);
    }

    public function updateTeam($id)
    {
        $teams = new Team();
        $teams = $teams->all();

        

        foreach($teams as $team)
        {
            if($team->id == $id)
                $teamToUpdate = $team;
        }
        return view('updateTeam')->with('team', $teamToUpdate);
    }

    public function updateTeamSave(Request $data, $id)
    {
        
        $data = $data->all();

        /*$team = new Team();*/

        $team = Team::find($id);


        
        $team->date = $data['date'];
        $team->time = $data['time'];
        $team->location = $data['location'];
        $team->contact_no = $data['contact_no'];
        $team->requirements = $data['requirements'];
        $team->description = $data['description'];

        $team->save();

        return redirect('/showTeams');
    }

    public function selectDomain()
    {
        return view('selectDomain');
    }

    public function technicalTeams()
    {
        $finalTeams = array();
        $technicalTeams =  DB::table('teams')->where('domain', '=', 'TECHNICAL')->get();
        $user_id = Auth::user()->id;
        foreach ($technicalTeams as $team) {
            if($team->id != $user_id)
                array_push($finalTeams, $team);
        }
        
        return view('technicalTeams')->with('technicalTeams',$finalTeams);

    }

    public function culturalTeams()
    {
        /*$culturalTeams =  DB::table('teams')->where('domain', '=', 'CULTURAL')->get();
        
        return view('culturalTeams')->with('culturalTeams',$culturalTeams);        */

        $finalTeams = array();
        $technicalTeams =  DB::table('teams')->where('domain', '=', 'CULTURAL')->get();
        $user_id = Auth::user()->id;
        foreach ($technicalTeams as $team) {
            if($team->id != $user_id)
                array_push($finalTeams, $team);
        }
        
        return view('technicalTeams')->with('culturalTeams',$finalTeams);
    }

    public function sportTeams()
    {
       /* $sportTeams =  DB::table('teams')->where('domain', '=', 'SPORT')->get();
        
        return view('sportTeams')->with('sportTeams',$sportTeams); */  

        $finalTeams = array();
        $technicalTeams =  DB::table('teams')->where('domain', '=', 'SPORT')->get();
        $user_id = Auth::user()->id;
        foreach ($technicalTeams as $team) {
            if($team->id != $user_id)
                array_push($finalTeams, $team);
        }
        
        return view('technicalTeams')->with('sportTeams',$finalTeams);
    }

    public function teamList(Request $r)
    {
        if($r->session()->has('location'))
            $location = $r->session()->get('location');
        else
            $location = 'Not set';

        $user_id = Auth::user()->id;
        $teams =  DB::table('teams')->get();
        $teams = DB::select("SELECT * FROM teams WHERE id NOT IN(
            SELECT team_id FROM registrations WHERE user_id = '$user_id') AND location = '$location'");


        $finalTeams = array();

        $user_id = Auth::user()->id;
        foreach ($teams as $team) {
            if($team->user_id != $user_id && $team->requirements > 0){

                array_push($finalTeams, $team);
            }
        }
        
        $data = array('teams' => $finalTeams,
            'location' => $location);
        return view('teamList')->with($data);   
    }

    public function requestTeam($id){
        $user_id = Auth::user()->id;
        $r = new Registration();

        $r->user_id = $user_id;
        $r->team_id = $id;
        $r->status = "Pending";

        $r->save();
        return 'ye';
    }

    public function acceptRequest($data) {
        
        $res = DB::table('Registrations')->where('id', $data[0])->update(['status' => 'Accepted']);
        return $res;
    }

     public function rejectRequest($data) {
        
        $res = DB::table('Registrations')->where('id', $data[0])->update(['status' => 'Rejected']);
        return $res;
    }
}
