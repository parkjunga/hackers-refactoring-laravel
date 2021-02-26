<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\tb_lecture;
//use App\tb_file;
use App\Models\tb_file;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //$lecture = tb_lecture::orderBy('created_at')->get()
        $lecture = DB::table('tb_lecture')->orderBy('created_at')->simplePaginate(15);
        foreach($lecture as $lec) {
          // echo $lec->file_id;
           $files = DB::select('select * from tb_file where id = ?', [$lec->file_id]);
           foreach ($files as $file){
            //   echo $file -> name;
               $lec['file_name'] = $file -> name;
            //   echo $file -> path;
               $lec['file_path'] = $file -> path;
           }
        };
        print_r($lecture);
        exit;
        return view('lecture/list',['lecture' => $lecture]);
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
