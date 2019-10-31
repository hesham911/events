<?php

namespace S3geeks\Events\Http\Controllers\Admin;

use Illuminate\Http\Request;
use S3geeks\Events\Models\center;
use S3geeks\Events\Models\country;
use S3geeks\Events\Models\division;
use Illuminate\Support\Facades\Validator;
use S3geeks\Events\Http\Controllers\Admin\MasterController as MasterController;
use S3geeks\Events\Models\uploads;


class CentersController extends MasterController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = center::where('active',1)->paginate(15);
        return view('adminEvents::centers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminEvents::centers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = $request->all();
        $rules = [
            'title'         =>  'required|min:5',
            'address'       =>  'required',
            'num_phone'      =>  'required|numeric|min:11',
            'email'         =>  'required|email',
            'url_fb'        =>  'required|url',
            'url_twitter'   =>  'required|url',
            'logo'          =>  'required|image|mimes:png,jpg,jpeg,bmp',
//            'website'       =>  'required|url',
            'countries'     =>  'required',
            'divisions'     =>  'required',
        ];
        $v = Validator::make($item,$rules);
        if ($v->fails()){
            dd($v->errors());
        }else{
            if (request()->hasFile('logo')){
                $file = request()->file('logo');
                $file_name =  time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/'), $file_name );
                if(!empty($old_file)) @unlink(public_path('upload/').$old_file);
                $item['logo'] = $file_name;
            }
            $divisionId         =   $item['divisions'];
            $item['user_id']    = auth()->id();
            $center = center::create($item);
            $addDivision =  division::find($divisionId)->centers()->sync($center);

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
        $item = center::findOrFail($id);
        return view('adminEvents::centers.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $item = center::findOrFail($request->id);

        return view('adminEvents::centers.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $item = $request->all();
        $rules = [
            'title'         =>  'required|min:5',
            'address'       =>  'required',
            'num_phone'      =>  'required|numeric|min:11',
            'email'         =>  'required|email',
            'url_fb'        =>  'required|url',
            'url_twitter'   =>  'required|url',
            'logo'          =>  'required|image|mimes:png,jpg,jpeg,bmp',
//            'website'       =>  'required|url',
            'countries'     =>  'required',
            'divisions'     =>  'required',
        ];
        $v = Validator::make($item,$rules);
        if ($v->fails()){
            dd($v->errors());
        }else{
            if (request()->hasFile('logo')){
                $file = request()->file('logo');
                $file_name =  time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/'), $file_name );
//                if(!empty($old_file)) @unlink(public_path('upload/').$old_file);
                $item['logo'] = $file_name;
            }
            $divisionId         =   $item['divisions'];
            $item['user_id']    = auth()->id();
            $center = center::findOrFail($request->id);
            $center->update($item);


            $addDivision =  center::findOrFail($request->id)->divisions()
                ->updateExistingPivot($center->divisions['0']->id,[
                'division_id' => $divisionId,
            ]);

        }
    }

    public function destroy(Request $request)
    {
        $trainer= center::findOrFail($request->id);
        $trainer->delete();
    }

}
