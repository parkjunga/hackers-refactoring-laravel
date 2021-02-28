@extends('layouts.master')
@section('content')
    <div id="content" class="content">
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
                        <input type="radio" name="radio" checked="checked"/>
                        <span class="input-txt"></span>
                    </label>
                </dd>
            </dl>

            <dl class="find-box">
                <dt>이메일 인증</dt>
                <dd>
                    고객님이 회원 가입 시 등록한 이메일 주소와 입력하신 이메일 주소가 동일해야 합니다.
                    <label class="input-sp big">
                        <input type="radio" name="radio"/>
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
                        <td><input type="text" class="input-text" style="width:302px" /></td>
                    </tr>
                    <tr>
                        <th scope="col">생년월일</th>
                        <td>
                            <select class="input-sel" style="width:148px">
                                <option value="">선택</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                            </select>
                            년
                            <select class="input-sel" style="width:147px">
                                <option value="">선택</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                            </select>
                            월
                            <select class="input-sel" style="width:147px">
                                <option value="">선택</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                            </select>
                            일
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">이메일주소</th>
                        <td>
                            <input type="text" class="input-text" style="width:138px"/> @ <input type="text" class="input-text" style="width:138px"/>
                            <select class="input-sel" style="width:160px">
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                                <option value="">선택입력</option>
                            </select>
                            <a href="#" class="btn-s-tin ml10">인증번호 받기</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">인증번호</th>
                        <td><input type="text" class="input-text" style="width:478px" /><a href="#" class="btn-s-tin ml10">인증번호 확인</a></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
