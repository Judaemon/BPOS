<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunSampleJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-sample-job {text}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch a sample job with the given text.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $text = $this->argument('text');
        $this->info("Dispatching a sample job with the text: $text");

        dispatch(new \App\Jobs\SampleJob($text));
    }
}
