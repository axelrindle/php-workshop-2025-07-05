<?php

namespace App\Jobs;

use App\Models\TodoItem;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DeleteRandomTodo implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $amount = TodoItem::query()->count();
        $randomIndex = random_int(0, $amount);

        $item = TodoItem::query()->offset($randomIndex)->firstOrFail();

        $item->delete();
    }
}
