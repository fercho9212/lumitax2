<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Advertising;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
      $images=Advertising::all();
      return view('panel.modules.advertising.index',['images'=>$images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    if ($request->ajax()) {

        $input = $request->all();
    		$rules = array(
    		    'file' => 'image|max:30000',
    		);
    		$validation = Validator::make($input, $rules);
    		if ($validation->fails())
    		{
    			return Response::make($validation->errors->first(), 500);
    		}
        else {
          $file=$request->file('file');
          $filename=uniqid().$file->getClientOriginalName();
          $count=Advertising::all()->count();
          if ($count<5) {
            try {
              $dir='advertising/';
              $file->move($dir,$filename);
              $advertising=new Advertising;
              $advertising->img_name=$file->getClientOriginalName();
              $advertising->path=$filename;
              $advertising->save();
              return response()->json(['rpt'=>$advertising]);
            } catch (\Exception $e) {
              return response()->json(['rpt'=>'error']);
            }
          }else {
            return response()->json(['rpt'=>'error_c']);
          }
        }
      }


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
      $file=Advertising::findOrFail($id);
      unlink(public_path('advertising/'.$file->path));
      if ($file->delete()) {
         return response()->json(['rpt'=>'success']);
      }
    }
}
