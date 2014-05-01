<?php

namespace Boyhagemann\Hydra;

class HydraProperty
{
	protected $name;
	protected $title;
	protected $description;
	protected $required;
	protected $readOnly;
	protected $writeOnly;

	/**
	 * @param string $name
	 * @return $this
	 */
	public function name($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function title($title)
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @param string $description
	 * @return $this
	 */
	public function description($description)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @param bool $required
	 * @return $this
	 */
	public function required($required = true)
	{
		$this->required = (bool) $required;
		return $this;
	}

	/**
	 * @param bool $readOnly
	 * @return $this
	 */
	public function readOnly($readOnly = true)
	{
		$this->readOnly = (bool) $readOnly;
		return $this;
	}

	/**
	 * @param bool $writeOnly
	 * @return $this
	 */
	public function writeOnly($writeOnly = true)
	{
		$this->writeOnly = (bool) $writeOnly;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return bool
	 */
	public function isRequired()
	{
		return $this->required;
	}

	/**
	 * @return bool
	 */
	public function isReadOnly()
	{
		return $this->readOnly;
	}

	/**
	 * @return bool
	 */
	public function isWriteOnly()
	{
		return $this->writeOnly;
	}


	/**
	 * @param $property
	 * @return mixex
	 */
	public function __get($property)
	{
		$method = 'get' . ucfirst($property);
		if(method_exists($this, $method)) {
			return $this->$method();
		}
	}
}

