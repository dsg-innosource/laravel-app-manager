<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;

class InstallLAM extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lam:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup and configure LAM';

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
        if (! config('lam.api_prefix')) {
            file_put_contents(app()->environmentFilePath(), "\r\nLAM_API_PREFIX=" . Uuid::uuid4()->toString(), FILE_APPEND);
        }

        return self::SUCCESS;
    }
}
