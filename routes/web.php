<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SpecialRequestController;
use App\Http\Controllers\CihController;
use App\Http\Controllers\Zonal_coordinatorController;
use App\Http\Controllers\Team_leadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Core_leadersController;

use App\Http\Controllers\PostController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin Route
Route::prefix('admin')->group(function (){
    Route::get('/login',[AdminController::class, 'Index'])->name('login_from');
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/register',[AdminController::class, 'AdminRegister'])->name('admin.register');
    Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');
    Route::post('/team/create',[AdminController::class, 'TeamCreate'])->name('create.team');
    Route::get('/createTeam',[AdminController::class, 'CreateTeam'])->name('team.create');
    Route::post('/zone/create',[AdminController::class, 'ZoneCreate'])->name('create.zone');
    Route::get('/createZone',[AdminController::class, 'CreateZone'])->name('zone.create');
    Route::post('/center/create',[AdminController::class, 'CenterCreate'])->name('create.center');
    Route::get('/createCenter',[AdminController::class, 'CreateCenter'])->name('center.create');
    Route::get('/cih/register',[AdminController::class, 'CihRegister'])->name('cih.register');
    Route::post('/cih/register/create',[AdminController::class, 'CihRegisterCreate'])->name('cih.register.create');
    Route::get('/zonal_coordinator/register',[AdminController::class, 'Zonal_coordinatorRegister'])->name('zonal_coordinator.register');
    Route::post('/zonal_coordinator/register/create',[AdminController::class, 'Zonal_coordinatorRegisterCreate'])->name('zonal_coordinator.register.create');
    Route::get('/team_lead/register',[AdminController::class, 'Team_leadRegister'])->name('team_lead.register');
    Route::post('/team_lead/register/create',[AdminController::class, 'Team_leadRegisterCreate'])->name('team_lead.register.create');
    Route::get('/core_leaders/register',[AdminController::class, 'Core_leadersRegister'])->name('core_leaders.register');
    Route::post('/core_leaders/register/create',[AdminController::class, 'Core_leadersRegisterCreate'])->name('core_leaders.register.create');




});
Route::get('getCenters/ajax/{zone_id}', [AdminController::class, 'GetCenter']);
Route::get('getZones/ajax/{team_id}', [AdminController::class, 'GetZone']);



// End Admin Route

// Seller Route

Route::prefix('seller')->group(function (){
    Route::get('/login',[SellerController::class, 'SellerIndex'])->name('seller_login_from');
    Route::get('/dashboard',[SellerController::class, 'SellerDashboard'])->name('seller.dashboard')->middleware('seller');

    Route::post('/login/owner',[SellerController::class, 'SellerLogin'])->name('seller.login');

    Route::get('/logout',[SellerController::class, 'SellerLogout'])->name('seller.logout')->middleware('seller');
    Route::get('/register',[SellerController::class, 'SellerRegister'])->name('seller.register');
    Route::post('/register/create',[SellerController::class, 'SellerRegisterCreate'])->name('seller.register.create');

});

// Cih Route

Route::prefix('cih')->group(function (){
    Route::get('/login',[CihController::class, 'CihIndex'])->name('cih_login_from');
    Route::get('/dashboard',[CihController::class, 'CihDashboard'])->name('cih.dashboard')->middleware('cih');
    Route::get('/member/create',[CihController::class, 'createMember'])->name('cih.create.member')->middleware('cih');
    Route::get('/member/register',[CihController::class, 'MemberRegister'])->name('cih.register.member')->middleware('cih');
    Route::get('/member/{id}',[CihController::class, 'viewMember'])->name('cih.view.member');


    Route::post('/login/owner',[CihController::class, 'CihLogin'])->name('cih.login');
    Route::get('/change/password',[CihController::class, 'CihChangePassword'])->name('cih.change.password');
    Route::get('/user/profile',[CihController::class, 'CihUserProfile'])->name('cih.user.profile');
    Route::post('/update/change/password',[CihController::class, 'CihUpdateChangePassword'])->name('update.change.password');
    Route::post('/profile/store', [CihController::class, 'CihProfileStore'])->name('cih.profile.store');

    Route::get('/logout',[CihController::class, 'CihLogout'])->name('cih.logout')->middleware('cih');
    // Route::get('/register',[CihController::class, 'CihRegister'])->name('cih.register');
    // Route::post('/register/create',[CihController::class, 'CihRegisterCreate'])->name('cih.register.create');
    Route::post('/attendance/create',[CihController::class, 'AttendanceCreate'])->name('cih.attendance.create');
    Route::get('/createAttendance',[CihController::class, 'CreateAttendance'])->name('attendance.create')->middleware('cih');
    Route::get('/specialRequestStat',[CihController::class, 'RequestStat'])->name('request.stat');
    Route::get('/specialRequest/{id}',[CihController::class, 'getSpecialRequest'])->name('get.request');
    Route::post('/specialRequest/{id}',[CihController::class, 'SpecialRequestUpdate'])->name('update.request');
    Route::get('/getmember',[CihController::class, 'getmember']);
    Route::get('/file-import',[CihController::class,'importView'])->name('import-view');
    Route::post('/import',[CihController::class,'import'])->name('import');
    Route::get('/export-users',[CihController::class,'exportUsers'])->name('export-users');





});
Route::post('member/register/create',[CihController::class, 'MemberCreate'])->name('member.register.create');

// End Cih Route

// Zonal_coordinator Route

