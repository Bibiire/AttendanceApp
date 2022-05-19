<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Cih;
use App\Models\Zone;
use App\Models\Attendance;
use App\Models\Member;
use App\Models\NewJoiner;
use App\Models\Center;
use App\Models\SpecialRequest;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Imports\MemberImport;
use App\Imports\NewJoinerImport;
use App\Imports\ImportMem;
use App\Exports\ExportUser;

class CihController extends Controller
{
    public function CihIndex(){
        return view('cih.cih_login');
    }

    public function CihDashboard(){
        
        // $attendances = Attendance::all();
        if(Auth::guard('cih')->user()){
            $user = Cih::find(Auth::guard('cih')->user()->id);
            $centerId = $user->center_id;
            $center = Center::where('id', $centerId)->firstOrfail();
            $zone = Zone::where('id', $center->zone_id)->firstOrfail();
            $members = Member::where('center_id',$centerId)->get();
            $newJoiner = NewJoiner::where('center_id',$centerId)->get();
            $host = Member::where('center_id',$centerId)->where('position', 'Host')->get();
            $ps = Member::where('center_id',$centerId)->where('position', 'Prayer Secretary')->get();
            $ws = Member::where('center_id',$centerId)->where('position', 'Welfare Secretary')->get();
            // $members = $user->member()->get();
            $dateyear = Carbon::now()->year;
            $attendance = Attendance::where('center_id',$centerId)->orderBy('created_at', 'DESC')->first();
            $attendances = Attendance::where('center_id',$centerId)->orderBy('created_at', 'DESC')->whereYear('created_at', '=', date('Y'))->get();
            $totalAttendances = Attendance::where('center_id',$centerId)->orderBy('created_at', 'DESC')->whereYear('created_at', '=', $dateyear)->pluck('totalAttendance');
            $attendanceCount = count($attendances);
            $sum = $totalAttendances->sum();
            $newJoinerCount = count($newJoiner);
            $averagePop = ($sum/$attendanceCount);
            $averagePopulation = round((float)$averagePop, 0);
            // $now = Carbon::now();
            // $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
            // $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
        }
        // return $weekStartDate;
        $cih = Cih::find(Auth::guard('cih')->user()->id);
        return view('cih.index', compact('members', 'cih', 'attendance','host',  'ps', 'ws', 'newJoinerCount', 'averagePopulation','center','zone'));
    }

