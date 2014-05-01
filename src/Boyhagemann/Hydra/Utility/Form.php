<?php

namespace Boyhagemann\Hydra\Utility;

use Boyhagemann\Hydra\HydraClass;

/**
 * Class Form
 *
 * @package Boyhagemann\Hydra\Utility
 */
class Form
{
	/**
	 * @var Array
	 */
	protected $mapping;

	/**
	 * @var Array
	 */
	protected $elements;

	/**
	 * @var mixed
	 */
	protected $build;

	/**
	 * Map a property type to an element
	 *
	 * @param string $iri
	 * @param $element
	 */
	public function map($iri, $element)
	{
		$this->mapping[$iri] = $element;
	}

	/**
	 * Build the form element html
	 *
	 * @param string $name
	 * @param $callback
	 */
	public function element($name, $callback)
	{
		$this->elements[$name] = $callback;
	}

	/**
	 * Build the form html. The callback contains
	 * an array with form element html.
	 *
	 * @param $callback
	 */
	public function build($callback)
	{
		$this->build = $callback;
	}

	/**
	 * Render a form based on a Hydra object.
	 *
	 * @param HydraClass $hydra
	 * @return string
	 */
	public function render(HydraClass $hydra)
	{
		$elements = array();

		foreach($hydra->getProperties() as $property) {

			$name = $property->getName();
			$element = $this->mapping[$name];
			$callback = $this->elements[$element];
			$elements[] = call_user_func_array($callback, array($property));
		}

		return call_user_func_array($this->build, compact('elements'));
	}
}
