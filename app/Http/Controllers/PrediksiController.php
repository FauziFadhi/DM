<?php

namespace App\Http\Controllers;

use App\Prediksi;
use Illuminate\Http\Request;

class PrediksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $output = "";

        $items = Prediksi::orderBy('id','DESC')->get();
        $no = 1;
        foreach ($items as $item) {
            $output.='<tr>'.

            '<td>'.$no.'</td>'.

            '<td>'.$item->Kehadiran.'</td>'.

            '<td>'.$item->Tugas.'</td>'.
            '<td>'.$item->UTS.'</td>'.
            '<td>'.$item->UAS.'</td>'.
            '<td>'.$item->Nilai.'</td>'.
            '<td>'.$item->Target.'</td>'.


            '</tr>';
            # code...

            $no++;
        }

        return Response($output);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prediksi  $prediksi
     * @return \Illuminate\Http\Response
     */
    public function show(Prediksi $prediksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prediksi  $prediksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prediksi $prediksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prediksi  $prediksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prediksi $prediksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prediksi  $prediksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prediksi $prediksi)
    {
        //
    }
}
