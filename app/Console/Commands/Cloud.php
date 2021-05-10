<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Cloud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'patientData:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that send patients data to cloud';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $responce= Http::withHeaders([
          'Content-Type'=>'application/json',
          'Accept'=>'application/json',
          'Authorization'=>'Bearer kQ43eLyynsHqbz4sOykxAI3zQJAvJQPFffdtRs7EsEIK5DRLt55M55QDAGgKPGF9a9uQEzqMSY7kYABRwMIy4bUWEENfxYF8qMpD'
      ])->post('http://127.0.0.1:8000/api/DRpatient'
      ,[
           'national_id'=>'444444444444444',
           'name'=>'hazenm',
           'password'=>'123456789',
           'phoneNumber'=>'123456789',
           'address'=>'dkgdkgdgj',
           'birth_date'=>'2021-11-22',
           'age'=>'33' ,
           'height'=>'44',
           'weight'=>'33',
           'bloodType'=>'a+',
           'diseases'=>'kdgjdlg',
           'medicines'=>'kshfksfoewt',
           'allergies'=>'ldlsgj',
           'disabilities'=>'jshdjfdsi'
       ]
    );
      

    dd($responce->body());

    }
}
