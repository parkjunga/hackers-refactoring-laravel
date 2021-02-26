<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE8" />
        <title>해커스 HRD</title>
        <meta name="description" content="해커스 HRD" />
        <meta name="keywords" content="해커스, HRD" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- 파비콘설정 -->
        <link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico" />

        <!-- xhtml property속성 벨리데이션 오류/확인필요 -->
        <meta property="og:title" content="해커스 HRD" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://www.hackershrd.com/" />
        <meta property="og:image" content="http://img.hackershrd.com/common/og_logo.png" />

        <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/common.css" />
        <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/bxslider.css" />
        <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/main.css" /><!-- main페이지에만 호출 -->
        <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/sub.css" /><!-- sub페이지에만 호출 -->
        <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/login.css" /><!-- login페이지에만 호출 -->

        <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
        <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html{line-height:1.15;-webkit-text-size-adjust:100%}
            body{margin:0}a{background-color:transparent}[hidden]{display:none}
            html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
            .hidden{
                left:1000px;
                width:200px;
                height:10px;

            }

        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">

<!-- skip nav -->
<div id="skip-nav">
<a href="#content">본문 바로가기</a>
</div>
<!-- //skip nav -->

<div id="wrap">
	<div id="header" class="header">

		<div class="nav-section">
			<div class="inner p-r">
				<h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="해커스 HRD LOGO" width="165" height="37"/></a></h1>
				<div class="nav-box">
					<h2 class="hidden">주메뉴 시작</h2>

					<ul class="nav-main-lst">
						<li class="mnu">
							<a href="#">일반직무</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu2">
							<a href="#">산업직무</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu3">
							<a href="#">공통역량</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu4">
							<a href="#">어학 및 자격증</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu5">
							<a href="#">직무교육 안내</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
						<li class="mnu6">
							<a href="#">내 강의실</a>
							<ul class="nav-sub-lst">
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
								<li><a href="#">서브메뉴</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>

			<div class="nav-sub-box">
				<div class="inner"><!-- <a href="#"><img src="/" alt="배너이미지" width="171" height="196"></a> --></div>
			</div>

		</div>

		<div class="top-section">
			<div class="inner">
				<div class="link-box">
					<!-- 로그인전 -->
            @if (Route::has('login'))
                    @auth
					<a href="#">로그아웃</a>
					<a href="#">내정보</a>
					<a href="{{ url('/home') }}">Home</a>
                    @else
                    <a href="{{ route('login') }}">로그인</a>
                    @if (Route::has('member'))
					<a href="{{ route('member') }}">회원가입</a>
                    @endif
					<!-- 로그인후 -->
                    @endauth
            @endauth
                </div>
			</div>
		</div>
	</div>
