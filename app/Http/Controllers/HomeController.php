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

        return redirect('/showTeams2');
    }

    

    public function showTeams2(Request $r)
    {
        if($r->session()->has('location'))
            $location = $r->session()->get('location');
        else
            $location = 'Not set';

        $user_id = Auth::user()->id;

        $teams = User::find($user_id)->team;

        foreach ($teams as $team) {
            $temp = DB::select("SELECT Users.id, Registrations.id as r_id, Users.name, Registrations.status FROM Users, Registrations WHERE Registrations.team_id = '$team->id' 
                AND Registrations.user_id = Users.id");
            
            $team['registrations'] = $temp;
        }

        //return $teams;

    
        $yourRequestedTeams =  DB::select("SELECT * FROM teams, Registrations WHERE teams.id = Registrations.team_id
            AND Registrations.user_id = '$user_id'");

        //return $yourRequestedTeams;
        
        $data = array('teams' => $teams,
            'yourRequestedTeams' => $yourRequestedTeams,
            'user_id' => $user_id, 'location'=> $location);
  
        return view('showTeams2')->with($data);
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

        return redirect('/showTeams2');
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



    public function chat($team_id) {

        $teams = DB::select("SELECT * FROM teams WHERE id='$team_id'");
        foreach ($teams as $team) {
            $to_id = $team->user_id;
        }
        $user_id = Auth::user()->id;
                
        $chats = DB::select("SELECT * FROM chats WHERE team_id='$team_id'
            AND ((from_id='$user_id' AND to_id='$to_id') OR 
            (to_id='$user_id' AND from_id='$to_id'))");
        $chatWith = DB::select("SELECT * FROM users WHERE id = '$to_id'");
        $chatRegarding = DB::select("SELECT * FROM teams WHERE id = '$team_id'");
        $data = array('to_id' => $to_id,
            'id' => $user_id,
            'team_id' => $team_id,
            'chats' => $chats,
            'chatWith' => $chatWith,
            'chatRegarding' => $chatRegarding);

        return view('chat')->with($data);
    }

    public function chat2($to_id){
        $user_id = Auth::user()->id;
        $data = array('id' => $user_id,
            'to_id' => $to_id);
        return view('chat')->with($data);
    }

    public function myChats() {
        $user_id = Auth::user()->id;

        $chat1 = array();

        //Chats of user's teams
        $fids = DB::select("SELECT team_id, from_id, to_id FROM chats WHERE team_id IN
            (SELECT id FROM teams WHERE user_id='$user_id')");
        
        foreach ($fids as $fid) {
            if($fid->from_id == $user_id)
                continue;
            $pName = DB::select("SELECT name FROM users WHERE id='$fid->from_id'");
            $eName = DB::select("SELECT event FROM teams WHERE id='$fid->team_id'");
            $t = array($eName[0]->event.'('.$pName[0]->name.')'=> $fid);
            $chat1 += $t;
            
        }
        
        $chat2 = array();
        $fids2 = DB::select("SELECT team_id, from_id, to_id FROM chats WHERE 
            from_id='$user_id' AND team_id NOT IN
            (SELECT id FROM teams WHERE user_id='$user_id')");

        foreach ($fids2 as $fid) {
            $pName = DB::select("SELECT name FROM users WHERE id='$fid->to_id'");
            $eName = DB::select("SELECT event FROM teams WHERE id='$fid->team_id'");
            $t = array($eName[0]->event.'('.$pName[0]->name.')'=> $fid);
            $chat2 += $t;
        }
        //return $chat1;
        $data = array('chat1' => $chat1,
            'chat2' => $chat2);
        //return $data;
        return view('myChats')->with($data);
    }

    public function goToChat(Request $r, $from_id, $team_id, $to_id){

        if($r->session()->has('location'))
            $location = $r->session()->get('location');
        else
            $location = 'Not set';

        $chats = DB::select("SELECT * FROM chats WHERE team_id='$team_id'
            AND ((from_id='$from_id' AND to_id='$to_id') OR 
            (to_id='$from_id' AND from_id='$to_id'))");

        $chatWith = DB::select("SELECT * FROM users WHERE id = '$to_id'");
        $chatRegarding = DB::select("SELECT * FROM teams WHERE id = '$team_id'");
        ///return $chatRegarding[0]->event;
        $data = array('to_id' => $to_id,
            'id' => $from_id,
            'team_id' => $team_id,
            'chats' => $chats,
            'chatWith' => $chatWith,
            'chatRegarding' => $chatRegarding,
            'location' => $location);

        return view('chat')->with($data);
    }

}
