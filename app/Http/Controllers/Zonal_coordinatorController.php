<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Zonal_coordinator;
use App\Models\SpecialRequest;
use App\Models\MonthlyFeedback;
use App\Models\Team;
use App\Models\Member;
use App\Models\Cih;
use App\Models\Zone;
use App\Models\Center;
use App\Models\Attendance;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportAttendance;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;

class Zonal_coordinatorController extends Controller
{
    public function Zonal_coordinatorIndex(){
        return view('zonal_coordinator.zonal_coordinator_login');
    }

    public function Zonal_coordinatorDashboard(){
        
        
        if (Auth::guard('zonal_coordinator')->user()->id) {
            $zonalCord = Zonal_coordinator::find(Auth::guard('zonal_coordinator')->user()->id);
            $zonalCordId = $zonalCord->zone_id;
            $zone = Zone::where('zones.id', $zonalCordId)->first();
            $cihs = DB::table('zones')->where('zones.id', $zonalCordId)->join('centers','centers.zone_id', 'zones.id')->join('cihs','cihs.center_id', 'centers.id')->get();
            $cihCount = count($cihs);
            $specialRequests = Center::where('zone_id', $zonalCordId)->join('special_requests', 'special_requests.center_id', '=', 'centers.id' )->select('special_requests.status')->get();
            $pendingspecialRequests = $specialRequests->where('status', 1);
            $specialRequestsCount = count($pendingspecialRequests);
            $members = Center::where('zone_id', $zonalCordId)->join('members', 'members.center_id', '=', 'centers.id' )->select('members.*')->get();
            $centers = Center::where('zone_id', $zonalCordId)->get();
            $centerCount = count($centers);
            $newJoiner = Center::where('zone_id', $zonalCordId)->join('new_joiners', 'new_joiners.center_id', '=', 'centers.id' )->select('new_joiners.*')->get();
            $attendances = Center::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.*')->orderby('created_at', 'DESC')->take($centerCount)->pluck('totalAttendance');
            // $attendance = Center::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.*')->orderby('created_at', 'DESC')->take($centerCount)->get();
            $attendanceCount = count($attendances);
            // $male = $attendanceMale->sum('totalMale'); 
            // $males = array($male);
            // $att = $attendances[0];
            $attendance = Center::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.*')->get();
            $attendanceFemale = Center::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.totalFemale')->get();
            $membersCount = count($members);
            $newJoinerCount = count($newJoiner);
        }
        // return $attendanceMale->sum('totalMale');  
        $attendanceSum = $attendances->sum();
        // return $cihs;
        return view('zonal_coordinator.index', compact('cihs', 'cihCount','membersCount','specialRequestsCount','attendances', 'attendanceSum', 'attendance','newJoinerCount', 'zone'));
        
    }

