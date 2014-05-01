## Hydra

[Hydra](http://www.markus-lanthaler.com/hydra) is an effort to simplify the development of interoperable, hypermedia-driven Web APIs. The two fundamental building blocks of Hydra are JSON‑LD and the Hydra Core Vocabulary.

JSON‑LD is the serialization format used in the communication between the server and its clients. The Hydra Core Vocabulary represents the shared vocabulary between them. By specifying a number of concepts which are commonly used in Web APIs it can be used as the foundation to build Web services that share REST's benefits in terms of loose coupling, maintainability, evolvability, and scalability. Furthermore it enables the creation of generic API clients instead of requiring specialized clients for every single API.

This package provides simple wrapper classes to read JSON-LD config and presents them as Hydra objects.
You can then use the Form utility class to render an HTML form based on the Hydra properties.

## Reading the JSON-LD file
The config file can return an object that represents the json structure.
For now, only a Hydra Class and its Supported Properties can be read.

```php
$hydra = HydraClassFactory::fromPath('path/to/your/config.jsonld');

// Get all supported properties
$hydra->getProperties(); // returns an array of HydraProperty objects
```

## Utility classes

### Form
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


## Todo

- [ ] Add a Grid or List utility class
- [ ] Implement Members
