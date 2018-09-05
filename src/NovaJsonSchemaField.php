<?php

declare(strict_types=1);

namespace Nsavinov\NovaJsonSchemaField;

use Laravel\Nova\Fields\Code;

class NovaJsonSchemaField extends Code
{
    public $component = 'nova-json-schema-field';

    public function __construct(string $name, array $schema, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->json();
        $this->loadSchema($schema);
        $this->displayUsing(function ($value) {
            return optional($value)->toArray();
        });
    }

    public function listClass(string $listClass = ''): NovaJsonSchemaField
    {
        return $this->options(compact('listClass'));
    }

    public function loadSchema(array $schema = []): NovaJsonSchemaField
    {
        return $this->options(compact('schema'));
    }

}
