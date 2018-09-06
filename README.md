# JSON schema field for Laravel Nova
Laravel Nova field for displaying JSON schema data

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require nsavinov/nova-json-schema-field
```

## Usage
In resource:

```php
use Nsavinov\NovaJsonSchemaField\NovaJsonSchemaField;

public function fields(Request $request)
{
    return [
        // ...
        NovaJsonSchemaField::make('Settings', $this->schema())
                        ->listClass('list-reset'), // optional style class for detailed component
    ];
}

```