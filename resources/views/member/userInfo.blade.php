@extends('layouts.master')
@section('content')

    <div id="content" class="content">
        <div class="inner">
            <div class="tit-box-h3">
                <h3 class="tit-h3">내정보수정</h3>
                <div class="sub-depth">
                    <span><i class="icon-home"><span>홈</span></i></span>
                    <strong>내정보수정</strong>
                </div>
            </div>

            <div class="section-content">
                <form name="modifyForm" action="{{ route('modify', ['id'=> $user['id']]) }}" method="post" onsubmit="return validate();">
                    @csrf
                    @method('patch')
                <table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
                    <caption class="hidden">강의정보</caption>
                    <colgroup>
                        <col style="width:15%"/>
                        <col style="*"/>
                    </colgroup>

                    <tbody>
                    <tr>
                        <th scope="col"><span class="icons">*</span>이름</th>
                        <td>{{ $user['name'] }}
                            <input type="hidden" name="name" value="{{ $user['name']}}"/>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>아이디</th>
                        <td>{{ $user['userId']}}
                            <input type="hidden" name="userId" value="{{ $user['userId']}}">
                        </td>
                    </tr>
                    <tr>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>비밀번호</th>
                        <td><input name="password" type="password" class="input-text" style="width:302px" placeholder="8-15자의 특수문자/영문자/숫자 혼합"/></td>
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>비밀번호 확인</th>
                        <td><input name="passwordConfirm" type="password" class="input-text" style="width:302px"/></td>
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>이메일주소</th>
                        <td>
                            <input name="emailS" type="text" value="{{ $email[0] }}"class="input-text" style="width:138px"/> @
                            <input id="emailE" name="emailE" value="{{ $email[1] }}" type="text" class="input-text" style="width:138px"/>
                            <select name="emailSelect" class="input-sel" style="width:160px" >
                                <option value="">선택하세요</option>
                                <option value="hanmail.net">hanmail.net</option>
                                <option value="naver.com">naver.com</option>
                                <option value="gmail.com">gmail.com</option>
                                <option value="user">직접입력</option>
                            </select>
                            <input type="hidden" name="email" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>휴대폰 번호</th>
                        <td>{{ $user['phone'] }}</td>
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>주소</th>
                        <td>
                            <p >
                                <label>우편번호 <input type="text" name="postAddress" class="input-text ml5" style="width:242px" value="{{ $user['post'] }}" /></label>
                                <a id="findAddress" href="#" class="btn-s-tin ml10">주소찾기</a>
                            </p>
                            <p class="mt10">
                                <label>기본주소 <input type="text" name="basicAddress" class="input-text ml5" style="width:719px" value="{{ $user['addr'] }}"/></label>
                            </p>
                            <p class="mt10">
                                <label>상세주소 <input type="text"  name="detailAddress" class="input-text ml5" style="width:719px" value="{{ $user['detail_addr'] }}"/></label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>SMS수신 {{ $user['receive_sms'] }}</th>
                        <td>
                            <div class="box-input">
                                <label class="input-sp">
                                    <input type="radio" name="receive_sms" id=""  value="Y" @if($user['receive_sms'] =='Y') checked="checked" @endif />
                                    <span class="input-txt" >수신함</span>
                                </label>
                                <label class="input-sp">
                                    <input type="radio" name="receive_sms" id="" value="N" @if($user['receive_sms'] =='N') checked="checked" @endif />
                                    <span class="input-txt">미수신</span>
                                </label>
                            </div>
                            <p>SMS수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>메일수신</th>
                        <td>
                            <div class="box-input">
                                <label class="input-sp">
                                    <input type="radio" name="receive_email" id=""  value="Y" @if($user['receive_email'] =='Y') checked="checked" @endif />
                                    <span class="input-txt">수신함</span>
                                </label>
                                <label class="input-sp">
                                    <input type="radio" name="receive_email" id="" value="N" @if($user['receive_email'] =='N') checked="checked" @endif />
                                    <span class="input-txt">미수신</span>
                                </label>
                            </div>
                            <p>메일수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
                        </td>
                    </tr>
                    </tbody>
                </table>

                    <div class="box-btn">
                        <input id="modifyBtn" type="submit" value="정보수정" class="btn-1" style="cursor:pointer;" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    const findAddress = document.getElementById('findAddress');
    const modifyBtn = document.getElementById('modifyBtn');
    const emailSelect = document.getElementsByName('emailSelect')[0];
    // 우편번호
    function findAddr() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 주소
                document.getElementsByName('basicAddress')[0].value = data['address'];
                document.getElementsByName('postAddress')[0].value = data['zonecode'];
            }
        }).open();
    }

    findAddress.addEventListener('click', findAddr);

    // 메일

    emailSelect.addEventListener('change', function (e){
        let value = e.target.value;
        if (e.target.value == 'user') {
            value = '';
        }
        document.getElementsByName('emailE')[0].value = value;
    })



    // 유효성체크
    function validate(){

        const getMail = RegExp(/^[A-Za-z0-9_\.\-]/);
        const getCheck= RegExp(/^(?=.*[a-zA-z])(?=.*[0-9])(?=.*[$`~!@$!%*#^?&\\(\\)\-_=+]).{8,15}$/);
        const form = document.forms['modifyForm'];

        document.getElementsByName('email')[0].value =
            document.getElementsByName('emailS')[0].value + '@' + document.getElementsByName('emailE')[0].value;

        // 비밀번호 체크
        if(!getCheck.test(form['password'].value)) {
            alert("비밀번호형식 맞춰서 PW를 입력해주세요");
            form['password'].value = '';
            return false;
        }

        if(form['password'].value != form['passwordConfirm'].value){
            alert("비밀번호가 일치 하지 않습니다.");
            return false;
        }

        if(!getMail.test(form['emailE'].value)){
            alert("이메일형식에 맞게 입력해주세요");
            form['emailE'].value = '';
            return false;
        }

        if(form['postAddress'].value == "" ){
            alert("우편번호를 확인해주세요.");
            return false;
        }
        if(form['detailAddress'].value == ""){
            alert("상세주소를 입력해주세요.");
            return false;
        }




    }

</script>
@endsection
