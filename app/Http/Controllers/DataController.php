<?php

namespace App\Http\Controllers;

use App\Prediksi;
use App\Score;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Score::all();
        return view('index',compact('items'));
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
        $kehadiran = $this->getKehadiran($request->Kehadiran);
        $uts = $this->getUTS($request->UTS);
        $uas = $this->getUAS($request->UAS);
        $tugas = $this->getTugas($request->Tugas);
        $nilai = $this->getNilai($request->Nilai);

        $out = $this->prediksi($kehadiran,$tugas,$uts,$uas,$nilai);
        Prediksi::create([
            'Kehadiran' => $kehadiran,
            'Tugas' => $tugas,
            'UTS' => $uts,
            'UAS' => $uas,
            'Nilai' => $nilai,
            'Target' => $out
        ]);
        return $out;
        
    }

    private function getKehadiran($kehadiran) {
        if($kehadiran >= 80) {
            $out = "Baik";
        }else{
            $out = "Buruk";
        }
        return $out;
    }

    private function getTugas($tugas) {
        if($tugas >= 75) {
            $out = "Baik";
        }else if($tugas > 45){
            $out = "Cukup";
        }else {
            $out = "Buruk";
        }
        return $out;
    }

    private function getUTS($uts) {
        if($uts >= 75) {
            $out = "Baik";
        }else if($uts > 45){
            $out = "Cukup";
        }else {
            $out = "Buruk";
        }
        return $out;
    }

    private function getUAS($UAS) {
        if($UAS >= 75) {
            $out = "Baik";
        }else if($UAS > 45){
            $out = "Cukup";
        }else {
            $out = "Buruk";
        }
        return $out;
    }

    private function getNilai($nilai) {
        if($nilai >= 75) {
            $out = "Baik";
        }else if($nilai > 45){
            $out = "Cukup";
        }else {
            $out = "Buruk";
        }
        return $out;
    }

    private function prediksi($Kehadiran,$Tugas,$UTS,$UAS,$Nilai){
        
        $items = Score::all();

        $lulusT = $this->count('Target','Lulus');        
        $lulusF = $this->count('Target','Tidak Lulus');

        // PC
        $Plulus = $lulusT/$items->count();
        $PlulusF = $lulusF/$items->count();

        //PXCI kehadiran
        $hadirT = $this->count1('Kehadiran',$Kehadiran)/$lulusT;
        $hadirF = $this->count2('Kehadiran',$Kehadiran)/$lulusF;

        //PXCI Tugas
        $tugasT = $this->count1('Tugas',$Tugas)/$lulusT;
        $tugasF = $this->count2('Tugas',$Tugas)/$lulusF;

        //PXCI UTS
        $utsT = $this->count1('UTS',$UTS)/$lulusT;
        $utsF = $this->count2('UTS',$UTS)/$lulusF;

        //PXCI UAS
        $uasT = $this->count1('UAS',$UAS)/$lulusT;
        $uasF = $this->count2('UAS',$UAS)/$lulusF;

        //PXCI Nilai
        $nilaiT = $this->count1('Nilai',$Nilai)/$lulusT;
        $nilaiF = $this->count2('Nilai',$Nilai)/$lulusF;

        // pxLulus
        $tLulus = $hadirT*$tugasT*$utsT*$uasT*$nilaiT;
        $fLulus = $hadirF*$tugasF*$utsF*$uasF*$nilaiF;
        
        // px *P
        $hasilT = $tLulus * $Plulus;
        $hasilF = $fLulus * $PlulusF;

        if($hasilT > $hasilF){
            $out = "Lulus";
        }else if($hasilT < $hasilF){
            $out = "Tidak Lulus";
        }else if($hasilT == $hasilF){
            $out = "sama";
        }else{ 
            $out = "Salah";
        }
        return $out;
    }

    private function count($field,$value) {
        return Score::where($field,$value)->count();
    }

    private function count1($field,$value) {
        return Score::where($field,$value)->where('Target','Lulus')->count();
    }

    private function count2($field,$value) {
        return Score::where($field,$value)->where('Target','Tidak Lulus')->count();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        //
    }

}
