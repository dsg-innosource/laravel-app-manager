<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lam:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new LAM user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('LAM: Creating a new user');
        $name = $this->ask('Enter a name:');
        $email = $this->ask('Enter an email address:');
        $pass = $this->secret('Enter a password:');

        $validator = Validator::make([
            'name' => $name,
            'email' => $email,
            'password' => $pass,
        ], [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ], [
            'name.required' => 'Please enter a name',
            'email.required' => 'Please enter an email address',
            'email.unique' => 'That email address is already in use',
            'password.required' => 'Please enter a password',
        ]);

        if ($validator->fails()) {
            $this->info('User not created. See error messages below:');

            foreach ($validator->errors()->all() as $error) {
                $this->error($error);
            }

            return self::FAILURE;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($pass),
        ]);

        $this->info('LAM: User Created');
        
        return self::SUCCESS;
    }
}
