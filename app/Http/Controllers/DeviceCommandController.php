<?php

namespace App\Http\Controllers;

use App\Device;
use App\DeviceCommand;
use Illuminate\Http\Request;

class DeviceCommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param DeviceCommand $deviceCommand
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Http\Response
     */
    public function index(DeviceCommand $deviceCommand)
    {
        return $deviceCommand->newQuery()->with('device')->paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Device $device
     * @return \Illuminate\Http\Response
     */
    public function create(Device $device)
    {
        return view('device-command.create', [
            'device' => $device
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        (new DeviceCommand)
            ->fill($request->all())
            ->save();

        return redirect()->route('device.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeviceCommand  $deviceCommand
     * @return DeviceCommand|\Illuminate\Http\Response
     */
    public function show(DeviceCommand $deviceCommand)
    {
        return $deviceCommand;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeviceCommand  $deviceCommand
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceCommand $deviceCommand)
    {
        return view('device-command.edit', [
            'command'   => $deviceCommand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeviceCommand  $deviceCommand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeviceCommand $deviceCommand)
    {
        $deviceCommand->fill($request->all())->save();

        return redirect()->route('device.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeviceCommand  $deviceCommand
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceCommand $deviceCommand)
    {
        $deviceCommand->delete();

        return redirect()->route('device.index');
    }
}
