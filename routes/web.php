<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailSendController;
use App\Http\Controllers\member\MemberController;
use App\Http\Controllers\lecture\LectureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can member web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



# 라라벨 프로젝트 생성 시 처음엔 loginController 와 RegisterController는 이미 생성되어 있음
# 다만 라우터 등록되어있지 않아 404 반환, 따라서 필요서 Auth::routes()를 추가해줘야됨
# 추가하면 이미 생성되어 있는 loginController, RegisterController등을 각각 /login, /register등으로
# 연결을 시켜준다.
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resource('member', MemberController::class);
Route::resource('lecture', LectureController::class)->middleware('lv2');
Route::get('/member/step01', [MemberController::class, 'step01'])->name('step01');
Route::post('/member/step01',[MemberController::class, 'step01Confirm']);
Route::get('/member/step02', [MemberController::class, 'step02']);
Route::post('/member/step02',[MemberController::class, 'step02Confirm']);
Route::get('/member/step03', [MemberController::class,'step03']);
Route::get('/member/step04',[MemberController::class,'step04']);
Route::post('/member/register',[MemberController::class,'register']);
Route::get('/login',[MemberController::class,'login'])->name('login');
Route::post('/login',[MemberController::class,'loginConfirm']);
Route::post('/logout',[MemberController::class,'logout'])->name('logout');
Route::get('/member/userInfo/{id}',[MemberController::class,'userInfo'])->name('userInfo')->middleware('auth');
Route::patch('/member/modify/{id}',[MemberController::class,'modify'])->name('modify')->middleware('auth');
Route::get('/find', [MemberController::class, 'find'])->name('find');
Route::post('/findConfirm',[MemberController::class,'findConfirm'])->name('findConfirm');
Route::get('/findEnd',[MemberController::class,'findEnd'])->name('findEnd');
// 메일전송
Route::post('/mailSendSubmit', [MailSendController::class, 'mailSendSubmit'])->name('mailSendSubmit');

