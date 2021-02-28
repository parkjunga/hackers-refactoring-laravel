@extends('layouts.master')
@section('content')
    <div id="content" class="content">
        <div class="inner">
            <div class="tit-box-h3">
                <h3 class="tit-h3">회원가입</h3>
                <div class="sub-depth">
                    <span><i class="icon-home"><span>홈</span></i></span>
                    <strong>회원가입</strong>
                </div>
            </div>

            <div class="join-step-bar">
                <ul>
                    <li><i class="icon-join-agree"></i> 약관동의</li>
                    <li><i class="icon-join-chk"></i> 본인확인</li>
                    <li class="last on"><i class="icon-join-inp"></i> 정보입력</li>
                </ul>
            </div>

            <div class="section-content">
                <form name="registerForm" action="/member/register" method="post" onsubmit="return validate();">
                @csrf
                <table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
                    <caption class="hidden">강의정보</caption>
                    <colgroup>
                        <col style="width:15%"/>
                        <col style="*"/>
                    </colgroup>

                    <tbody>
                    <tr>
                        <th scope="col"><span class="icons">*</span>이름</th>
                        <td><input name="name" type="text" class="input-text" style="width:302px"/></td>
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>아이디</th>
                        <td><input name="userId" type="text" class="input-text" style="width:302px" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자"/>
{{--                            <a href="#" class="btn-s-tin ml10">중복확인</a>--}}
                            <input id="overChk" type="button"  class="btn-s-tin ml10" value="중복확인" style="cursor:pointer;">
                        </td>
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
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>휴대폰 번호</th>
                        <td>
                            <input name="phone[]" type="text" class="input-text" style="width:50px" value="{{ $phone[0] }}" readonly/> -
                            <input name="phone[]" type="text" class="input-text" style="width:50px" value="{{ $phone[1] }}" readonly/> -
                            <input name="phone[]" type="text" class="input-text" style="width:50px" value="{{ $phone[2] }}" readonly/>
                            <input type="hidden" name="phone" >
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
                        <th scope="col"><span class="icons"></span>일반전화 번호</th>
                        <td>
                            <input name="telephone[]" type="text" class="input-text" style="width:88px"/> -
                            <input name="telephone[]" type="text" class="input-text" style="width:88px"/> -
                            <input name="telephone[]" type="text" class="input-text" style="width:88px"/></td>
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>주소</th>
                        <td>
                            <p >
                                <label>우편번호 <input name="postAddress" type="text" class="input-text ml5" style="width:242px"  /></label>
                                <a id="findAddress" href="#" class="btn-s-tin ml10">주소찾기</a>
                            </p>
                            <p class="mt10">
                                <label>기본주소 <input name="basicAddress" type="text" class="input-text ml5" style="width:719px"/></label>
                            </p>
                            <p class="mt10">
                                <label>상세주소 <input name="detailAddress" type="text" class="input-text ml5" style="width:719px"/></label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col"><span class="icons">*</span>SMS수신</th>
                        <td>
                            <div class="box-input">
                                <label class="input-sp">
                                    <input name="receiveSms" type="radio"  value="Y" checked="checked"/>
                                    <span class="input-txt">수신함</span>
                                </label>
                                <label class="input-sp">
                                    <input name="receiveSms" type="radio"  value="N" />
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
                                    <input name="receiveEmail" type="radio" value="Y"  checked="checked"/>
                                    <span class="input-txt">수신함</span>
                                </label>
                                <label class="input-sp">
                                    <input name="receiveEmail" type="radio" value="N" />
                                    <span class="input-txt">미수신</span>
                                </label>
                            </div>
                            <p>메일수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="box-btn">
                    <input id="registerBtn" type="submit" value="회원가입" class="btn-1" style="cursor:pointer;" />
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
  const overChk = document.getElementById('overChk');
  const findAddress = document.getElementById('findAddress');
  const emailSelect = document.getElementsByName('emailSelect')[0];
  let findIdState = false;

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
      const getName= RegExp(/^[가-힣]+$/);
      const form = document.forms['registerForm'];

      document.getElementsByName('phone')[0].value = document.getElementsByName('phone[]')[0].value +
              document.getElementsByName('phone[]')[1].value +
               document.getElementsByName('phone[]')[2].value;
      document.getElementsByName('phone')[0].value = Number(document.getElementsByName('phone')[0].value);

      document.getElementsByName('email')[0].value =
      document.getElementsByName('emailS')[0].value + '@' + document.getElementsByName('emailE')[0].value;

      if (!getName.test(form['name'].value)) {
          alert("이름을 확인해주세요");
          form['name'].value = '';
          return false;
      }

      if(form['userId'].value === ""){
          alert("아이디를 확인해주세요.");
          return false;
      }

      if (!findIdState) {
          alert('아이디 중복체크를 해주세요!');
          return false;
      }

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

  // 회원가입
  function register(mode,data){

      $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {'mode': mode, 'id': data },
          type:'POST',
          url: '/member/register',
          success: function (res) {
              if (res['status']){
                  alert(res['msg']);
                  findIdState = false;
              }
              findIdState = true;

          },
          error: function (err){
              //console.log(err['responseJSON']);
              alert(err['responseJSON']['message']);
          }
      });




  }

  overChk.addEventListener('click',function(e){
      //console.log(e.target.id);
      if (e.target.id == 'overChk') {
          const id = document.getElementsByName('userId')[0].value;
          register(e.target.id, id);
      }
  });



</script>
@endsection
