<?php

namespace App\Http\Controllers;

use App\Exchange;
use Illuminate\Http\Request;

/**
 * Class ExchangeController
 * @package App\Http\Controllers
 */
class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Exchange $repository
     * @return \Illuminate\Http\Response
     */
    public function index(Exchange $repository)
    {
        return view('exchange.index', [
            'collection'  => $repository->newQuery()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exchange.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        (new Exchange)
            ->fill($request->all())
            ->save();

        return redirect()->route('exchange.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Exchange $exchange
     * @return Exchange|\Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Exchange $exchange)
    {
        return $exchange;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Exchange $exchange
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Exchange $exchange)
    {
        return view('exchange.edit', [
            'exchange' => $exchange
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Exchange $exchange
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Exchange $exchange)
    {
        $exchange->fill($request->all())->save();

        return redirect()->route('exchange.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Exchange $exchange
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Exchange $exchange)
    {
        $exchange->delete();

        return redirect()->route('exchange.index');
    }
}
