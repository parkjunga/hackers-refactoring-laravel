<?php

namespace App\Http\Controllers\member;

use App\Http\Controllers\Controller;
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
            return redirect('member.step02');
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
                'address' => $request->basicAddress,
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

    public function userInfo(Request $request)
    {
        return view('member.userInfo');
    }

}
