<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecycleResource;
use App\Models\Recycle;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RecycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recycles = Recycle::all();
        return RecycleResource::collection($recycles);
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
        $recyle = new Recycle();

        if (!$this->requestValid($request)) {
            return response()->json([
                'error' => 'Input data not valid'
            ]);
        }

        $recyle->weekDay = $request->weekDay;
        $recyle->startTime = $request->startTime;
        $recyle->endTime = $request->endTime;
        $recyle->type = $request->type;

        $recyle->save();


        return new RecycleResource($recyle);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Recycle::findOrFail($id);
        return new RecycleResource($item);
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
        $item = Recycle::findOrFail($id);


        $item->weekDay = $request->weekDay;
        $item->startTime = $request->startTime;
        $item->endTime = $request->endTime;
        $item->type = $request->type;

        $item->save();
        return new RecycleResource($item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Recycle::findOrFail($id);

        $item->delete();

        return new RecycleResource($item);
    }


    //return the todays recyles schedule
    public function today()
    {
        $recycles = Recycle::all();
        $response = [];

        $date = new DateTime();
        $weekDay = $date->format('N');

        foreach ($recycles as $item) {
            if ($item->weekDay == $weekDay)
                array_push($response, $item);
        }

        return RecycleResource::collection($response);
    }

    private function requestValid($request): bool
    {
        $rules = array(
            "weekDay" => "required|numeric",
            "startTime" => "required|numeric",
            "endTime" => "required|numeric",
            "type" => "required|string"
        );

        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails())
            return false;

        if ($request->startTime >= $request->endTime)
            return false;

        if ($request->weekDay > 7 || $request->weekDay < 0)
            return false;

        return true;
    }
}