    public function CihLogin(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('cih')->attempt(['username' => $check ['username'], 'password' => $check['password'], ])){
            return redirect()->route('cih.dashboard')->with('error','Cih Pastor Login Is Successful');
        }else{
            return back()->with('error','Invalid Email or Password');
        }

    }

    public function CihLogout(){

        Auth::guard('cih')->logout();
        return redirect()->route('cih_login_from')->with('error','Cih Pastor Logout Is Successful');
    }

    public function createMember()
    {
        
        return view('cih.create_member');
    }

    public function MemberCreate(Request $request){
        // return $request->all();
        $age = Carbon::parse($request->date_of_birth)->age;
        $ageBand = '';
        if($age <= 12){
            $ageBand = 'Child';
        }
        elseif ($age <= 19) {
            $ageBand = 'Teen';
        }
        elseif ($age <=39 && $request->marital_status == "married") {
            $ageBand = 'Adult';
        }
        elseif (($age <=39) && ($request->marital_status == "single")
        ) {
            $ageBand = 'Youth';
        }
        elseif ($age > 39 || $request->marital_status == "married" ) {
            $ageBand = 'Adult';
        }

        Member::insert([
            'family_name' => $request->first_name,
            'other_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'home_address' => $request->home_address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'age' => $age,
            'age_band' => $ageBand,
            'stateOfOrigin' => $request->state,
            'position' => $request->position,
            'center_id' => $request->center_id,
            'created_at' => Carbon::now(),

        ]);
        NewJoiner::insert([
            'family_name' => $request->first_name,
            'other_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'home_address' => $request->home_address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'age' => $request->age,
            'age_band' => $ageBand,
            'stateOfOrigin' => $request->state,
            'position' => $request->position,
            'center_id' => $request->center_id,
            'created_at' => Carbon::now(),

        ]);
        


        return redirect()->route('cih.dashboard')->with('error','New Joiner Saved Successful');

    }
    public function MemberRegister()
    {
        if (Auth::guard('cih')->user()) {
            $user = Cih::find(Auth::guard('cih')->user()->id);
            $centerId = $user->center_id;
            $members = Member::where('center_id',$centerId)->get();
            $center = Center::where('id', $centerId)->firstOrfail();
            $zone = Zone::where('id', $center->zone_id)->firstOrfail();
        }
        return view('cih.register', compact('members', 'center', 'zone'));
        
    }

    public function CreateAttendance()
    {
        $cih = Cih::find(Auth::guard('cih')->user()->id);
        // $user = Cih::find(Auth::guard('cih')->user()->id);
        $centerId = $cih->center_id;
        // $center = Center::where('id', $centerId)->firstOrfail();
        $members = Member::where('center_id',$centerId)->get();
        $host = Member::where('center_id',$centerId)->where('position', 'Host')->first();
        $ps = Member::where('center_id',$centerId)->where('position', 'Prayer Secretary')->first();
        $ws = Member::where('center_id',$centerId)->where('position', 'Welfare Secretary')->first();
        $center = Center::where('id', $centerId)->firstOrfail();
        $zone = Zone::where('id', $center->zone_id)->firstOrfail();

        // return $center;
        return view('cih.attendance', compact('cih', 'host', 'ps', 'ws', 'members', 'center', 'zone'));
    }


    public function AttendanceCreate(Request $request){
        // return $request->all();
        $request->validate([
            'activity' => 'required',
            'femaleAdult' => 'required',
            'maleAdult' => 'required',
            'femaleYouth' => 'required',
            'femaleTeen' => 'required',
            'femaleChild' => 'required',
            'maleYouth' => 'required',
            'maleTeen' => 'required',
            'maleChild' => 'required',
            'visit' => 'required',
            'covid' => 'required',
            'stateOfFlock' => 'required',
            'finalRemark' => 'required'
        ]);
        $femaleAdult = $request->femaleAdult;
        $femaleYouth = $request->femaleYouth;
        $femaleTeen = $request->femaleTeen;
        $femaleChild = $request->femaleChild;
        $maleAdult = $request->maleAdult;
        $maleYouth = $request->maleYouth;
        $maleTeen = $request->maleTeen;
        $maleChild = $request->maleChild;
        $totalMale = $maleAdult + $maleChild + $maleTeen + $maleYouth;
        $totalFemale = $femaleAdult + $femaleYouth + $femaleTeen + $femaleChild;
        $totalAtt = $totalMale + $totalFemale;
        $totalAttendance = (int)$totalAtt;

       $attendance = Attendance::create([
            'activity' => $request->activity,
            'femaleAdult' => $request->femaleAdult,
            'maleAdult' => $request->maleAdult,
            'femaleYouth' => $request->femaleYouth,
            'femaleTeen' => $request->femaleTeen,
            'femaleChild' => $request->femaleChild,
            'maleYouth' => $request->maleYouth,
            'maleTeen' => $request->maleTeen,
            'maleChild' => $request->maleChild,
            'visit' => $request->visit,
            'covid' => $request->covid,
            'covidReason' => $request->covidReason,
            'stateOfFlock' => $request->stateOfFlock,
            'finalRemark' => $request->finalRemark,
            'totalMale' => $totalMale,
            'totalFemale' => $totalFemale,
            'totalAttendance' => $totalAttendance,
            'center_id' => $request->center_id,  
            'startTime' => $request->startTime,  
            'endTime' => $request->endTime,  
            'created_at' => Carbon::now(),

        ]);
        return redirect()->route('cih.dashboard')->with('error','Attendance Submitted Successfully');

        // return $request->input();
    }
    public function viewMember($id)
    {
        if(Auth::guard('cih')->user()){
            $user = Cih::find(Auth::guard('cih')->user()->id); 
            $centerId = $user->center_id;
            $center = Center::where('id', $centerId)->firstOrfail();
            $zone = Zone::where('id', $center->zone_id)->firstOrfail();
            $member = Member::find($id);
            // return $member
            return view('cih.member', compact('member', 'center','zone'));
        }
    }
    public function HouseDetails($id)
    {
        
            $report = Attendance::find($id);
            return $report;
        
    }
    public function RequestStat()
    {
        if(Auth::guard('cih')->user()){
            $user = Cih::find(Auth::guard('cih')->user()->id); 
            $centerId = $user->center_id;
            $center = Center::where('id', $centerId)->firstOrfail();
            $zone = Zone::where('id', $center->zone_id)->firstOrfail();
            $specialRequests = SpecialRequest::where('center_id', $centerId)->get();
            $pendingCount = SpecialRequest::where('center_id', $centerId)->where('status','=','1')->count();
            $settledCount = SpecialRequest::where('center_id', $centerId)->where('status','=','2')->count();
            $rejectCount = SpecialRequest::where('center_id', $centerId)->where('status','=','3')->count();
            $requestCount = count($specialRequests);
            $pendingCountPecent = $pendingCount / $requestCount * 100;
            $settledCountPecent = $settledCount / $requestCount * 100;
        }
        
        return view('cih.special_request_stat', compact('specialRequests', 'pendingCount', 'settledCount', 'rejectCount', 'settledCountPecent', 'pendingCountPecent','center','zone'));
    }

    public function getSpecialRequest($id)
    {
        if(Auth::guard('cih')->user()){
            $user = Cih::find(Auth::guard('cih')->user()->id); 
            $centerId = $user->center_id;
            $specialRequest = SpecialRequest::where('center_id', $centerId)->findOrFail($id);
        }
        // return $specialRequest;
        return view('cih.special_request_edit', compact('specialRequest'));
    }
    public function SpecialRequestUpdate(Request $request)
    {
       $spec_id = $request->id;
       SpecialRequest::findOrFail($spec_id)->update([
        'pastorComment' => $request->pastorComment,

       ]);


        return redirect()->route('request.stat');
    }

    public function getmember()
    {
        if(Auth::guard('cih')->user()){
            $user = Cih::find(Auth::guard('cih')->user()->id);
            $members = $user->member()->get();
            return $members;
        }
    }
    public function CihChangePassword(){

        return view('cih.cih_change_password');
    }

    public function CihUpdateChangePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $username =$request->username;
        $hashedPassword = Cih::find(Auth::guard('cih')->user()->id)->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $cih = Cih::find(Auth::guard('cih')->user()->id);
            $cih->password = Hash::make($request->password);
            $cih->save();
            Auth::logout();
            return redirect()->route('cih_login_from');
        }else{
            return redirect()->back();
        }
    }

    public function CihUserProfile(){
        // $id = Auth::cih()->id;
        // $cih = Cih::find($id);
        $cih = Cih::find(Auth::guard('cih')->user()->id);
        // return $cih;
        return view('cih.cih_user_profile',compact('cih'));

    }

    public function CihProfileStore(Request $request){
        $data = Cih::find(Auth::guard('cih')->user()->id);
        $data->username = $request->username;
        $data->email = $request->email;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            @unlink(public_path('upload/cih_images/'.$data->profile_image));
            $filename = date('YmdHi'). $file->getClientOriginalName();
            $file->move(public_path('upload/cih_images'),$filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Cih Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('cih.dashboard')->with($notification);
    }
    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        $user = Auth::guard('cih')->user();
        $center_id = $user->center_id;
        $members = Excel::import(new MemberImport($center_id), $request->file('file')->store('files'));
        return 'success';
        return redirect()->back();
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }
    // public function import_file(Type $var = null)
    // {
    //     # code...
    // }

}
