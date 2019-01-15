# FOREM

[![Total Downloads](https://poser.pugx.org/syscover/pulsar-forem/downloads)](https://packagist.org/packages/syscover/pulsar-forem)

## Installation

Before install sycover/pulsar-forem, you need install syscover/pulsar-core and syscover/pulsar-admin

**1 - After install Laravel framework, execute on console:**
```
composer require syscover/pulsar-forem
```

Register service provider, on file config/app.php add to providers array
```
Syscover\Forem\ForemServiceProvider::class,
```

**2 - Execute publish command**
```
php artisan vendor:publish --provider="Syscover\Forem\ForemServiceProvider"
```
and
```
composer dump-autoload
```

**3 - And execute migrations and seed database**
```
php artisan migrate
php artisan db:seed --class="ForemTableSeeder"
```

**4 - Execute command to load all updates**
```
php artisan migrate --path=vendor/syscover/pulsar-crm/src/database/migrations/updates
```
