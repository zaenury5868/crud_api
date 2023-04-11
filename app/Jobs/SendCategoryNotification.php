<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Category;
use App\Mail\SendCategory;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendCategoryNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $body;
    protected $user;
    protected $type;
    public function __construct(array $body, User $user, string $type)
    {
        $this->body = $body;
        $this->user = $user;
        $this->type = $type;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->type == 'created') {
            Mail::to($this->user->email)->send(new SendCategory($this->body));
        } else if ($this->type == 'deleted') {
            Mail::to($this->user->email)->send(new SendCategory($this->body));
        }
    }
}
