<?php

namespace App\Http\Controllers\Api\Patients;

use App\Http\Controllers\Controller;
use App\Models\Doctors;
use App\Models\Patients;
use App\Models\Sensors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SensorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    private function sendNotification(Request $request)

    { 
        $body = " ";
        
        $firebaseToken = Doctors::whereNotNull('device_token')->pluck('device_token')->all();
        $SERVER_API_KEY = 'AAAAXV426tk:APA91bHtqNVU4U63DTWNk7Ljl2XyPWLWVzhH8o3sKjghAxJaXxLTmtIi-MXNkBN_kTr6jUF3bgtHdSAC9s9Va8xw8BN8KrZcrqgcJzRZ9E5AamsPdb73_5sKe2yqcU1ltsPCXHKjCHVH';
        if ($request['spo2'] >= 120) {
            $info = "spo for this patient is very high";
            $body .= $info;
        } elseif ($request['spo2'] <= 75) {
            $info = "spo for this patient is very low";
            $body .= $info;
        }

        if ($request['heartRate'] >= 190) {
            $info2 = "heartRate for this patient is very high";
            $body .= $info2;
        } elseif ($request['heartRate'] <= 60) {
            $info2 = "heartRate for this patient is very low";
            $body .= $info2;
        }

        if ($request['temp'] >= 190) {
            $info3 = "temprature for this patient is very high";
            $body .= $info3;
        } elseif ($request['temp'] <= 60) {
            $info3 = "temprature for this patient is very low";
            $body .= $info3;
        }

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => "attention!!!",
                "body" => $body
            ] ,   "data" => [
                "click_action" => "FLUTTER_NOTIFICATION_CLICK",
                "patient_id"=>Auth()->user()->id
            ]

        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
      return  $response = curl_exec($ch);
    }












    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $patient = Patients::find(Auth()->user()->id);
        $sensor = new Sensors();
        $sensor->spo2 = $request['spo2'];
        $sensor->heartRate = $request['heartRate'];
        $sensor->temp = $request['temp'];
        $patient->sensors()->save($sensor);

        $res= $this->sendNotification($request);
        $ids = [];
        $count = $patient->sensors()->count();

        $deleteUs = $patient->sensors()->latest()->take($count)->skip(10)->get();

        foreach ($deleteUs as $deleteMe) {
            $ids[] = $deleteMe->id;
        }

        Sensors::destroy($ids);
        return response()->json([$patient->sensors()->get(),"res"=>$res]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
