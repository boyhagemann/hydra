<?php

namespace Boyhagemann\Hydra\Utility;

class Form
{
	protected $mapping;

	protected $elements;

	protected $build;

	public function map($iri, $element)
	{
		$this->mapping[$iri] = $element;
	}

	public function element($name, $callback)
	{
		$this->elements[$name] = $callback;
	}

	public function build($callback)
	{
		$this->build = $callback;
	}

	/**
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
