@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('member') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">핸드폰번호</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post" class="col-md-4 col-form-label text-md-right">우편번호 </label>
                            <div class="col-md-6">
                                <input id="text" type="post" class="form-control @error('email') is-invalid @enderror" name="post" value="{{ old('post') }}" readonly>
                                <input type="button" value="주소찾기" onclick="Post()" class="btn-s-tin ml10"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="addr" class="col-md-4 col-form-label text-md-right">기본주소 </label>
                            <div class="col-md-6">
                                <input id="text" type="addr" class="form-control @error('addr') is-invalid @enderror" name="addr" value="{{ old('addr') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detail_addr" class="col-md-4 col-form-label text-md-right">상세주소 </label>
                            <div class="col-md-6">
                                <input id="text" type="detail_addr" class="form-control @error('detail_addr') is-invalid @enderror" name="detail_addr" value="{{ old('detail_addr') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detail_addr" class="col-md-4 col-form-label text-md-right">광고성 이메일 수신여부 </label>
                            <div class="col-md-6">
                                <input type="radio" name="receive_email" value='Y'> 동의
                                <input type="radio" name="receive_email" value='N'> 비동의
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="detail_addr" class="col-md-4 col-form-label text-md-right">광고성 문자 수신여부 </label>
                            <div class="col-md-6">
                                <input type="radio" name="receive_sms" value='Y'> 동의
                                <input type="radio" name="receive_sms" value='N'> 비동의
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>


 function Post(){
    new daum.Postcode({
        oncomplete: function(data) {
            document.getElementsByName('post')[0].value = data.zonecode;
            document.getElementsByName('addr')[0].value = data.address;
            document.getElementsByName('detail_addr')[0].value = data.buildingName;
        }
    }).open();
 }
</script>
@endsection
