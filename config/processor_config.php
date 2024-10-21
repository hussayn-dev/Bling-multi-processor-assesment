<?php

return [

    'models' => [

        /*
         * This section defines the models used for processor configuration and payment handling.
         *
         * contract and handle payment-related data.
         */

        'processor_configuration' => Bling\Assessment\Models\Processor::class,
        'payment' => Bling\Assessment\Models\PaymentAnalytics::class,

    ],

    'processors' => [
         /*
         * This section defines the processors used for payment handling.
         * add your class here an array of name as key and class as value
         */

        'coral_pay' => new \Bling\Assessment\Services\CoralPayService,
        'paypal' => new \Bling\Assessment\Services\PaypalService,
        'stripe' => new \Bling\Assessment\Services\StripeService,
        'paystack'=> new \Bling\Assessment\Services\PaystackService,
    ],

    /*
     * This section includes mock configurations required for the implementation.
     * Developers should add their own array values for each mock setup.
     *
     * - 'mock_a': This is the default mock configuration for this implementation.
     * - 'mock_b', 'mock_c', 'mock_d': These are alternative mock configurations.
     *
     * To switch between clients, use the 'active' key to specify the currently active client.
     *
     * Example:
     * - To use 'mock_b' instead of 'mock_a', set 'active' => 'mock_b'.
     */

    'clients' => [

        'mock_a' => [
            'secret' => "",
            'hash_key' => "",
            'token' => ""
        ],

        'mock_b' => [
            'secret' => "",
            'key' => "",
            'token' => ""
        ],

        'mock_c' => [
            'secret' => "",
            'key' => "",
            'token' => ""
        ],

        'mock_d' => [
            'hash_key' => "",
            'key' => "",
            'token' => ""
        ],

    ],

    /*
     * The 'active_mock' key specifies which mock setup to use in the application.
     * Set this value to one of 'mock_a', 'mock_b', 'mock_c', or 'mock_d'.
     *
     * Default: 'mock_a'
     */

];
