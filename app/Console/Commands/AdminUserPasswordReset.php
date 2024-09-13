<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminUserPasswordReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:admin-user-password-reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (User::where('role', 0)->count() == 0) {
            $this->error('There is no admin in database.');
            return 0;
        }
        // Ask for admin details
        $sec = $this->ask('give me the secret word:');
        if ($sec != '981111') {
            $this->error('Sec is wrong!!!!');
            return 0;
        }
        $password = $this->ask('Please give me the new password:');
        $user = User::where('role', 0)->first();

        // Create the admin user
        $user->password = Hash::make($password);
        $user->save();

        if ($user) {
            $this->info('User was updated!');
        } else {
            $this->error('Failed to change the admin user.');
        }

        return 0;
    }
}
