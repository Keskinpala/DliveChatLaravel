<?php

namespace App\Http\Controllers;
use Illuminate\Database\MySqlConnection;
use Illuminate\Http\Request;
use App\Models\BtcDataSheet;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as time;
class BtcLoadController extends Controller
{
    public function Index(){
         $AllSite=BtcDataSheet::select(DB::raw('Site,max(BtcTl) as MaxBtcTurkLirasi,min(BtcTl) as MinBtcTurkLirasi,avg(BtcTl) as OrtBtcTurkLirasi
         ,max(BtcUsd) as MaxBtcUsd,min(BtcUsd) as MinBtcUsd,avg(BtcUsd) as OrtBtcUsd
         '))
         ->groupBy('Site')->where('Tarih','>',date('Y-m-d').' 00:00:00')->where('Tarih','<',time::now("Europe/Istanbul"))->get();

         $usdToTl=BtcDataSheet::select(DB::raw('Tarih,max(usdTl) as kur'))
         ->take(1)->where('Tarih','>',date('Y-m-d').' 00:00:00')->groupBy('Tarih')->where('Tarih','<',time::now("Europe/Istanbul"))->get();

         $Graph=BtcDataSheet::select(DB::raw(' cast(Tarih as date) as y,cast(max(cast(BtcTl as DECIMAL(12,2))) as DECIMAL(12,2)) as item1,cast(min(cast(BtcTl as DECIMAL(12,2)))
          as DECIMAL(12,2))as item2,cast(avg(cast(BtcTl as DECIMAL(12,2))) as DECIMAL(12,2)) as item3
         
         '))
         ->groupBy('y')->where('Tarih','>',time::today()->addDays(-7).' 00:00:00')->where('Tarih','<',time::now("Europe/Istanbul"))->get()->toJSON();
         #return dd($Graph);
         return view("Btc")->with('AllSite',$AllSite)->with('usdToTl',$usdToTl)->with('Graph',$Graph);
    }
}
