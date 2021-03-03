<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Session;

class MailSendController extends Controller
{
    public function mailSendSubmit(Request $request)
    {
        // 받는 사람 정보 선언
        $user = array(
            'email' => $request->email,
            'name' => $request->name
        );

        // 메일에서 보여질 내용 선언
        $data = array(
            'name' => $request->name,
            'emailAddr' => $request->email,
            'random' => '123456',
        );
        // 인증코드
        session(['code' => $data['random']]);
        // 첫번째인수: view페이지 경로(view/email/welcome.blade.php, 두번째: 뷰에 전달될 데이터, 세번째는 다양한 데이터를 전달을위한 옵션
        // to 받는사람 정보, subject는 제목, from 보내는사람 정보
        Mail::send('email.welcome', $data,
            function($message) use ($user){
                $message->to('', $user['name'])->subject('인증번호를 전달드립니다');
                $message->from('', '');
        });
        return $request;
    }
}
