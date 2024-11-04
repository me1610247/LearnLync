<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User; // Adjust this to your user model

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts.teacher', function ($view) {
            // Assuming you have a way to determine the current user and the latest recipient
            $recipient = $this->getLatestRecipient();
            $view->with('recipient', $recipient);
        });
    }

    protected function getLatestRecipient()
    {
        // Logic to get the latest recipient, e.g., fetching from the database
        // Example: return User::find(1); // Adjust as necessary
        return null; // Replace with actual logic
    }
}
