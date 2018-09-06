# JSON schema field for Laravel Nova
Laravel Nova field for displaying JSON schema data (https://json-schema.org/)

<img width="566" alt="screenshot at sep 06 15-00-20" src="https://user-images.githubusercontent.com/13363510/45156038-9e85dc00-b1e5-11e8-85ce-8e8864e53d75.png">

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
