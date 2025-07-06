<?php

use App\Jobs\DeleteRandomTodo;
use Illuminate\Support\Facades\Schedule;

Schedule::job(DeleteRandomTodo::class)->everyMinute();
