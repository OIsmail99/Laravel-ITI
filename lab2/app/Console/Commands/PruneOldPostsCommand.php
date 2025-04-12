<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\PruneOldPostsJob;

class PruneOldPostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:prune';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() //fired when command is run
    {
        PruneOldPostsJob::dispatch(); //dispatching the job to the queue (enqueuing the job)
        //the job itself will be handled by the worker proces, which will be running in the background
        //worker is triggered by the command: php artisan queue:work
        //worker will be running in the background until the command is stopped
        $this->info('Old posts pruning job dispatched!');
    }
}
