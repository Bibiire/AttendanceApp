<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Core_leaders;
use App\Models\SpecialRequest;
use App\Models\Cih;
use App\Models\Center;
use App\Models\Member;
use App\Models\Team_lead;
use App\Models\Attendance;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class Core_leadersController extends Controller
{
    public function Core_leadersIndex(){
        return view('core_leaders.core_leaders_login_from');
    }

    

    public function Core_leadersDashboard(){
        $attendancess = Attendance::all();
        // $specialRequests = SpecialRequest::all();
        $specialRequests = DB::table('teams')
                ->join('zones', 'zones.team_id', '=', 'teams.id')
                ->join('centers', 'centers.zone_id', '=', 'zones.id')
                ->join('special_requests', 'special_requests.center_id', '=', 'centers.id')
                ->get();
        $pendingCount = SpecialRequest::where('status','=','1')->count();
            $settledCount = SpecialRequest::where('status','=','2')->count();
            $rejectCount = SpecialRequest::where('status','=','3')->count();
            // return $specialRequests;
        return view('core_leaders.index', compact('specialRequests','pendingCount','settledCount','rejectCount', 'attendancess'));

    }

    public function Core_leadersLogin(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('core_leaders')->attempt(['username' => $check ['username'], 'password' => $check ['password'] ])){
            return redirect()->route('core_leaders.dashboard')->with('error','Core Leader Login Is Successful');
        }else{
            return back()->with('error','Invalid Password');
        }

    }

    public function Core_leadersRegisterCreate(Request $request){
        // dd($request->all());

        Core_leaders::insert([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('core_leaders_login_from')->with('error','Core Leader Created Is Successful');


    }

    public function Core_leadersLogout(){
        Auth::guard('core_leaders')->logout();
        return redirect()->route('core_leaders_login_from')->with('error','Core Leader Logout Is Successful');
    }

    public function Core_leadersUpdateChangePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

    $username =$request->username;



        $hashedPassword = Core_leaders::find(Auth::guard('core_leaders')->user()->id)->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $core_leaders = Core_leaders::find(Auth::guard('core_leaders')->user()->id);
            $core_leaders->password = Hash::make($request->password);
            $core_leaders->save();
            Auth::logout();
            return redirect()->route('core_leaders_login_from');
        }else{
            return redirect()->back();
        }
    }
    public function Core_leadersChangePassword(){

        return view('core_leaders.core_leaders_change_password');
    }

    public function CihPastor()
    {
        $cihCount = Cih::all()->count();
        $membersCount = Member::all()->count();
        $centerCount = Cih::all()->count();
        // $cihs = $center->Centers();
        $cihs =  DB::table('teams')
                ->join('zones', 'zones.team_id', '=', 'teams.id')
                ->join('centers', 'centers.zone_id', '=', 'zones.id')
                ->join('cihs', 'cihs.center_id', '=', 'centers.id')
                ->join('attendances', 'attendances.center_id', '=', 'centers.id' )
                ->select('attendances.*','cihs.full_name','cihs.phone','centers.location','centers.name','zones.names','teams.nam')->orderby('created_at', 'DESC')->take($centerCount)
                ->get();
                

        $attendances = DB::table('centers')->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.*')->orderby('created_at', 'DESC')->take($centerCount)->pluck('totalAttendance');
        $attendance = Attendance::all();
        $attendanceCount = count($attendances);
        $attendanceSum = $attendances->sum();
        $attendanceCountint = (int)$attendanceCount;
        $attendanceSumint = (int)$attendanceSum;
        $averageAtt = ($attendanceSum / $attendanceCount);
        $averageAttendance = round((float)$averageAtt, 0);
        // return $cihs;
        return view('core_leaders.cih_pastor', compact('cihs', 'cihCount','membersCount', 'attendanceSum', 'averageAttendance', 'attendanceCount','attendance'));
    }
    public function Attendance($id)
    {
        
        // $cihs = $center->Centers();
        $attendance =  DB::table('teams')
                ->join('zones', 'zones.team_id', '=', 'teams.id')
                ->join('centers', 'centers.zone_id', '=', 'zones.id')
                ->join('cihs', 'cihs.center_id', '=', 'centers.id')
                ->join('attendances', 'attendances.center_id', '=', 'centers.id' )
                ->select('attendances.*')->where('attendances.id', $id)->first();

        // return $attendance;
        return view('core_leaders.attendanceView', compact('attendance'));
    }

    public function InspectorateStat()
    {
        $inspectorates = DB::table('teams')
        ->join('team_leads', 'team_leads.team_id', '=', 'teams.id')->get();
        return view('core_leaders.inspectorateStats', compact('inspectorates'));
    }

    public function Administrative()
    {
        $welfareSec = DB::table('teams')->join('zones', 'zones.team_id', '=', 'teams.id')->join('centers', 'centers.zone_id', '=', 'zones.id')->join('members', 'members.center_id', '=', 'centers.id' )->select('members.*','centers.name','zones.names','teams.nam')->where('position', 'Welfare Secretary')->get();
        $prayerSec = DB::table('teams')->join('zones', 'zones.team_id', '=', 'teams.id')->join('centers', 'centers.zone_id', '=', 'zones.id')->join('members', 'members.center_id', '=', 'centers.id' )->select('members.*','centers.name','zones.names','teams.nam')->where('position', 'Prayer Secretary')->get();
        // return $welfareSec;
        return view('core_leaders.administrative', compact('welfareSec', 'prayerSec'));

    }
    public function WelfareSec($id)
    {
        $member = DB::table('teams')
                        ->join('zones', 'zones.team_id', '=', 'teams.id')
                        ->join('centers', 'centers.zone_id', '=', 'zones.id')
                        ->join('members', 'members.center_id', '=', 'centers.id' )
                        ->select('members.*')->where('position', 'Welfare Secretary')->where('members.id', $id)->first();
        // $prayerSec = Member::where('position', 'Prayer Secretary')->get();
        return $welfareSec;
        return view('core_leaders.administrative', compact('member'));

    }
    public function PrayerSec($id)
    {
        $member = DB::table('teams')
                        ->join('zones', 'zones.team_id', '=', 'teams.id')
                        ->join('centers', 'centers.zone_id', '=', 'zones.id')
                        ->join('members', 'members.center_id', '=', 'centers.id' )
                        ->select('members.*')->where('position', 'Welfare Secretary')->where('members.id', $id)->first();
        // $prayerSec = Member::where('position', 'Prayer Secretary')->get();
        return $welfareSec;
        return view('core_leaders.administrative', compact('member'));

    }
    public function Celebration()
    {
        return view('core_leaders.celebration');
    }

}







