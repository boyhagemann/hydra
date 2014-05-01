<?php

namespace Boyhagemann\Hydra;

class HydraClass
{
	protected $properties = array();
	protected $members = array();
	protected $operations = array();

	public function setProperty(HydraProperty $property)
	{
		$this->properties[] = $property;
	}

	public function setProperties(Array $properties)
	{
		foreach($properties as $property) {
			$this->setProperty($property);
		}
	}

	public function getProperties()
	{
		return $this->properties;
	}
}
