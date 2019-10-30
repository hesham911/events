<?php

namespace S3geeks\Events\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use S3geeks\Events\Models\center;
use S3geeks\Events\Models\country;
use S3geeks\Events\Models\division;
use Illuminate\Support\Facades\Validator;


class CentersController extends Controller
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
