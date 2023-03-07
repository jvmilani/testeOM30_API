<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Models\Patient;

class PatientCsvQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $header;
    public $data;

    public function __construct($data, $header)
    {
        $this->data = $data;
        $this->header = $header;
    }

    public function handle()
    {
        foreach ($this->data as $sale) {
            $sellData = array_combine($this->header,$sale);
            Patient::create($sellData);
        }
    }
}
