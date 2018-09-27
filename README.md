# JSON schema field for Laravel Nova

[![Packagist](https://img.shields.io/packagist/dt/nsavinov/nova-json-schema-field.svg)](https://packagist.org/packages/nsavinov/nova-json-schema-field)

Laravel Nova field for displaying [JSON schema](https://json-schema.org/) data 

<img width="1144" alt="screenshot at sep 06 15-11-54" src="https://user-images.githubusercontent.com/13363510/45156555-4059f880-b1e7-11e8-8f08-3289166c6df3.png">

## Installation

You can install the package into a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require nsavinov/nova-json-schema-field
```

## Usage
Inside the resource:

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

private function schema(): array
{
    return [
        // your schema
    ];
}

```

Schema example:

```json
{
	"type": "object",
	"required": [
		"foo",
		"bar"
	],
	"properties": {
		"bar": {
			"type": "integer"
		},
		"foo": {
			"type": "integer",
			"description": "foo"
		}
	}
}
```
