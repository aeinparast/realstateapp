<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user for the application';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (User::where('role', 0)->count() != 0) {
            $this->error('An admin is already in database');
            return 0;
        }
        // Ask for admin details
        $name = $this->ask('What is the name of the admin?');
        $email = $this->ask('What is the email of the admin?');
        $password = $this->ask('What is the password for the admin?');



        // Create the admin user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 0,
        ]);

        if ($user) {
            $this->info('Admin user created successfully!');
        } else {
            $this->error('Failed to create the admin user.');
        }

        return 0;
    }
}
