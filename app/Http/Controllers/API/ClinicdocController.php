<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Clinicdoc;
use App\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JsonSerializable;

class ClinicdocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'clinics' => Clinicdoc::with(['clinic', 'doctor'])->get(), 
            'doctors' => User::with(['member', 'photo'])->where('role', 'user')->get(),
            'schedules' => Schedule::with(['clinic', 'session', 'day', 'charge'])->where('doctor_id', '1')->get()
        ];
        return json_encode(new ArrayValue($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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


class ArrayValue implements JsonSerializable {
    
    public function __construct(array $array) {
        $this->array = $array;
    }

    public function jsonSerialize() {
        return $this->array;
    }
}
