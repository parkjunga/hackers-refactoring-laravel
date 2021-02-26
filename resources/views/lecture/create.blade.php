@extends('layouts.master')
@section('content')
<div id="container" class="container">
	<div id="nav-left" class="nav-left">
		<div class="nav-left-tit"> 
			<span>직무교육 안내</span>
		</div>
		<ul class="nav-left-lst">
			<li><a href="#">해커스 HRD 소개</a></li>
			<li><a href="#">사업주훈련</a></li>
			<li><a href="#">근로자카드</a></li>
			<li><a href="#">학습안내</a></li>
			<li class="on"><a href="#">수강후기</a></li>
		</ul>
	</div>

	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">강의등록</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>수강후기</strong>
			</div>
		</div>

		<div class="user-notice">
			<strong class="fs16">유의사항 안내</strong>
			<ul class="list-guide mt15">
				<li class="tc-brand">수강후기는 신청하신 강의의 학습진도율 25%이상 달성시 작성가능합니다. </li>
				<li>욕설(욕설을 표현하는 자음어/기호표현 포함) 및 명예훼손, 비방,도배글, 상업적 목적의 홍보성 게시글 등 사회상규에 반하는 게시글 및 강의내용과 상관없는 서비스에 대해 작성한 글들은 삭제 될 수 있으며, 법적 책임을 질 수 있습니다.</li>
			</ul>
		</div>
		<form id="lecture_form" action="{{ route('lecture.store')}}" method="POST"  enctype="multipart/form-data" >
		@csrf
		<table border="0" cellpadding="0" cellspacing="0" class="tbl-col">
			<caption class="hidden">강의정보</caption>
			<colgroup>
				<col style="width:15%"/>
				<col style="*"/>
			</colgroup>

			<tbody>
				<tr>
					<th scope="col">강의</th>
					<td colspan="3">
						<select class="input-sel" style="width:160px" name="category">
							<option value="">분류</option>
							@foreach ($categorys as $category)
							<option value="{{ $category->id }}">{{ $category->title }}</option>
							@endforeach
						</select>
					</td>
				</tr>
				<tr>
					<th scope="col">강의명</th>
					<td><input type="text" class="input-text @error('title') is-invalid @enderror" name="title" style="width:611px"/></td>
					@error('title')
    				<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</tr>
				<tr>
					<th>강사명</th>
					<td><input type="text" name="teacher" class="input-text"/></td>
					<th>학습시간</th>
					<td><input type="text" name="time" class="input-text"/></td>
				</tr>
				<tr>
					<th>강의수</th>
					<td><input type="text" name="total" class="input-text"/></td>
					<th>정원</th>
					<td><input type="text" name="personnel" class="input-text"/></td>
				</tr>
				<tr>
					<th>썸네일</th>
					<td colspan="3"><input name="file_info" type="file"/></td>
				</tr>
				<tr>
					<th scope="col">강의난이도</th>
					<td colspan="3">
						<ul class="list-rating-choice">
							<li>
								<label class="input-sp ico">
									<input type="radio" name="level" id="level" value="고급"/>
									<span class="input-txt level">고급</span>
								</label>
							</li>
							<li>
								<label class="input-sp ico">
								<input type="radio" name="level" id="level" value="중급"/>
									<span class="input-txt level">중급</span>
								</label>
							</li>
							<li>
							<label class="input-sp ico">
								<input type="radio" name="level" id="level" checked="checked" value="초급"/>
									<span class="input-txt level">초급</span>
								</label>
							</li>
						</ul>
					</td>
				</tr>
                <tr>
					<th scope="col">학습개요</th>
					<td><textarea name="summary" style="width: 611px; height:200px;"></textarea></td>
				</tr>
			</tbody>
		</table>

		<!-- <div class="editor-wrap">
			
		</div> -->
	
		<div class="box-btn t-r">
			<a href="#" class="btn-m-gray">목록</a>
			<button type="submit" class="btn-m ml5">저장</button>
		</div>
		</form>


		
	</div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){
	
})
</script>
@endsection


