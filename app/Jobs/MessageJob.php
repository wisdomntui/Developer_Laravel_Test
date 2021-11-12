<?php

namespace App\Jobs;

use App\Actions\NotifyAdminAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new NotifyAdminAction)->call($this->data['request'], $this->data['index']);

        // Criteria for re-dispatch
        if ($this->data['index'] < $this->data['request']->count) {
            $newIndex = ($this->data['index'] + 1);

            // Re-dispatch
            MessageJob::dispatch(['request' => $this->data['request'], 'index' => $newIndex])->delay(now()->addMinutes(1));
        }
    }
}
