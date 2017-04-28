<?php

namespace App\Http\Controllers;

use App\Device;
use App\Exchange;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Device $repository
     * @param Exchange|null $exchange
     * @return \Illuminate\Http\Response
     */
    public function index(Device $repository, Exchange $exchange = null)
    {
        $devices = $repository->newQuery()
            ->with('exchange', 'commands')
            ->when($exchange, function(Builder $query) use ($exchange) {
                $query->where('exchange_id', $exchange->getKey()) ;
            })
            ->paginate();

        return view('device.index', [
            'data'  => $devices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('device.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        (new Device)
            ->fill($request->all())
            ->save();

        return redirect()->route('device.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device  $device
     * @return Device|\Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        return $device;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        return view('device.edit', [
            'device'    => $device
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $device->fill($request->all())->save();

        return redirect()->route('device.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('device.index');
    }
}
