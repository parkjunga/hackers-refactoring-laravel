@extends('layouts.master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="content" class="content">
        <div class="inner">
            <div class="tit-box-h3">
                <h3 class="tit-h3">회원가입</h3>
                <div class="sub-depth">
                    <span><i class="icon-home"><span>홈</span></i></span>
                    <strong>회원가입 완료</strong>
                </div>
            </div>

            <div class="join-step-bar">
                <ul>
                    <li><i class="icon-join-agree"></i> 약관동의</li>
                    <li class="on"><i class="icon-join-chk"></i> 본인확인</li>
                    <li class="last"><i class="icon-join-inp"></i> 정보입력</li>
                </ul>
            </div>

            <div class="tit-box-h4">
                <h3 class="tit-h4">본인인증</h3>
            </div>

            <div class="section-content after">
                <div class="identify-box" style="width:100%;height:190px;">
                    <div class="identify-inner">
                        <strong>휴대폰 인증</strong>
                        <p>주민번호 없이 메시지 수신가능한 휴대폰으로 1개 아이디만 회원가입이 가능합니다. </p>

                        <br />
                        <input type="text" name="phone[]" class="input-text" style="width:50px"/> -
                        <input type="text" name="phone[]" class="input-text" style="width:50px"/> -
                        <input type="text" name="phone[]" class="input-text" style="width:50px"/>
                        <input type="button" id="sendCode" value="인증번호받기" class="btn-s-line" style="cursor:pointer;">

                        <br /><br />
                       <!--<a href="#" class="btn-s-line">인증번호 받기</a>-->
                        <input type="text" name="code" class="input-text" style="width:200px;"/>
                        <input type="button" id="confirmCode" value="인증번호 확인" class="btn-s-line" style="cursor:pointer;">
                        <i class="graphic-phon"><span>휴대폰 인증</span></i>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        const phone = document.getElementsByName('phone[]');
        function ajax(mode,data){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {"chk": mode, data},
                type:'POST',
                url: '/member/step02',
                success: function (res) {
                    if (mode == 'send') {
                        if (res['status'] == 200) {
                            alert('인증번호는'+res['msg']+'입니다.');
                        } else {
                            alert(res['msg']);
                        }
                    } else {
                        if (res['status']  == 200) {
                            window.location.href = res['msg'];
                        } else {
                            alert(res['msg']);
                            document.getElementsByName('code')[0].value = '';
                        }
                    }
                },
                error: function (err){
                    alert('error를 확인해주세요 !' + err);
                }
            })
        }

        function agreePhone(){

            const chk1 = RegExp(/^01([0|1|6|7|8|9]?)$/);
            const chk2 = RegExp( /^([0-9]{3,4}?)$/);
            const chk3 = RegExp( /^([0-9]{4}?)$/);


            if(phone[0].value == '' || phone[1].value == '' || phone[2].value == ''){
                alert("핸드폰 번호를 확인해주세요");
                return false;
            }
            if (!chk1.test(phone[0].value) || !chk2.test(phone[1].value) || !chk3.test(phone[2].value) ) {
                alert("숫자만 입력이 가능합니다.");
                return false;
            }

            let data = { phone : phone[0].value + "-" + phone[1].value + "-" + phone[2].value };
            ajax('send',data);
            // $.ajax({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     data: {"chk": 'send',"phone": phone[0].value + phone[1].value + phone[2].value},
            //     type:'POST',
            //     url: '/member/step02',
            //     success: function (res) {
            //         if (res['status'] == 200) {
            //             alert('인증번호는'+res['msg']+'입니다.');
            //         } else {
            //             alert(res['msg']);
            //         }
            //     },
            //     error: function (err){
            //         alert('error를 확인해주세요 !' + err);
            //     }
            // })
        }
        const sendCode = document.getElementById('sendCode');
        sendCode.addEventListener('click', agreePhone);

        function confirm(){
            let code = document.getElementsByName('code')[0].value;
            if (code == '') {
                alert('인증번호를 입력하세요.');
                return false;
            }

            let data = { code : code, phone : phone[0].value + "-" + phone[1].value + "-" + phone[2].value  };
            ajax('confirm',data);
            // $.ajax({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     data: {"chk": 'confirm',"code": code},
            //     type:'POST',
            //     url: '/member/step02',
            //     success: function (res) {
            //         if (res['status'] == 500) {
            //             alert(res['msg']);
            //             document.getElementsByName('code')[0].value = '';
            //         } else {
            //             window.location.href = res['msg'];
            //         }
            //     },
            //     error: function (err){
            //         alert('error를 확인해주세요 !'+ err);
            //     }
            // })
        }

        const confirmCode = document.getElementById('confirmCode');
        confirmCode.addEventListener('click',confirm);
    </script>
@endsection
