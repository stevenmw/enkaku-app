<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Imports\ArusImport;
use App\Models\TrainingPath;
use Illuminate\Http\Request;
use App\Imports\TorqueImport;
use App\Imports\VelocityImport;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|integer',
            'file' => 'required',
            'type' => ['required', Rule::in([TrainingPath::arus, TrainingPath::kecepatan, TrainingPath::trayektori, TrainingPath::torque])],
        ]);
        try {
            if ($request->file('file')) {
                $file = $request->file('file');
                DB::beginTransaction();
                $onlyName = explode(".", $file->getClientOriginalName())[0];
                // nama file saat disimpan di server
                $fileName = $request->type . '-' . auth()->user()->id . '-' . Carbon::now()->format('ymd') . '.' . $file->getClientOriginalExtension();
                // namatraining-id-tanggal

                switch ($request->type) {
                    case TrainingPath::trayektori:
                        $filePath = './File/Trayektori';
                        break;

                    case TrainingPath::arus:
                        $filePath = './File/Arus';
                        break;

                    case TrainingPath::kecepatan:
                        $filePath = './File/Kecepatan';
                        break;

                    case TrainingPath::torque:
                        $filePath = './File/Torque';
                        break;

                    default:
                        $filePath = './File';
                        break;
                }
                $trainPath = TrainingPath::create([
                    'patient_id' => $request->patient_id,
                    'file_name' => $fileName,
                    'path_name' => $filePath . '/' . $fileName,
                    'path_size' => $file->getSize(),
                    'type' => $request->type,
                ]);
                $file->storeAs($filePath, $fileName);
                DB::commit();
                return back()->with('status', 'Import File Success');
            }
            return back()->with('error', 'Import File Not Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function importApi(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|integer',
            'file' => 'required',
            'type' => ['required', Rule::in([TrainingPath::arus, TrainingPath::kecepatan, TrainingPath::trayektori])],
        ]);
        try {
            if ($request->file('file')) {
                $file = $request->file('file');
                DB::beginTransaction();
                $onlyName = explode(".", $file->getClientOriginalName())[0];
                // nama file saat disimpan di server
                $fileName = $request->type . '-' . $request->patient_id . '-' . Carbon::now()->format('ymd') . '.' . $file->getClientOriginalExtension();
                // namatraining-id-tanggal

                switch ($request->type) {
                    case TrainingPath::trayektori:
                        $filePath = './File/Trayektori';
                        break;

                    case TrainingPath::arus:
                        $filePath = './File/Arus';
                        break;

                    case TrainingPath::kecepatan:
                        $filePath = './File/Kecepatan';
                        break;

                    case TrainingPath::torque:
                        $filePath = './File/Torque';
                        break;

                    default:
                        $filePath = './File';
                        break;
                }
                $trainPath = TrainingPath::create([
                    'patient_id' => $request->patient_id,
                    'file_name' => $fileName,
                    'path_name' => $filePath . '/' . $fileName,
                    'path_size' => $file->getSize(),
                    'type' => $request->type,
                ]);
                $file->storeAs($filePath, $fileName);
                DB::commit();
                // return back()->with('status', 'Import File Success');
                return response()->json([
                    'message' => 'success import',
                ], 200);
            }
            // return back()->with('error', 'Import File Not Success');
            return response()->json([
                'message' => 'failed'
            ], 400);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function processFile(Request $request)
    {
        $data = null;
        // foreach (TrainingPath::arrayType as $value) {
        //     $temp = TrainingPath::where('patient_id', $request->patient_id)->where('type',$value)->first(); 
        //     if($temp){
        //         if($value == TrainingPath::trayektori){
        //             $data= $this->processTrayektoriFile($temp->path_name);
        //         }
        //         if($value == TrainingPath::arus){
        //             $data = $this->processArusFile($temp->path_name);
        //         }
        //         if($value == TrainingPath::kecepatan){
        //             $data = $this->processKecepatanFile($temp->path_name);
        //         }
        //     }   

        // }
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 400,
                'error' => $validator->errors()->first(),
            ], 400);
        }

        $temp = TrainingPath::where('patient_id', $request->patient_id)->where('type', $request->type)
            ->where('id', $request->file_name)->first();

        if (!$temp) {
            return response()->json([
                'code' => 400,
                'error' => 'file training not found',
            ], 400);
        }

        if ($request->type == TrainingPath::kecepatan) {
            $data = $this->processKecepatanFile($temp->path_name);
        }
        if ($request->type == TrainingPath::arus) {
            $data = $this->processArusFile($temp->path_name);
        }
        if ($request->type == TrainingPath::trayektori) {
            $data = $this->processTrayektoriFile($temp->path_name);
        }
        if ($request->type == TrainingPath::torque) {
            $data = $this->processTorqueFile($temp->path_name);
        }

        return response()->json($data);
    }

    public function downloadFile(Request $request)
    {
        $path = null;
        $temp = TrainingPath::where('patient_id', $request->patient_id)->where('type', $request->type)
            ->where('id', $request->file_name)->first();
        // $temp = TrainingPath::where('patient_id', $request->patient_id)->where('type', $request->type)->first();

        if (!$temp) {
            return back()->with('error', 'File Training Not Found');
        }

        // if ($request->type == TrainingPath::kecepatan) {
        //     $path = $this->processKecepatanFile($temp->path_name);
        // }
        // if ($request->type == TrainingPath::arus) {
        //     $path = $this->processArusFile($temp->path_name);
        // }
        // if ($request->type == TrainingPath::trayektori) {
        //     $path = $this->processTrayektoriFile($temp->path_name);
        // }

        $file = Storage::download($temp->path_name, $temp->file_name);
        return $file;
    }

    public function processArusFile($pathFile)
    {
        $path = Storage::path($pathFile);
        $data = Excel::toArray(new ArusImport, $path);
        $data = $data[0];
        $timeFlekNoVol = [];
        $arusFlekNoVol = [];
        $timeEksNoVol = [];
        $arusEksNoVol = [];
        $timeFlekVol = [];
        $arusFlekVol = [];
        $timeEksVol = [];
        $arusEksVol = [];

        for ($i = 2; $i < count($data); $i++) {
            array_push($timeFlekNoVol, $data[$i][0]);
            array_push($arusFlekNoVol, $data[$i][1]);
            array_push($timeEksNoVol, $data[$i][3]);
            array_push($arusEksNoVol, $data[$i][4]);
            array_push($timeFlekVol, $data[$i][6]);
            array_push($arusFlekVol, $data[$i][7]);
            array_push($timeEksVol, $data[$i][9]);
            array_push($arusEksVol, $data[$i][10]);
        }

        $response = [
            'timeFlekNoVol' => $timeFlekNoVol,
            'arusFlekNoVol' => $arusFlekNoVol,
            'timeEksNoVol' => $timeEksNoVol,
            'arusEksNoVol' => $arusEksNoVol,
            'timeFlekVol' => $timeFlekVol,
            'arusFlekVol' => $arusFlekVol,
            'timeEksVol' => $timeEksVol,
            'arusEksVol' => $arusEksVol,
        ];

        return $response;
    }

    public function processKecepatanFile($pathFile)
    {
        $path = Storage::path($pathFile);
        $excel = Excel::toArray(new VelocityImport, $path);
        $data = $excel[0];
        $velocity = [];
        $velocityConv = [];
        $setPoint = [];
        $xData = [];
        $x = 0;

        $i = 1;
        while ($data[$i][41]) {
            array_push($velocity, $data[$i][39]);
            array_push($velocityConv, $data[$i][40]);
            array_push($setPoint, $data[$i][41]);
            array_push($xData, $x);
            $x++;
            $i++;
        }

        $result = [
            'velocity' => $velocity,
            'velocityConv' => $velocityConv,
            'setPoint' => $setPoint,
            'xData' => $xData,
        ];

        return $result;
    }

    public function processTrayektoriFile($pathFile)
    {
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
        for ($i = 1; $i < count($lines) - 1; $i++) {
            $arr = explode("\t", $lines[$i]);

            // tanda @ pada @$arr dipakai jika nilai $arry==null agar tidak ada error
            array_push($time, $this->replaceComa(@$arr[0]));
            array_push($shoulder, $this->replaceComa(@$arr[1]));
            array_push($elbow, $this->replaceComa(@$arr[2]));
            array_push($error, $this->replaceComa(@$arr[3]));
            array_push($realTime, $this->replaceComa(@$arr[4]));
        }
        return [
            'time' => $time,
            'shoulder' => $shoulder,
            'elbow' => $elbow,
            'error' => $error,
            'realTime' => $realTime,
        ];
    }

    public function processTorqueFile($pathFile)
    {
        $path = Storage::path($pathFile);
        $data = Excel::toArray(new TorqueImport, $path);
        $data = $data[0];
        $jointAngle_Shoulder_Flex_Exten = [];
        $maximumJointTorque_Shoulder_Flex = [];
        $maximumJointTorque_Shoulder_Exten = [];
        $jointAngle_Shoulder_Abduc_Adduc = [];
        $maximumJointTorque_Shoulder_Abduc = [];
        $maximumJointTorque_Shoulder_Adduc = [];
        $jointAngle_Elbow_Flex_Exten = [];
        $maximumJointTorque_Elbow_Flex = [];
        $maximumJointTorque_Elbow_Exten = [];

        for ($i = 2; $i < count($data); $i++) {
            array_push($jointAngle_Shoulder_Flex_Exten, $data[$i][0]);
            array_push($maximumJointTorque_Shoulder_Flex, $data[$i][1]);
            array_push($maximumJointTorque_Shoulder_Exten, $data[$i][2]);
            array_push($jointAngle_Shoulder_Abduc_Adduc, $data[$i][4]);
            array_push($maximumJointTorque_Shoulder_Abduc, $data[$i][5]);
            array_push($maximumJointTorque_Shoulder_Adduc, $data[$i][6]);
            array_push($jointAngle_Elbow_Flex_Exten, $data[$i][8]);
            array_push($maximumJointTorque_Elbow_Flex, $data[$i][9]);
            array_push($maximumJointTorque_Elbow_Exten, $data[$i][10]);
        }

        $response = [
            'jointAngle_Shoulder_Flex_Exten' => $jointAngle_Shoulder_Flex_Exten,
            'maximumJointTorque_Shoulder_Flex' => $maximumJointTorque_Shoulder_Flex,
            'maximumJointTorque_Shoulder_Exten' => $maximumJointTorque_Shoulder_Exten,
            'jointAngle_Shoulder_Abduc_Adduc' => $jointAngle_Shoulder_Abduc_Adduc,
            'maximumJointTorque_Shoulder_Abduc' => $maximumJointTorque_Shoulder_Abduc,
            'maximumJointTorque_Shoulder_Adduc' => $maximumJointTorque_Shoulder_Adduc,
            'jointAngle_Elbow_Flex_Exten' => $jointAngle_Elbow_Flex_Exten,
            'maximumJointTorque_Elbow_Flex' => $maximumJointTorque_Elbow_Flex,
            'maximumJointTorque_Elbow_Exten' => $maximumJointTorque_Elbow_Exten,
        ];

        return $response;
    }

    public function replaceComa($strVar)
    {
        $res = str_replace(',', '.', $strVar);
        return $res;
    }
}
