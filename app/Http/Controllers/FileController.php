<?php

namespace App\Http\Controllers;

use App\Models\TrainingPath;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FileController extends Controller
{
    public function import(Request $request){
        $request->validate([
            'patient_id' => 'required|integer',
            'file' => 'required',
            'type' => ['required',Rule::in([TrainingPath::arus,TrainingPath::kecepatan,TrainingPath::trayektori])],
        ]);
        try {
            if($request->file('file')){
                $file = $request->file('file');
                DB::beginTransaction();
                $onlyName = explode(".",$file->getClientOriginalName())[0];
                // nama file saat disimpan di server
                $fileName = $request->type.'-'.auth()->user()->id.'-'. Carbon::now()->format('ymd').'.'. $file->getClientOriginalExtension();
                // namatraining-id-tanggal
                $filePath = './newFile';
                $trainPath=TrainingPath::create([
                    'patient_id' => 1,
                    'path_name' => $filePath.'/'.$fileName,
                    'path_size' => $file->getSize(),
                    'type' => $request->type,
                ]);
                $file->storeAs($filePath, $fileName);
                DB::commit();
                return back()->with('status','Import File Success');
            }
            return back()->with('error','Import File Not Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
        
    }

    public function processFile(Request $request){
        $data=[];
        foreach (TrainingPath::arrayType as $value) {
            $temp = TrainingPath::where('patient_id', $request->patient_id)->where('type',$value)->first(); 
            if($temp){
                if($value == TrainingPath::trayektori){
                    $data["$value"] = $this->processTrayektoriFile($temp->path_name);
                }
                if($value == TrainingPath::arus){
                    $data["$value"] = $this->processArusFile($temp);
                }
                if($value == TrainingPath::kecepatan){
                    $data["$value"] = $this->processKecepatanFile($temp);
                }
            }   
            
        }
        $response = [
            'trayektori'=> $data,
        ];
        return response()->json($data);
    }

    public function processArusFile($pathFile){
        return null;
    }

    public function processKecepatanFile($pathFile){
        return null;
    }

    public function processTrayektoriFile($pathFile){
        $path = Storage::path($pathFile);
        $lines = File::lines($path);
//         time(s)	shldr	elbow	error	realtime(s)
// -3	57,6	180,3	-62,660	0,000
// -2,98	58,2	176,3	-58,180	0,000
        $time = [];
        $shoulder = [];
        $elbow = [];
        $error = [];
        $realTime = [];
        
        $lines = $lines->toArray();
        for ($i=1; $i < count($lines)-1; $i++) { 
            $arr = explode("\t",$lines[$i]);
            
            // tanda @ pada @$arr dipakai jika nilai $arry==null agar tidak ada error
            array_push($time,$this->replaceComa(@$arr[0]));
            array_push($shoulder,$this->replaceComa(@$arr[1]));
            array_push($elbow,$this->replaceComa(@$arr[2]));
            array_push($error,$this->replaceComa(@$arr[3]));
            array_push($realTime,$this->replaceComa(@$arr[4]));
        }
        return [
            'time' => $time,
            'shoulder' => $shoulder,
            'elbow' => $elbow,
            'error' => $error,
            'realTime' => $realTime,
        ];
    }

    public function replaceComa($strVar){
        $res = str_replace(',','.',$strVar);
        return $res;
    }
}
