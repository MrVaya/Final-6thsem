<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SetupEsewaIntegration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:esewa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup eSewa payment integration by running migrations and seeders';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Setting up eSewa payment integration...');

        // Run migrations
        $this->info('Running migrations...');
        Artisan::call('migrate', ['--force' => true]);
        $this->info(Artisan::output());

        // Run venue price seeder
        $this->info('Updating venue prices...');
        Artisan::call('db:seed', [
            '--class' => 'Database\\Seeders\\VenuePriceSeeder',
            '--force' => true
        ]);
        $this->info(Artisan::output());

        $this->info('eSewa payment integration setup completed successfully!');
        $this->info('You can now use the eSewa payment gateway for court bookings.');
        
        return Command::SUCCESS;
    }
}