<?php

namespace Boyhagemann\Hydra;

use ML\JsonLD\Node;

class HydraPropertyFactory
{
	/**
	 * @param Node $node
	 * @return HydraProperty
	 */
	public static function fromNode(Node $node)
	{
		$property = new HydraProperty;

		foreach($node->getProperties() as $key => $prop) {

			switch($key) {

				case 'http://www.w3.org/ns/hydra/core#property':
					$property->name($prop->getId());
					break;

				case 'http://www.w3.org/ns/hydra/core#title':
					$property->title($prop->getValue());
					break;

				case 'http://www.w3.org/ns/hydra/core#description':
					$property->description($prop->getValue());
					break;

				case 'http://www.w3.org/ns/hydra/core#required':
					$property->isRequired($prop->getValue());
					break;

				case 'http://www.w3.org/ns/hydra/core#readonly':
					$property->isReadOnly($prop->getValue());
					break;

				case 'http://www.w3.org/ns/hydra/core#writeonly':
					$property->isWriteOnly($prop->getValue());
					break;
			}

		}

		return $property;
	}
}
