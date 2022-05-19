<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Team_lead;
use App\Models\Zonal_coordinator;
use App\Models\Zone;
use App\Models\Center;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;


class Team_leadController extends Controller
{
    public function Team_leadIndex(){
        return view('team_lead.team_lead_login');
    }

    public function Team_leadDashboard(){
        if(Auth::guard('team_lead')->user()){
         $user = Auth::guard('team_lead')->user();
         $teamId = $user->team_id;
         $zonalchords = Zonal_coordinator::where('team_id', $teamId)->get();
         $zonalChordCount = count($zonalchords);
         $zones = Zone::where('team_id', $teamId)->get();
         $zoneCount = count($zones);
         $members = Zone::where('team_id', $teamId)->join('centers', 'centers.zone_id', '=', 'zones.id' )->join('members', 'members.center_id', '=', 'centers.id')->select('members.*')->get();
         $memberCount = count($members);
         $centers = Zone::where('team_id', $teamId)->join('centers', 'centers.zone_id', '=', 'zones.id' )->select('centers.*')->get();
         $centerCount = count($centers);
         $todayDate = Carbon::now()->format('Y-m-d');
         $zonals = Team::where('teams.id', $teamId)->join('zones', 'zones.team_id', '=', 'teams.id')->join('zonal_coordinators', 'zonal_coordinators.zone_id', '=', 'zones.id')->get();
        //  return $zonals;
        }
        return view('team_lead.index', compact('zonalchords', 'zonalChordCount', 'zones', 'zoneCount', 'members', 'memberCount', 'centers', 'centerCount', 'todayDate', 'zonals'));
    }

    public function Team_leadLogin(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('team_lead')->attempt(['username' => $check ['username'], 'password' => $check['password'] ])){
            return redirect()->route('team_lead.dashboard')->with('error','Team_lead Login Is Successful');
        }else{
            return back()->with('error','Invalid Email or Password');
        }

    }

    public function Team_leadLogout(){

        Auth::guard('team_lead')->logout();
        return redirect()->route('team_lead_login_from')->with('error','Team Lead Logout Is Successful');
    }

    
    public function NewMembers()
    {
        $user = Auth::guard('team_lead')->user();
        $teamId = $user->team_id;
        $members = Zone::where('team_id', $teamId)->join('centers', 'centers.zone_id', '=', 'zones.id' )->join('new_joiners', 'new_joiners.center_id', '=', 'centers.id')->select('new_joiners.*','centers.name','zones.names')->get();
        return view('team_lead.newMember', compact('members')) ;
    }
    public function NewJoiner($id)
    {
        $user = Auth::guard('team_lead')->user();
        $teamId = $user->team_id;
        $member = Zone::where('team_id', $teamId)->join('centers', 'centers.zone_id', '=', 'zones.id' )->join('new_joiners', 'new_joiners.center_id', '=', 'centers.id' )->select('new_joiners.*', 'centers.name')->where('new_joiners.id', $id)->firstOrFail();
        return view('team_lead.newjoiner', compact('member')) ;
    }

    public function SpecialRequests()
    {
        $user = Auth::guard('team_lead')->user();
        $teamId = $user->team_id;
        $specialRequests = Zone::where('team_id', $teamId)->join('centers', 'centers.zone_id', '=', 'zones.id' )->join('special_requests', 'special_requests.center_id', '=', 'centers.id')->select('special_requests.*','zones.names', 'centers.name')->get();
        return view('team_lead.specialRequest', compact('specialRequests')) ;
    }

    public function HouseReport()
    {
        $user = Auth::guard('team_lead')->user();
        $teamId = $user->team_id;
        $cihs = Zone::where('team_id', $teamId)->join('centers', 'centers.zone_id', '=', 'zones.id' )->join('cihs', 'cihs.center_id', '=', 'centers.id')->select('cihs.*','centers.name')->get();
        // return $cihs;
        return view('team_lead.center', compact('cihs')) ;
    }
    public function HousesReport($id)
    {
        $user = Auth::guard('team_lead')->user();
        $teamId = $user->team_id;
        $attendance = Zone::where('team_id', $teamId)->join('centers', 'centers.zone_id', '=', 'zones.id' )->join('cihs', 'cihs.center_id', '=', 'centers.id')->join('attendances', 'attendances.center_id', '=', 'cihs.center_id' )->select('attendances.*')->where('attendances.id', $id)->firstOrFail();
        // return $attendance;
        return view('team_lead.centerView', compact('attendance')) ;
    }
    public function ZonalCoordinatorReport()
    {
        $user = Auth::guard('team_lead')->user();
        $teamId = $user->team_id;
        $zonalchords = Zonal_coordinator::where('team_id', $teamId)->join('monthly_feedback','monthly_feedback.zone_id', '=', 'zonal_coordinators.zone_id')->get();
        // return $zonalchords;
        return view('team_lead.zonalCoordinator', compact('zonalchords'));
    }
    public function ZonalCoordinatorsReport($id)
    {
        $user = Auth::guard('team_lead')->user();
        $teamId = $user->team_id;
        $report = Zone::where('team_id', $teamId)->join('monthly_feedback','monthly_feedback.zone_id', '=', 'zones.id')->select('monthly_feedback.*')->where('monthly_feedback.id',$id)->firstOrFail();
        // return $report;
        return view('team_lead.report', compact('report'));
    }


}
