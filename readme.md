## Hydra

This package is based on Hydra.
It uses JSON-LD to link API resources together.
With Hydra you can define your resources.

#### Reading the json-ld file
The config file can return an object that represents the json structure.
For now, only a Hydra Class and its Supported Properties can be read.

```php
$hydra = HydraClassFactory::fromPath('path/to/your/config.jsonld');

// Get all supported properties
$hydra->getProperties(); // returns an array of HydraProperty objects
```


## Form
The Form class can build a HTML form based on the Hydra config file.

#### Adding elements
Elements are nothing more than a callback.
This callback must return a string value, usually a HTML form element representation.
The callback receive a `Boyhagemann\Hydra\HydraProperty` which contains useful information to render the HTML.
```php
$form->element('text', function($property) {
	return sprintf('<input type="text" name="%s">', $property->getName());
});
```

#### Mapping elements
Every property type can be mapped to an element.
```php
$form->map('http://schema.org/name', 'text'); // We have added 'text' as an element earlier.
```

#### Building the form
The form HTML itself can also be build with a callback.
You can use your favorite rendering engine to nicely render your form template.
```php
$form->build(function(Array $elements) {

	$form = '<form method="POST">';
	$form .= implode(PHP_EOL, $elements);
	$form .= '</form>';

	return $form;
});
```