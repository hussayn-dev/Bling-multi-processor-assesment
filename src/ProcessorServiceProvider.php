<?php

namespace HussDev\Assessment;

use Illuminate\Support\ServiceProvider;

class ProcessorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/processor_config.php',
            'processor_config'
        );

    }

    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../config/processor_config.php' => config_path('processor_config.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_payment_analytics_tables.php.stub' => $this->getMigrationFileName('create_payment_analytics_tables.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_processor_table.php.stub' => $this->getMigrationFileName('create_processor_table.php'),
        ], 'migrations');
    }


}