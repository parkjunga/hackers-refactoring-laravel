@extends('layouts.lectureTemplate')
@section('lecture')
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
12
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
    @foreach($lecture as $lec)

            <tr>
            <td>
                <input type="hidden" name="id" value="{{ $lec->id }}">
                <div class="sample-lecture">
                    <img src="{{ $lec->file_path }}" width="144" height="101" alt="">
                     <span class="tc-brand" style="cursor:pointer" onclick="view_save('Y16M090041', 1,'','01::refu>4>B001>M002','go_sample')">샘플강의 ▶</span>
                </div>
            </td>
            <td class="sbj">
                <em class="tit"><a href="{{ $lec->file_name }}">{{ $lec->title}}</a></em>
                <p class="tc-gray mt10">{{ $lec->summary }}</p>
            </td>
            <td>
                <div class="price-box">
                        <dl>
                            <dt>강의수</dt>
                            <dd>{{ $lec->total_lecture }} 강</dd>
                            <dt>정원</dt>
                            <dd>{{ $lec->personnel }} 명</dd>
                        </dl>
                        <dl class="tc-brand fs16">
                            <dt>강사</dt>
                            <dd>{{ $lec->teacher }}</dd>
                        </dl>
                                        </div>
            </td>
            <td class="t-r"><a href="./lecture.php?mode=lecView&amp;pcate=cateF&amp;scate=F002&amp;product_key=01::refu>4>B001>M002&amp;p_id=&amp;s_id=Y16M090041" class="btn-square">
                                            상세<br>보기
                                    </a>
            </td>
        </tr>
        @endforeach
            <!--  강의 리스트 END-->
    </tbody>
</table>

		<div class="box-paging">
            <a href = "/lecture?pageNum={{ $startPage }}"><<</a>
            <?php if ($pageNum == 1) { echo ""; }
                else { ?>
            <a href = "/lecture?page={{ $pageNum-1 }}"><</a>
            <?php } ?>
            <?php for($i=$startPage; $i<=$endPage; $i++)
            { ?>
            <a href = "/lecture?page=<?= $i ?>"><?= $i ?></a>
            <?php } ?>
            <?php if($pageNum == $totalPage)
            {
                echo "";
            }
            else
            { ?>
            <a href = "/tasks?page={{ $pageNum+1 }}">></a>
            <?php } ?>
            <a href = "/tasks?page={{ $endPage }}">>></a><br>
		</div>

		<div class="box-btn t-r">
			<a href="#" class="btn-m">강의 등록</a>
		</div>
	</div>
</div>
@endsection
