<?php

namespace App\Http\Controllers\member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;
class MemberController extends Controller
{


    protected function step01()
    {
        return view('member.regiStep1');
    }

    protected function step01Confirm(Request $request)
    {
        if ($request->input('check1') == 'on' and $request->input('check2') == 'on'){
          // 약관동의 여부 저장
          session(['agree' => 'Y']);
          return redirect('member/step02');
        }else {
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
        session(['key' => 123456 ]);

        // 인증번호받기
        if ($request->chk == 'send'){
            if ($request->data['phone'] == '') {
                $msg = '핸드폰번호를 채워주세요';
                return response()->json(['status'=>500, 'msg'=>$msg]);
            } else {
                $key = $request->session()->get('key');
                return response()->json(['status'=>200, 'msg'=>$key]);
            }
        } else { // 인증
            session(['phone' => $request->data['phone'] ]);
            if ($request->data['phone'] == ''){
                $msg = '핸드폰번호를 채워주세요';
                return response()->json(['status'=>500, 'msg'=>$msg]);
            }
            if ($request->data['code'] != session('key')) {
                $msg = '인증번호를 확인해주세요';
                return response()->json(['status'=>500, 'msg' => $msg]);
            } else {
                $redirect = '/member/step03';
                // 인증키 제거
                $request -> session() -> forget('key');
                return response()->json(['status'=>200, 'msg'=>$redirect]);

            }

        }

    }

    protected function step03(Request $request)
    {
        $phone = $request -> session()->get('phone');
        $phoneArray = explode('-', $phone);
        return view('member.regiStep3',['phone' => $phoneArray] );
    }

    protected function register(Request $request) {
        switch($request->mode) {
            case 'overChk':
                if ($request->input('id') == '') {
                    return response()->json(['status'=>500, 'msg'=> '아이디가 입력되지 않았습니다.']);
                } else {
                    $user = DB::select('select id from users where id = ?', [$request->input('id')]);
                    $array = json_decode(json_encode($user), True);
                    if (count($array) >= 0){
                        return response()->json(['status'=>200, 'msg'=>'사용가능한 아이디 입니다.']);
                    }
                }

        }

    }

    protected function step04()
    {
        return view('member.regiStep4');
    }


}
