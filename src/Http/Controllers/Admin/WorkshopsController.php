<?php

namespace S3geeks\Events\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use S3geeks\Events\Models\center;
use S3geeks\Events\Models\country;
use S3geeks\Events\Models\division;
use S3geeks\Events\Models\trainer;
use S3geeks\Events\Models\uploads;
use S3geeks\Events\Models\workshop;
use S3geeks\Events\Http\Controllers\Admin\MasterController as MasterController;


class WorkshopsController extends MasterController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = workshop::where('active',1)->with('centers','trainers')->paginate(15);
        return view('adminEvents::workshops.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminEvents::workshops.create');
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
            'title'         =>  'required|min:10',
            'start_date'    =>  'required|date',
            'end_date'      =>  'required|date',
            'description'   =>  'required|min:255',
            'file'          =>  'required',
            'center'        =>  'required',
            'trainer'       =>  'required',
            'countries'     =>  'required',
            'divisions'     =>  'required',
        ];
        $v = Validator::make($item,$rules);
        if ($v->fails()){
            dd($v->errors());
        }else{
            $item['start_time'] = Carbon::createFromFormat('Y-m-d\TH:i',$item['start_date'])->toTimeString();
            $item['end_time']   = Carbon::createFromFormat('Y-m-d\TH:i',$item['end_date'])->toTimeString();
            $item['start_date'] = Carbon::createFromFormat('Y-m-d\TH:i',$item['start_date'])->toDateString();
            $item['end_date']   = Carbon::createFromFormat('Y-m-d\TH:i',$item['end_date'])->toDateString();
            $centerId           =   $item['center'];
            $trainerId          =   $item['trainer'];
            $divisionId         =   $item['divisions'];
            $item['user_id']    = auth()->id();
            $workshop = workshop::create($item);

            if (!empty($item['file'])){

                foreach ($item['file'] as $key => $value){
                    $image = uploads::findOrFail($value);
                    $image->user_id = $workshop->user_id;
                    $image->workshop_id = $workshop->id;
                    $image->save();
                }
            }

         $addTrainer =  $workshop->centers()->attach($centerId);
         $addCenter =  $workshop->trainers()->attach($trainerId);
         $addDivision =  division::find($divisionId)->workshops()->sync($workshop);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $item = workshop::findOrFail($request->id);
        return view('adminEvents::workshops.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $item = workshop::findOrFail($request->id);
        return view('adminEvents::workshops.edit',compact('item'));
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
      return  workshop::findOrFail($id)->delete();
    }

    public function getCenters()
    {
        $centers = center::all();
        return response()->json($centers);
    }

    public function getTrainers()
    {
        $centers = trainer::all();
        return response()->json($centers);
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
