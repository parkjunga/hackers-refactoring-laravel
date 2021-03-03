@extends('layouts.master')
@section('content')
    <div id="content" class="content">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="inner">
            <div class="tit-box-h3">
                <h3 class="tit-h3">아이디/비밀번호 찾기</h3>
                <div class="sub-depth">
                    <span><i class="icon-home"><span>홈</span></i></span>
                    <strong>아이디/비밀번호 찾기</strong>
                </div>
            </div>

            <ul class="tab-list">
                <li class="on"><a href="#">아이디 찾기</a></li>
                <li><a href="#">비밀번호 찾기</a></li>
            </ul>

            <div class="tit-box-h4">
                <h3 class="tit-h4">아이디 찾기 방법 선택</h3>
            </div>

            <dl class="find-box">
                <dt>휴대폰 인증</dt>
                <dd>
                    고객님이 회원 가입 시 등록한 휴대폰 번호와 입력하신 휴대폰 번호가 동일해야 합니다.
                    <label class="input-sp big">
                        <input type="radio" name="phone_auth" checked="checked"/>
                        <span class="input-txt"></span>
                    </label>
                </dd>
            </dl>

            <dl class="find-box">
                <dt>이메일 인증</dt>
                <dd>
                    고객님이 회원 가입 시 등록한 이메일 주소와 입력하신 이메일 주소가 동일해야 합니다.
                    <label class="input-sp big">
                        <input type="radio" name="email_auth" />
                        <span class="input-txt"></span>
                    </label>
                </dd>
            </dl>

            <div class="section-content mt30">
                <table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
                    <caption class="hidden">아이디 찾기 개인정보 입력</caption>
                    <colgroup>
                        <col style="width:15%"/>
                        <col style="*"/>
                    </colgroup>

                    <tbody>
                    <tr>
                        <th scope="col">성명</th>
                        <td><input type="text" name="name" class="input-text" style="width:302px" /></td>
                    </tr>
                    <tr>
                        <th scope="col">이메일주소</th>
                        <td>
                            <input name="emailS" type="text" class="input-text" style="width:138px"/> @
                            <input id="emailE" name="emailE" type="text" class="input-text" style="width:138px"/>
                            <select name="emailSelect" class="input-sel" style="width:160px" >
                                <option value="">선택하세요</option>
                                <option value="hanmail.net">hanmail.net</option>
                                <option value="naver.com">naver.com</option>
                                <option value="gmail.com">gmail.com</option>
                                <option value="user">직접입력</option>
                            </select>
                            <input type="hidden" name="email" />
                            <button id="findEmail" type="button" class="btn-s-tin ml10">인증번호 받기</button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">인증번호</th>
                        <td><input type="text" name="code" class="input-text" style="width:478px" />
                            <button id="findConfirm" type="button" class="btn-s-tin ml10">인증번호 확인</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="/js/common.js" ></script>
    <script>

    const findEmailBtn = document.getElementById('findEmail');
    const findConfirm = document.getElementById('findConfirm');
    function find(){

        document.getElementsByName('email')[0].value =
            document.getElementsByName('emailS')[0].value + '@' + document.getElementsByName('emailE')[0].value;

        if (document.getElementsByName('emailS')[0].value == '' || document.getElementsByName('emailE')[0].value == ''){
            alert('이메일 주소는 필수입니다!!');
            return false;
        }

        if (document.getElementsByName('name')[0].value == ''){
            alert('성명을 입력해주세요!');
            return false;
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            data: { 'email': document.getElementsByName('email')[0].value,
                    'name' : document.getElementsByName('name')[0].value
                  },
            url: 'mailSendSubmit',
            success: function (res) {
            },
            error: function (err){
                alert('error를 확인해주세요 !' + err);
            }
        })
    }

    findEmailBtn.addEventListener('click',find);

    function completed(){

        if (document.getElementsByName('code')[0].value == ''){
            alert('인증번호를 입력해주세요');
            return false;
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            data: { 'code': document.getElementsByName('code')[0].value,
                    'name': document.getElementsByName('name')[0].value,
                    'email': document.getElementsByName('email')[0].value
            },
            url: 'findConfirm',
            success: function (res) {
                if (res['status'] == '200') {
                    window.location.href = res['redirect'];
                } else {
                    alert(res['msg']);
                }
            },
            error: function (err){
                alert('error를 확인해주세요 !' + err);
            }
        })
    }
    findConfirm.addEventListener('click',completed);

    </script>
@endsection
