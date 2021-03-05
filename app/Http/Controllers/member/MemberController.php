<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
use App\Models\tb_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class MemberController extends Controller
{


    protected function step01()
    {
        return view('member.regiStep1');
    }

    protected function step01Confirm(Request $request)
    {
        if ($request->input('check1') == 'on' and $request->input('check2') == 'on') {
            // 약관동의 여부 저장
            session(['agree' => 'Y']);
            return redirect('member/step02');
        } else {
            return back()->with('msg', '약관 동의는 반드시 필요합니다.');
        }
    }

    protected function step02()
    {
        return view('member.regiStep2');
    }

    protected function step02Confirm(Request $request)
    {
        // 인증코드
        session(['key' => 123456]);

        // 인증번호받기
        if ($request->chk == 'send') {
            if ($request->data['phone'] == '') {
                $msg = '핸드폰번호를 채워주세요';
                return response()->json(['status' => 500, 'msg' => $msg]);
            } else {
                $key = $request->session()->get('key');
                return response()->json(['status' => 200, 'msg' => $key]);
            }
        } else { // 인증
            session(['phone' => $request->data['phone']]);
            if ($request->data['phone'] == '') {
                $msg = '핸드폰번호를 채워주세요';
                return response()->json(['status' => 500, 'msg' => $msg]);
            }
            if ($request->data['code'] != session('key')) {
                $msg = '인증번호를 확인해주세요';
                return response()->json(['status' => 500, 'msg' => $msg]);
            } else {
                $redirect = '/member/step03';
                // 인증키 제거
                $request->session()->forget('key');
                return response()->json(['status' => 200, 'msg' => $redirect]);

            }

        }

    }

    protected function step03(Request $request)
    {
        $phone = $request->session()->get('phone');
        $phoneArray = explode('-', $phone);
        return view('member.regiStep3', ['phone' => $phoneArray]);
    }

    protected function register(Request $request)
    {
        if ($request->mode == 'overChk') {
            if ($request->input('id') == '') {
                return response()->json(['status' => 500, 'msg' => '아이디가 입력되지 않았습니다.']);
            } else {
                $user = DB::select('select id from users where id = ?', [$request->input('id')]);
                $array = json_decode(json_encode($user), True);
                if (count($array) >= 0) {
                    return response()->json(['status' => 200, 'msg' => '사용가능한 아이디 입니다.']);
                }
            }
        } else {
            // validate
            $data = $request->validate([
                'userId' => 'bail|required|string|max:120',
                'name' => 'string|max:120',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'bail|required|min:6|regex:/^.*(?=.{1,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x@]).*$/|same:passwordConfirm',
                'phone' => 'required|integer',
            ]);

            User::create([
                'userId' => $data['userId'],
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'addr' => $request->basicAddress,
                'detail_addr' => $request->detailAddress,
                'post' => $request->postAddress,
                'phone' => $data['phone'],
                'receive_email' => $request->receiveEmail,
                'receive_sms' => $request->receiveSms,
            ]);

            return redirect('member/step04');

        }

    }

    protected function step04()
    {
        return view('member.regiStep4');
    }


    protected function login()
    {
        return view('member.login');
    }

    protected function loginConfirm(Request $request)
    {

        if (Auth::attempt(['userId' => $request->userId, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
            return abort(401);
        }
    }

    protected function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function userInfo(Request $request,$id)
    {
        // 데이터 활용을 위해
        $Auth = json_encode(Auth::user(), JSON_UNESCAPED_UNICODE);
        $Auth = json_decode($Auth,true);
        $email = explode('@',$Auth['email']);
        return view('member.userInfo',['user'=>$Auth, 'email'=>$email]);
    }

    public function modify(Request $request, User $user,$id)
    {

        if (Hash::check($request->post('password'),Auth::user()->getAuthPassword())){

            // validate
            if (Auth::user()->email != $request->post('email')){
                $data = $request->validate([
                    'email' => 'required|email|max:255|unique:users',
                ]);
            } else {
                $data['email'] = $request->post('email');
            }

            DB::table('users')
                ->where('id',$id)
                ->update(['email' => $data['email'],
                          'addr' => $request->post('basicAddress'),
                          'detail_addr' => $request->post('detailAddress'),
                          'post' => $request->post('postAddress'),
                          'receive_email'=> $request->post('receive_email'),
                         'receive_sms' =>$request->post('receive_sms')]);

            return redirect('/');
        } else{
            return abort(401);
        }

    }

    public function find()
    {
        return view('member.find');
    }

    public function findEnd(Request $request)
    {
        $userId = $request->session()->get('userId');
        $name = $request->session()->get('name');
        return view('member.findEnd',['userId' => $userId, 'name' => $name ] );
    }

    public function findConfirm(Request $request)
    {
        if ($request->post('code') == $request->session()->get('code') ){
            // 인증키 제거
            $request->session()->forget('code');
            $user = DB::select('select userId,name from users where email = ? AND name=?',
                [$request->input('email'),$request->input('name')]);
            session(['userId' => $user[0]->userId]);
            session(['name' => $user[0]->name]);

            return response()->json(['status' => 200, 'redirect' => 'findEnd']);
        } else{
            return response()->json(['status' => 500, 'msg' => '인증키가 다릅니다.']);
        }
    }
}
