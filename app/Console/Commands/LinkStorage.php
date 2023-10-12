<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;

class LinkStorage extends Command
{
    protected $signature = 'link:storage';
    protected $description = 'Create a symbolic link from "public/storage" to "storage/app/public"';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Creating storage link...');
        \Artisan::call('storage:link');
        $this->info('Storage link created successfully.');
    }
}