Route::prefix('zonal_coordinator')->group(function (){
    Route::get('/login',[Zonal_coordinatorController::class, 'Zonal_coordinatorIndex'])->name('zonal_coordinator_login_from');
    Route::get('/dashboard',[Zonal_coordinatorController::class, 'Zonal_coordinatorDashboard'])->name('zonal_coordinator.dashboard')->middleware('zonal_coordinator');

    Route::post('/login/owner',[Zonal_coordinatorController::class, 'Zonal_coordinatorLogin'])->name('zonal_coordinator.login');

    Route::get('/logout',[Zonal_coordinatorController::class, 'Zonal_coordinatorLogout'])->name('zonal_coordinator.logout')->middleware('zonal_coordinator');
    
    Route::get('/feedback/create',[Zonal_coordinatorController::class, 'CreateFeedback'])->name('zonal_coordinator.feedback.create')->middleware('zonal_coordinator');
    Route::post('/feedback/create',[Zonal_coordinatorController::class, 'FeedbackCreate'])->name('zonal_coordinator.create.feedback');
    Route::get('/new/member',[Zonal_coordinatorController::class, 'NewMember'])->name('new.member');
    Route::get('/member/{id}',[Zonal_coordinatorController::class, 'New_Member'])->name('zonal_coordinator.view.member');
    Route::get('/new/members',[Zonal_coordinatorController::class, 'NewMembers'])->name('new.members');
    Route::get('/specialrequest',[Zonal_coordinatorController::class, 'SpecialRequest'])->name('specials.request');
    Route::post('/specialRequest/{id}',[Zonal_coordinatorController::class, 'SpecialRequestApprove'])->name('approve.request');
    Route::post('/specialRequests/{id}',[Zonal_coordinatorController::class, 'SpecialRequestReject'])->name('reject.request');
    Route::get('/housereport',[Zonal_coordinatorController::class, 'HouseReport'])->name('house.reports');
    Route::get('/attendancereport/{id}',[Zonal_coordinatorController::class, 'HouseDetails'])->name('attendance.report');
    Route::get('/specialrequestdetails/{id}',[Zonal_coordinatorController::class, 'Special_Request'])->name('request.special');
    Route::get('/attendancestats',[Zonal_coordinatorController::class, 'AttendanceStat'])->name('attendance.stats');
    Route::get('/export-attendance',[Zonal_coordinatorController::class,'ExportAttendance'])->name('export.attendance');


    

});

// End Zonal_coordinator Route

// Team_lead Route

Route::prefix('team_lead')->group(function (){
    Route::get('/login',[Team_leadController::class, 'Team_leadIndex'])->name('team_lead_login_from');
    Route::get('/dashboard',[Team_leadController::class, 'Team_leadDashboard'])->name('team_lead.dashboard')->middleware('team_lead');

    Route::post('/login/owner',[Team_leadController::class, 'Team_leadLogin'])->name('team_lead.login');

    Route::get('/logout',[Team_leadController::class, 'Team_leadLogout'])->name('team_lead.logout')->middleware('team_lead');
    
    Route::get('/newMembers',[Team_leadController::class, 'NewMembers'])->name('new.members');
    Route::get('/specialRequest',[Team_leadController::class, 'SpecialRequests'])->name('special.requests');
    Route::get('/center',[Team_leadController::class, 'HouseReport'])->name('houses.report');
    Route::get('/zoneReport',[Team_leadController::class, 'ZonalCoordinatorReport'])->name('zone.report');
    Route::get('/zoneReports/{id}',[Team_leadController::class, 'ZonalCoordinatorsReport'])->name('report.view');
    Route::get('/center/{id}',[Team_leadController::class, 'HousesReport'])->name('house.view');
    Route::get('/newjoin/{id}',[Team_leadController::class, 'NewJoiner'])->name('joiner.view');
    

});
//Special request route
Route::get('/special/request',[SpecialRequestController::class,'create']);
Route::post('/specialrequest',[SpecialRequestController::class,'store'])->name('createRequest');
Route::get('/specialrequest/{id}',[SpecialRequestController::class,'show'])->name('special.request');
// End Team_lead Route

// Core_leaders Route

Route::prefix('core_leaders')->group(function (){
    Route::get('/login',[Core_leadersController::class, 'Core_leadersIndex'])->name('core_leaders_login_from');
    Route::get('/dashboard',[Core_leadersController::class, 'Core_leadersDashboard'])->name('core_leaders.dashboard')->middleware('core_leaders');

    Route::post('/login/owner',[Core_leadersController::class, 'Core_leadersLogin'])->name('core_leaders.login');

    Route::get('/logout',[Core_leadersController::class, 'Core_leadersLogout'])->name('core_leaders.logout')->middleware('core_leaders');
    

    Route::get('/change/password',[Core_leadersController::class, 'Core_leadersChangePassword'])->name('core_leaders.change.password');
    Route::post('/update/change/password',[Core_leadersController::class, 'Core_leadersUpdateChangePassword'])->name('update.change.password');
    Route::get('/cih_pastors',[Core_leadersController::class, 'CihPastor'])->name('core_leaders.cih');
    Route::get('/inspectorates',[Core_leadersController::class, 'InspectorateStat'])->name('core_leaders.inspectorates');
    Route::get('/administratives',[Core_leadersController::class, 'Administrative'])->name('core_leaders.admininstrative');
    Route::get('/celebrations',[Core_leadersController::class, 'Celebration'])->name('core_leaders.celebrations');
    Route::get('/attendance/{id}',[Core_leadersController::class, 'Attendance'])->name('core_leaders.attendance');


});

// End Core_leaders Route

Route::get('/add-post',[PostController::class,'addPost']);
Route::get('/add-comment/{id}',[PostController::class,'addComment']);
Route::get('/get-comments/{id}',[PostController::class,'getCommentsByPost']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// User
// Route::get('/file-import',[UserController::class,'importView'])->name('import-view');
// Route::post('/import',[UserController::class,'import'])->name('import');
// Route::get('/export-users',[UserController::class,'exportUsers'])->name('export-users');

require __DIR__.'/auth.php';
