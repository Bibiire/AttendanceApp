<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use App\Models\Team;
use App\Models\Zone;
use App\Models\Center;
use App\Models\Cih;
use App\Models\Zonal_coordinator;
use App\Models\Team_lead;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }

    public function Dashboard(){
        $centers = Center::all();
        $centerCount = count($centers);
        $zones = Zone::all();
        $zoneCount = count($zones);
        $teams = Team::all();
        return view('admin.index', compact('centers', 'zones', 'teams'));
    }

    public function Login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['name' => $check ['name'], 'password' => $check['password'] ])){
            return redirect()->route('admin.dashboard')->with('error','Admin Login Is Successful');
        }else{
            return back()->with('error','Invalid Email or Password');
        }

    }

    public function AdminLogout(){

        Auth::guard('admin')->logout();
        return redirect()->route('login_from')->with('error','Admin Logout Is Successful');
    }

    public function AdminRegister(){

        return view('admin.admin_register');
    }

    public function AdminRegisterCreate(Request $request){
        // dd($request->all());

        Admin::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('login_from')->with('error','Admin Created Is Successful');


    }
    public function CreateTeam()
    {
            return view('admin.createTeam');
    }

    public function TeamCreate(Request $request)
    {
        // return $request->all();
        $team = Team::create([
            'name'=>$request->name,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.dashboard')->with('error','Team Created Is Successful');
    }

    public function CreateZone()
    {
            $teams = Team::all();
            return view('admin.createZone', compact('teams'));
    }

    public function ZoneCreate(Request $request)
    {
        // return $request->all();
        $zone = Zone::insert([
            'name'=>$request->name,
            'team_id'=>$request->team_id,
            'created_at' => Carbon::now(),
        ]);
        // return $zone;
        return redirect()->route('admin.dashboard')->with('error','Zone Created Is Successful');
    }
    public function CreateCenter()
    {
            $zones = Zone::all();
            return view('admin.createCenter', compact('zones'));
    }

    public function CenterCreate(Request $request)
    {
        // return $request->all();
        $center = Center::insert([
            'name'=>$request->name,
            'location'=>$request->location,
            'zone_id'=>$request->zone_id,
            'created_at' => Carbon::now(),
        ]);
        // return $zone;
        return redirect()->route('admin.dashboard')->with('error','Center Created Is Successful');
    }
    public function GetCenter($zone_id)
    {
       $centers = Center::where('zone_id', $zone_id)->orderBy('name', 'ASC')->get();
       return json_encode($centers);
    }
    public function GetZone($team_id)
    {
       $zones = Zone::where('team_id', $team_id)->orderBy('names', 'ASC')->get();
       return json_encode($zones);
    }
    public function CihRegister()
    {
        $zones = Zone::all();
        return view('cih.cih_register', compact('zones'));

    }
    public function CihRegisterCreate(Request $request)
    {
        // return $request->all();
        Cih::insert([
            'full_name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'center_id' => $request->center_id,
            'zone_id' => $request->zone_id,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('admin.dashboard')->with('error','Cih Pastor Created Is Successful');

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

        return redirect()->route('admin.dashboard')->with('error','Zonal Coordinator Created Is Successful');

    }

    public function Team_leadRegister(){
        $teams = Team::all();
        return view('team_lead.team_lead_register', compact('teams'));

    }

    public function Team_leadRegisterCreate(Request $request){
        // dd($request->all());

        Team_lead::insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'team_id' => $request->team_id,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('admin.dashboard')->with('error','Team Lead Created Is Successful');
    }

    public function Core_leadersRegister(){

        return view('core_leaders.core_leaders_register');
    }

    public function Core_leadersRegisterCreate(Request $request){
        // dd($request->all());

        Core_leaders::insert([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('admin.dashboard')->with('error','Core Leader Created Is Successful');


    }
}
