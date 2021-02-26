@extends('layouts.master')

@section('content')
<div id="container" class="container">
	<div id="nav-left" class="nav-left">
		<div class="nav-left-tit"> 
			<span>일반직무</span>
		</div>
		<ul class="nav-left-lst">
			<li><a href="#">경제일반</a></li>
		</ul>
	</div>

	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">경제일반</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>수강후기</strong>
			</div>
		</div>

		<ul class="tab-list tab5">
			<li class="on"><a href="#">전체</a></li>
			<li><a href="#">일반직무</a></li>
			<li><a href="#">산업직무</a></li>
			<li><a href="#">공통역량</a></li>
			<li><a href="#">어학 및 자격증</a></li>
		</ul>

		<div class="search-box">
        <div class="search-top">맞춤 강의 찾기<button type="button" class="search-refresh" onclick="js_search_clean()">검색 초기화<i class="icon-refresh"><span class="hidden">새로고침</span></i></button></div>
        <ul class="lst-search">
            <li>
                <strong class="search-tit">난이도</strong>
                <ul class="lst-search-chk">
                                            <li>
                            <label class="input-sp">
                                <input type="checkbox" name="s_wr_8[]" id="s_wr_8" value="TOP">
                                <span class="input-txt">상급</span>
                            </label>
                        </li>
                                                <li>
                            <label class="input-sp on">
                                <input type="checkbox" name="s_wr_8[]" id="s_wr_8" value="MID" checked="checked">
                                <span class="input-txt">중급</span>
                            </label>
                        </li>
                                                <li>
                            <label class="input-sp">
                                <input type="checkbox" name="s_wr_8[]" id="s_wr_8" value="BOT">
                                <span class="input-txt">초급</span>
                            </label>
                        </li>
                        
                </ul>
            </li>
        </ul>
    </div>

		<div class="search-info">
			<div class="search-form f-r">
				<input type="text" class="input-text" placeholder="강의명을 입력하세요." style="width:158px"/>
				<button type="button" class="btn-s-dark">검색</button>
			</div>
		</div>

			<table border="0" cellpadding="0" cellspacing="0" class="tbl-lecture-list">
    <caption class="hidden">강의정보</caption>
    <colgroup>
        <col style="width:166px">
        <col style="*">
        <col style="width:170px">
        <col style="width:110px">
    </colgroup>

    <tbody>
    <!--  강의 리스트 START-->
            <tr>
            <td>
                <div class="sample-lecture">
                                            <img src="./lms/data/file/B01/168429148_WquDI8V4_100EB8584_EAB8B0EC9785EAB2BDEC9881.jpg" width="144" height="101" alt="">
                                                            <span class="tc-brand" style="cursor:pointer" onclick="view_save('Y16M090041', 1,'','01::refu>4>B001>M002','go_sample')">샘플강의 ▶</span>
                                    </div>
            </td>
            <td class="sbj">
                <em class="tit"><a href="./lecture.php?mode=lecView&amp;pcate=cateF&amp;scate=F002&amp;product_key=01::refu>4>B001>M002&amp;p_id=&amp;s_id=Y16M090041">100년 기업의 변화경영</a></em>
                <p class="tc-gray mt10">▪ 급변하는 환경 속에서 흔들리지 않는 영속 기업으로 가기 위해 조직과 내부 구성원이 근원적 변화가 필요합니다. 변화경영의 이론과 핵심적인 통찰, 관련 사례연구를 통해 근본적인 변...</p>
            </td>
            <td>
                <div class="price-box">
                                            <dl>
                            <dt>정가</dt>
                            <dd>100,000원</dd>
                            <dt>지원금</dt>
                            <dd>80,000원</dd>
                        </dl>
                        <dl class="tc-brand fs16">
                            <dt>총 결제금액</dt>
                            <dd>20,000원</dd>
                        </dl>
                                        </div>
            </td>
            <td class="t-r"><a href="./lecture.php?mode=lecView&amp;pcate=cateF&amp;scate=F002&amp;product_key=01::refu>4>B001>M002&amp;p_id=&amp;s_id=Y16M090041" class="btn-square">
                                            상세<br>보기
                                    </a>
            </td>
        </tr>
                <tr>
            <td>
                <div class="sample-lecture">
                                            <img src="./lms/data/file/B01/168431649_bHucEMQB_26.png" width="144" height="101" alt="">
                                                            <span class="tc-brand" style="cursor:pointer" onclick="view_save('Y18M010002', 1,'','01::refu>4>B001>M002','go_sample')">샘플강의 ▶</span>
                                    </div>
            </td>
            <td class="sbj">
                <em class="tit"><a href="./lecture.php?mode=lecView&amp;pcate=cateF&amp;scate=F002&amp;product_key=01::refu>4>B001>M002&amp;p_id=&amp;s_id=Y18M010002">4차 산업혁명 경영학-가상현실, 불가능이 없는 새로운 세상!</a></em>
                <p class="tc-gray mt10">가상현실및 증강현실 등 주요 기술 및 용어에 대해 학습하는 과정</p>
            </td>
            <td>
                <div class="price-box">
                                            <dl>
                            <dt>정가</dt>
                            <dd>100,000원</dd>
                            <dt>지원금</dt>
                            <dd>80,000원</dd>
                        </dl>
                        <dl class="tc-brand fs16">
                            <dt>총 결제금액</dt>
                            <dd>20,000원</dd>
                        </dl>
                                        </div>
            </td>
            <td class="t-r"><a href="./lecture.php?mode=lecView&amp;pcate=cateF&amp;scate=F002&amp;product_key=01::refu>4>B001>M002&amp;p_id=&amp;s_id=Y18M010002" class="btn-square">
                                            상세<br>보기
                                    </a>
            </td>
        </tr>
            <!--  강의 리스트 END-->
    </tbody>
</table>
		</table>

		<div class="box-paging">
			<a href="#"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>
			<a href="#"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>
			<a href="#" class="active">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<a href="#">6</a>
			<a href="#"><i class="icon-next"><span class="hidden">다음페이지</span></i></a>
			<a href="#"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>
		</div>

		<div class="box-btn t-r">
			<a href="#" class="btn-m">강의 등록</a>
		</div>
	</div>
</div>
@endsection