<div id="container">
	<div class="main-slider-applyclass">
		<div id="applyclass" class="slider-applyclass col4"><!-- 갯수 1개 class="col1" / 갯수 2개 class="col2"  -->
			<ul class="bxslider">
				<li style="background-color:#f00"><a href="#" target="_blank"><img src="http://prep.champstudy.com/files/banner/f5de95619de01ed9517dbdea717f5f34.jpg" alt="" width="1000" height="350" /></a></li>
				<li style="background-color:#0f0"><a href="#" target="_blank"><img src="http://prep.champstudy.com/files/banner/af3751c41a59265cd6f7a7f0845cfd06.jpg" alt="" width="1000" height="350" /></a></li>
				<li style="background-color:#00f"><a href="#" target="_blank"><img src="http://prep.champstudy.com/files/banner/63fe4d746b676398f6371de4f6b4c015.jpg" alt="" width="1000" height="350" /></a></li>
				<li style="background-color:#e7e7e7"><a href="#" target="_blank"><img src="http://prep.champstudy.com/files/banner/a8a7dd7a6709de9439a1ab17f5779646.jpg" alt="" width="1000" height="350" /></a></li>
			</ul>
			<div id="bx-pager-apply" class="page-applyclass">
				<a data-slide-index="0" href="#">오픈이벤트</a>
				<a data-slide-index="1" href="#">보험과 세금케이스</a>
				<a data-slide-index="2" href="#">경제기사 들여다보기</a>
				<a data-slide-index="3" href="#">크리에이티브 마케팅</a>
			</div>
		</div>
	</div>

	<div id="content" class="content">

		<div class="content-section after">
			<div class="inner">
				<div class="f-l">
					<div class="main-tit-box-h3">
						<h3 class="main-tit-h3">인기강의</h3>
					</div>

					<div class="tab-box">
						<ul class="tab-best">
							<li class="on"><a href="#">일반직무</a></li><!-- class="on" 활성화 -->
							<li><a href="#">산업직무</a></li>
							<li><a href="#">공통역량</a></li>
							<li><a href="#">어학 및 자격증</a></li>
						</ul>
						<div class="tab-best-con">
							<ul class="tab-category">
								<li class="on"><a href="#">근로자카드</a></li><!-- class="on" 활성화 -->
								<li><a href="#">사업주지원</a></li>
								<li><a href="#">일반</a></li>
							</ul>
							<div class="tab-category-con">
								<ul class="list-best">
									<li>
										<a href="#">
											<img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/main_toeic_review.jpg" alt="" width="198" height="138"/>
											<span class="txt">부자들이 모르는 35가지 보험과<br/>세금 케이스</span><!-- 두줄 말줄임 개발처리 -->
										</a>
									</li>
									<li>
										<a href="#">
											<img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/main_toeic_review.jpg" alt="" width="198" height="138"/>
											<span class="txt">부자들이 모르는 35가지 보험과<br/>세금 케이스</span>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/main_toeic_review.jpg" alt="" width="198" height="138"/>
											<span class="txt">부자들이 모르는 35가지 보험과<br/>세금 케이스</span>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/main_toeic_review.jpg" alt="" width="198" height="138"/>
											<span class="txt">부자들이 모르는 35가지 보험과<br/>세금 케이스</span>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/main_toeic_review.jpg" alt="" width="198" height="138"/>
											<span class="txt">부자들이 모르는 35가지 보험과<br/>세금 케이스</span>
										</a>
									</li>
									<li>
										<a href="#">
											<img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/main_toeic_review.jpg" alt="" width="198" height="138"/>
											<span class="txt">부자들이 모르는 35가지 보험과<br/>세금 케이스</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="f-r">

					<div class="new-schedule">
						<div class="main-tit-box-h3">
							<h3 class="main-tit-h3">근로자카드 학사일정</h3>
						</div>
						<dl>
							<dt><strong><em>D-07</em></strong> 2017년 7월 1기 모집</dt>
							<dd>
								<p>
									<strong><i class="icon-receipt"></i>접수기간</strong>
									<span>09/07(목)까지</span>
								</p>
								<p>
									<strong><i class="icon-learning"></i>학습기간</strong>
									<span>09/07(목)~09/08(금)</span>
								</p>
							</dd>
						</dl>
					</div>

					<div class="new-lecture">
						<div class="main-tit-box-h3">
							<h3 class="main-tit-h3">신규강의</h3>
						</div>

						<ul class="tab-category2">
							<li class="on"><a href="#"><span>근로자카드</span></a></li><!-- class="on" 활성화 -->
							<li><a href="#"><span>사업주지원</span></a></li>
							<li><a href="#"><span>일반</span></a></li>
						</ul>
						<div class="tab-category2-con">
							<ul class="list-bbs">
								<li>
									<a href="#">
										<span class="tc-brand"><strong>일반직무</strong></span>
										<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 모르는 35가지 보험</span>
										<em><i class="icon-new"><span class="hidden">new</span></i></em>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="tc-brand"><strong>일반직무</strong></span>
										<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 모르는 35가지 보험</span>
										<em><i class="icon-new"><span class="hidden">new</span></i></em>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="tc-brand"><strong>일반직무</strong></span>
										<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 모르는 35가지 보험</span>
										<em><i class="icon-new"><span class="hidden">new</span></i></em>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="tc-brand"><strong>일반직무</strong></span>
										<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 모르는 35가지 보험</span>
										<em><i class="icon-new"><span class="hidden">new</span></i></em>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="tc-brand"><strong>일반직무</strong></span>
										<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 모르는 35가지 보험</span>
										<em><i class="icon-new"><span class="hidden">new</span></i></em>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="tc-brand"><strong>일반직무</strong></span>
										<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 모르는 35가지 보험</span>
										<em><i class="icon-new"><span class="hidden">new</span></i></em>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="content-section2">
			<div class="inner">
				<span class="tit">직장인 자기개발 교육! <strong>해커스와 정부가 수강료를 지원</strong>합니다.</span>
				<ul>
					<li><a href="#"><img src="http://img.hackershrd.com/main/bnr01.png" alt="" width="324" height="214"/></a></li>
					<li><a href="#"><img src="http://img.hackershrd.com/main/bnr02.png" alt="" width="324" height="214"/></a></li>
					<li><a href="#"><img src="http://img.hackershrd.com/main/bnr03.png" alt="" width="324" height="214"/></a></li>
				</ul>
			</div>
		</div>

		<div class="content-section3 after">
			<div class="inner after">

				<div class="f-l">
					<div class=" main-tit-box-h3">
						<h3 class="main-tit-h3">BEST 수강후기</h3>
					</div>
					<ul class="list-bbs">
						<li>
							<a href="#">
								<span class="tc-brand"><strong>일반직무</strong></span>
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
								<em>아이디</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="tc-brand"><strong>일반직무</strong></span>
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
								<em>아이디</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="tc-brand"><strong>일반직무</strong></span>
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
								<em>아이디</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="tc-brand"><strong>일반직무</strong></span>
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
								<em>아이디</em>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="tc-brand"><strong>일반직무</strong></span>
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
								<em>아이디</em>
							</a>
						</li>
					</ul>
				</div>

				<div class="f-r banner-box">
					<div class="bxslider-default" data-mode="fade" data-auto="true" data-controls="true" data-pager="true" style="height:254px">
						<ul class="bxslider">
							<li><a href="#"><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/300freepass_620x400.jpg" alt="" width="478" height="254"/></a></li>
							<li><a href="#"><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/champ_zero_freepass_top_mainbn_620x400.jpg" alt="" width="478" height="254"/></a></li>
							<li><a href="#"><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/2nd_foreign_620x400.jpg" alt="" width="478" height="254" /></a></li>
							<li><a href="#"><img src="http://www.champstudy.com/files/banner/imglib_files/banner/imglib/grammargateway_0_blank_620x400.jpg" alt="" width="478" height="254" /></a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>

		<div class="content-section4 after">
			<div class="inner after">

				<div class="f-l mr30">
					<div class=" main-tit-box-h3 after">
						<h3 class="main-tit-h3 f-l">공지사항</h3>
						<a href="#" class="f-r mt5">더보기 +</a>
					</div>
					<ul class="list-bbs">
						<li>
							<a href="#">
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
							</a>
						</li>
					</ul>
				</div>

				<div class="f-l">
					<div class=" main-tit-box-h3 after">
						<h3 class="main-tit-h3 f-l">FAQ</h3>
						<a href="#" class="f-r mt5">더보기 +</a>
					</div>
					<ul class="list-bbs">
						<li>
							<a href="#">
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="sbj ellipsis_line">부자들이 모르는 35가지 보험 부자들이 부자들이 부자들이 모르는 35가지 보험</span>
							</a>
						</li>
					</ul>
				</div>

				<div class="f-r cs-box">
					<div class="cs-info">
						<h3>고객센터</h3>
						<strong class="tc-brand">02-566-3700</strong>
						<p><i class="icon-time"><span class="hidden">운영시간</span></i>평일 9:00 – 23:00/ 주말 9:00 –18:00</p>
						<p><i class="icon-email"><span class="hidden">메일</span></i>help@champstudy.com</p>
					</div>
					<div class="after">
						<a href="#" class="cs-btn f-l">1:1 상담게시판</a>
						<a href="#" class="cs-btn f-r">기업교육 상담게시판</a>
					</div>
				</div>
			</div>
		</div>

		<div class="quick-bar">
			<div class="inner p-r">
				<ul class="list-link">
					<li><a href="#" class="txt">로그인</a></li>
					<li><a href="#" class="txt">상담신청</a></li>
					<li><a href="#" class="txt">장바구니</a></li>
				</ul>

				<dl>
					<dt class="txt">오늘 본 과정 <em class="tc-brand">3</em>건</dt>
					<dd>
						<ul>
							<li><a href="#"><img src="http://www.hackershrd.com/html/images/sub/thum.gif" alt="" width="41" height="29"/></a></li>
							<li><a href="#"><img src="http://www.hackershrd.com/html/images/sub/thum.gif" alt="" width="41" height="29"/></a></li>
							<li><a href="#"><img src="http://www.hackershrd.com/html/images/sub/thum.gif" alt="" width="41" height="29"/></a></li>
							<li><a href="#"><img src="http://www.hackershrd.com/html/images/sub/thum.gif" alt="" width="41" height="29"/></a></li>
						</ul>
					</dd>
				</dl>
				<button type="button" class="js_top_scroll"><span class="hidden">최상단으로</span></button>
			</div>
		</div>

	</div>
</div>
    </body>
</html>
