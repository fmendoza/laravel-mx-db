# Laravel Mxdb


Mxdb is a package for Laravel 4, providing the states and cities of Mexico.


## Installation

Add `fmendoza/mxdb` to `composer.json`.

    "fmendoza/mxdb": "dev-master"
    
Run `composer update` to pull down the latest version.

Edit `app/config/app.php` and add the `provider`

    'providers' => array(
        'Fmendoza\Mxdb\MxdbServiceProvider',
    )

Now add the alias.

    'aliases' => array(
        'State' => 'Fmendoza\Mxdb\StateFacade',
        'City' => 'Fmendoza\Mxdb\CityFacade',
    )
    

## Model

This is an optional step, it contains the tables name and does not need to be altered. If the default name `states` and `cities` suits you, leave it. Otherwise run the following command

    $ php artisan config:publish fmendoza/mxdb

Next generate the migration file:

    $ php artisan mxdb:migration
    
It will generate the `<timestamp>_setup_states_table.php` and `<timestamp>_setup_cities_table.php` migrations and the `MexicoSeeder.php` seeder. To make sure the data is seeded insert the following code in the `seeds/DatabaseSeeder.php`

    $this->call('MexicoSeeder');
    $this->command->info('Seeded the states and cities!'); 

You may now run it with the artisan migrate command:

    $ php artisan migrate --seed
    
After running this command the filled states and cities tables will be available