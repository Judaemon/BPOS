<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SampleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $text;
    /**
     * Create a new job instance.
     */
    public function __construct(string $text = null)
    {
        $this->text = $text;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        sleep(5);
        return strtoupper($this->text);
    }
}
