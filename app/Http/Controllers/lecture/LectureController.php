<?php

namespace App\Http\Controllers\lecture;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\tb_lecture;
//use App\tb_file;
use App\Models\tb_file;
use phpDocumentor\Reflection\Types\False_;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 페이지 번호
        $pageNum = $request->input('page');

        // 페이지 번호가 있다면 pageNum 없다면 1
        $pageNum = (isset($pageNum)? $pageNum: 1 );

        // 페이지 내 첫 게시글 번호
        $startNum = ($pageNum-1)*5;

        // 한 페이지 당 표시될 글 갯수
        $writeList   = 10;

        // 전체 페이지 중 표시될 페이지 갯수
        $pageNumList = 10;

        // 페이지 그룹 번호
        $pageGoup = ceil($pageNum/$pageNumList);

        // 페이지 그룹 내 첫 페이지 번호
        $startPage = (($pageGoup-1) * $pageNumList) + 1;

        // 페이지 그룹 내 마지막 페이지 번호
        $endPage     = $startPage + $pageNumList-1;

        // 전체 게시글 갯수
        $totalCount = tb_lecture::count();

        // 전체 페이지 갯수
        $totalPage = ceil($totalCount/$writeList);

        // 페이지 그룹이 마지막일 때 마지막 페이지 번호
        if($endPage >= $totalPage) {
            $endPage = $totalPage;
        }

        if ($request->input('del') == 1) {
            tb_lecture::where('id', $request->input('delId'));
        }

        $lecture = tb_lecture::orderby('created_at', 'DESC')
            ->skip($startNum)->take($writeList)->get();

        foreach($lecture as $lec) {
            //$files = DB::select('select * from tb_file where id = ?', [$lec->file_id]);
            $files = DB::table('tb_file')->where('id',$lec->file_id)->get();
//            $url = Storage::url('images.jpg');// /storage/images.jpg
//            $url = Storage::url($files[0]->name);
            //echo  Storage::disk('public')->get('images.jpg');

//            print_r($files);
//            $path = Storage::path($files[0]->name);
//            print_r($path)
//            exit;
//            echo Storage::disk('public')->get('images/'+$files[0]->name);
//            echo '<br>';
//            echo $url;
//            exit;
            $lec->file_name = $files[0]->ori_name;
            $lec->file_path = $files[0]->path;
        }

        //$lecture = tb_lecture::orderBy('created_at')->get();
//        $lecture = DB::table('tb_lecture')->orderBy('created_at')->get();
//        foreach($lecture as $lec) {
//            //$files = DB::select('select * from tb_file where id = ?', [$lec->file_id]);
//            $files = DB::table('tb_file')->where('id',$lec->file_id)->get();
//            $lec->file_name = $files[0]->ori_name;
//            $lec->file_path = $files[0]->path;
//        };
//        print_r($lecture);
//        exit;
        return view('lecture.list', [    //경로를 작성할 때 \대신 . 을 사용
            'totalCount'=>$totalCount,
            'lecture'=>$lecture,
            'pageNum'=>$pageNum,
            'startPage'=>$startPage,
            'endPage'=>$endPage,
            'totalPage'=>$totalPage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 분류
        $categorys = DB::table('tb_category')->get();
        return view('lecture/create',['categorys' => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //            $table->id();

        $test = $request->all();
        //var_dump($test);
        //$file = $request->file_info->store('images'); // 이미지 저장

        // $validatedData  = $request->validateWithBag([
        //     'title' => ['required', 'max:100'],
        //     'level' => ['required', 'max:2'],
        //     'teacher' => ['required', 'max:15'],
        // ]);

        $data = $request->validate([
            'title' => ['required', 'max:100'],
            'level' => ['required', 'max:2'],
            'teacher' => ['required', 'max:15'],
        ]);

        $fileModel = new tb_file;
        if ($request->file()){
            $fileName = time().'_'.$request->file_info->getClientOriginalName();
            $original_file_name = $request->file_info->getClientOriginalName();
            $file_path = $request->file_info->storeAs('images',$fileName,'public');
            $file_type = $request->file_info->extension();
            $fileModel->name = $fileName;
            $fileModel->ori_name = $original_file_name;
            $fileModel->type = $file_type;
            $fileModel->path = '/storage/'.$file_path;
            $fileModel->save();
        }
        //echo $fileModel->id;

        tb_lecture::create([
            'category_id' => $request -> category,
            'title' => $data['title'],
            'summary' => $request -> summary,
            'time' => $request -> time,
            'level' => $data['level'],
            'file_id' => $fileModel->id,
            'total_lecture' => $request -> total,
            'teacher' => $data['teacher'],
            'personnel' => $request -> personnel,
        ]);

        return redirect('lecture');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
