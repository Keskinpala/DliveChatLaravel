<?php

namespace App\Http\Controllers;
use Illuminate\Database\MySqlConnection;
use Illuminate\Http\Request;
use App\Models\DliveDetay;
use App\Models\DliveChat;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as time;

class DliveController extends Controller
{
    public function Index(){
        $Graph=DliveDetay::select(DB::raw(' Gun as y, Limon as item1, KasaLimon as item2, SubCount as item3
       '))
       ->where('Gun','>',time::today()->addDays(-30)->format('Y/m/d'))->where('Gun','<=',time::today()->format('Y/m/d'))->get()->toJSON();
        return view("Dlive")->with('Graph',$Graph);
   }

    public function Stream()
    {
        $DliveYayin = new DliveDetay;

        $DliveYayin->Gun = request('YayinGunu');
        $DliveYayin->Saniye = request('YayinSaat')->format('h')*60*60+request('YayinSaat')->format('m');
        $DliveYayin->Limon = request('Limon');
        $DliveYayin->KasaLimon = request('KasaLimon');
        $DliveYayin->SubCount = request('SubCount');
        $DliveYayin->HesapLimonCount = request('HesapLimonCount');
    
        $DliveYayin->save();
        $Graph=DliveDetay::select(DB::raw(' Gun as y, Limon as item1, KasaLimon as item2, SubCount as item3
       '))
       ->where('Gun','>',time::today()->addDays(-30)->format('Y/m/d'))->where('Gun','<=',time::today()->format('Y/m/d'))->get()->toJSON();
        return view("Dlive")->with('Graph',$Graph);
    }
    public function chatGet(){
        $data = DliveChat::where("isReaded",'=',"0")->get();
        $changeData="";
        foreach($data as $item){
            $changeData= $changeData . $item->id.",";  
        }
        $changeData=substr($changeData,0,strlen($changeData)-1);
        $changeData=  explode(',',$changeData);   
        DliveChat::whereIn('id',$changeData)->update(["isReaded"=>1]);
        return response()->json(array('data'   => $data)); 
    }
    public function DliveChat(){
       
        return view("DliveChat"); 
    }
    public function DliveDetay(){
       
        return view("DliveDetay"); 
    }
    public function GetGun(){
       
        return view("Dlivedetay"); 
    }
    
}