    public function Zonal_coordinatorLogin(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('zonal_coordinator')->attempt(['username' => $check ['username'], 'password' => $check['password'] ])){
            return redirect()->route('zonal_coordinator.dashboard')->with('error','Zonal_coordinator Login Is Successful');
        }else{
            return back()->with('error','Invalid Username or Password');
        }

    }

    public function Zonal_coordinatorLogout(){

        Auth::guard('zonal_coordinator')->logout();
        return redirect()->route('zonal_coordinator_login_from')->with('error','Zonal Coordinator Logout Is Successful');
    }

    public function Zonal_coordinatorRegister()
    {
        $teams = Team::all();
        return view('zonal_coordinator.zonal_coordinator_register', compact('teams'));
    }

    public function Zonal_coordinatorRegisterCreate(Request $request)
    {


        Zonal_coordinator::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'team_id' => $request->team_id,
            'zone_id' => $request->zone_id,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('zonal_coordinator_login_from')->with('error','Zonal Coordinator Created Is Successful');

    }
    public function CreateFeedback()
    {
        return view('zonal_coordinator.createFeedback');
    }
    public function FeedbackCreate(Request $request)
    {
        $feedback = MonthlyFeedback::create([
            'relocate' => $request->relocate,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone_number' => $request->phone,
            'home_address' => $request->address,
            'area' => $request->area,
            'firstMenteeName' => $request->firstMenteeName,
            'firstMenteePhone' => $request->firstMenteePhone,
            'firstMenteeOffice' => $request->firstMenteeOffice,
            'firstMenteemfm' => $request->firstMenteemfm,
            'secondMenteeName' => $request->secondMenteeName,
            'secondMenteePhone' => $request->secondMenteePhone,
            'secondMenteeOffice' => $request->secondMenteeOffice,
            'secondMenteemfm' => $request->secondMenteemfm,
            'lackOfficer' => $request->lackOfficer,
            'center' => $request->center,
            'officer' => $request->officer,
            'officerChange' => $request->officerChange,
            'whenWho' => $request->whenWho,
            'remark' => $request->remark,
            'zone_id' => $request->zone_id,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('zonal_coordinator.dashboard')->with('error','Zonal Coordinator Created Is Successful');
    }
    public function NewMember()
    {
            $zonalCord = Zonal_coordinator::find(Auth::guard('zonal_coordinator')->user()->id);
            $zonalCordId = $zonalCord->zone_id;
            $attendances = Center::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.*')->get();
            $members = Center::where('zone_id', $zonalCordId)->join('new_joiners', 'new_joiners.center_id', '=', 'centers.id' )->select('new_joiners.*', 'centers.name')->get();
            return view('zonal_coordinator.newMember',compact('members'));
    }
    public function New_Member($id)
    {
            $zonalCord = Zonal_coordinator::find(Auth::guard('zonal_coordinator')->user()->id);
            $zonalCordId = $zonalCord->zone_id;
            // $attendances = Center::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.*')->get();
            $member = Center::where('zone_id', $zonalCordId)->join('new_joiners', 'new_joiners.center_id', '=', 'centers.id' )->select('new_joiners.*', 'centers.name')->where('new_joiners.id', $id)->firstOrFail();
            // return $member;
            return view('zonal_coordinator.newJoiner',compact('member'));
    }
    public function NewMembers()
    {
            $zonalCord = Zonal_coordinator::find(Auth::guard('zonal_coordinator')->user()->id);
            $zonalCordId = $zonalCord->zone_id;
            $attendances = Center::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.*')->get();
            $members = Center::where('zone_id', $zonalCordId)->join('members', 'members.center_id', '=', 'centers.id' )->select('members.*')->get();
            return view('zonal_coordinator.newMembers',compact('members','attendances'));
    }
    public function SpecialRequest()
    {
        $zonalCord = Zonal_coordinator::find(Auth::guard('zonal_coordinator')->user()->id);
        $zonalCordId = $zonalCord->zone_id;
        $specialRequests = Center::where('zone_id', $zonalCordId)->join('special_requests', 'special_requests.center_id', '=', 'centers.id' )->select('special_requests.*', 'centers.name')->get();
        // return $specialRequests;
        return view('zonal_coordinator.specialRequest', compact('specialRequests'));
    }
    public function Special_Request($id)
    {
        $zonalCord = Zonal_coordinator::find(Auth::guard('zonal_coordinator')->user()->id);
        $zonalCordId = $zonalCord->zone_id;
        $specialRequest = Center::where('zone_id', $zonalCordId)->join('special_requests', 'special_requests.center_id', '=', 'centers.id' )->select('special_requests.*')->where('special_requests.id', $id)->firstOrFail();
        // return $specialRequests;
        return view('zonal_coordinator.specialRequest_approve', compact('specialRequest'));
    }
    public function SpecialRequestApprove(Request $request)
    {
        // return $request->all();
       $spec_id = $request->id;
       SpecialRequest::findOrFail($spec_id)->update([
        'status' => $request->status,

       ]);
       return redirect()->route('zonal_coordinator.dashboard')->with('error','Special Request Approved Successful');
    }
    public function SpecialRequestReject(Request $request)
    {
        // return $request->all();
       $spec_id = $request->id;
       SpecialRequest::findOrFail($spec_id)->update([
        'status' => $request->status,

       ]);
       return redirect()->route('zonal_coordinator.dashboard')->with('error','Special Request Rejected Successful');
    }
    public function HouseReport()
    {
        $zonalCord = Zonal_coordinator::find(Auth::guard('zonal_coordinator')->user()->id);
        $zonalCordId = $zonalCord->zone_id;
        $centers = Center::where('zone_id', $zonalCordId)->get();
        $centerCount = count($centers);
        $attendances = Cih::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'cihs.center_id' )->select('attendances.*', 'cihs.full_name', 'cihs.address', 'cihs.phone')->orderby('created_at', 'DESC')->take($centerCount)->get();
        // return $attendances;
        return view('zonal_coordinator.houseReport', compact('attendances'));
    }
    public function HouseDetails($id)
    {
        $zonalCord = Zonal_coordinator::find(Auth::guard('zonal_coordinator')->user()->id);
        $zonalCordId = $zonalCord->zone_id;
        $centers = Center::where('zone_id', $zonalCordId)->get();
        $centerCount = count($centers);
        $attendance = Cih::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'cihs.center_id' )->select('attendances.*')->where('attendances.id', $id)->firstOrFail();
            // $report = Attendance::find($id);
            // return $attendances;
            return view('zonal_coordinator.houseReports', compact('attendance'));

        
    }
    public function AttendanceStat()
    {
        $zonalCord = Zonal_coordinator::find(Auth::guard('zonal_coordinator')->user()->id);
        $zonalCordId = $zonalCord->zone_id;
        $centers = Center::where('zone_id', $zonalCordId)->get();
        $centerCount = count($centers);
        $attendanceTotal = Center::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.*')->orderby('created_at', 'DESC')->take($centerCount)->pluck('totalAttendance');
        $attendances = Center::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.*')->orderby('created_at', 'DESC')->take($centerCount)->get();
        $attendancess = Center::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.*')->orderby('created_at', 'ASC')->get();
        $attendanceOrder = Center::where('zone_id', $zonalCordId)->join('attendances', 'attendances.center_id', '=', 'centers.id' )->select('attendances.*','centers.name')->orderby('totalAttendance', 'DESC')->take($centerCount)->get();
        $attendanceCount = count($attendances);
        $attendanceSum = $attendanceTotal->sum();
        $attendanceCountint = (int)$attendanceCount;
        $attendanceSumint = (int)$attendanceSum;
        $averageAtt = ($attendanceSum / $attendanceCount);
        $averageAttendance = round((float)$averageAtt, 0);
        // return $attendanceOrder;
        return view('zonal_coordinator.attendanceStat', compact('attendanceCount', 'attendanceSum', 'averageAttendance', 'attendancess', 'attendanceOrder'));
    }
    public function ExportAttendance(Request $request){
        return Excel::download(new ExportAttendance, 'attendance.xlsx');
    }

}
