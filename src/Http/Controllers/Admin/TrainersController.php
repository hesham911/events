<?php

namespace S3geeks\Events\Http\Controllers\Admin;

use Illuminate\Http\Request;
use S3geeks\Events\Models\country;
use S3geeks\Events\Models\division;
use Illuminate\Support\Facades\Validator;
use S3geeks\Events\Models\trainer;
use S3geeks\Events\Http\Controllers\Admin\MasterController as MasterController;



class TrainersController extends MasterController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = trainer::where('active',1)->paginate(15);
        return view('adminEvents::trainers.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminEvents::trainers.create');
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
            'first_name'        =>  'required|min:2',
            'last_name'         =>  'required|min:2',
            'address'           =>  'required',
            'num_phone'         =>  'required|numeric|min:11',
            'work_num_phone'    =>  'required|numeric|min:11',
            'email'             =>  'required|email',
            'url_fb'            =>  'required|url',
            'url_twitter'       =>  'required|url',
            'url_linked_in'     =>  'required|url',
            'portfolio_link'    =>  'required|url',
            'cv'                =>  'required|file|mimes:pdf,doc,docx',
//            'website'           =>  'required|url',
            'countries'         =>  'required',
            'divisions'         =>  'required',
        ];
        $v = Validator::make($item,$rules);
        if ($v->fails()){
            dd($v->errors());
        }else{
            if (request()->hasFile('cv')){
                $file = request()->file('cv');
                $file_name =  time() . '-' . rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/files/'), $file_name );
                if(!empty($old_file)) @unlink(public_path('upload/files/').$old_file);
                $item['cv'] = $file_name;
            }
            $divisionId         =   $item['divisions'];
            $item['user_id']    = auth()->id();
            $trainer = trainer::create($item);
            $addDivision =  division::find($divisionId)->trainers()->sync($trainer);

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
        return view('adminEvents::workshops.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adminEvents::workshops.edit');
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

    public function getCountries()
    {
        $centers = country::all();
        return response()->json($centers);
    }

    public function getDivisions()
    {
        $centers = division::all();
        return response()->json($centers);
    }
}
