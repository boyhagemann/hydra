<?php

namespace Boyhagemann\Hydra;

use ML\JsonLD\JsonLD;
use ML\JsonLD\Graph;

class HydraClassFactory
{
	const IRI_SUPPORTED_PROPERTY = 'http://www.w3.org/ns/hydra/core#SupportedProperty';

	/**
	 * @param string $path
	 * @return HydraClass
	 */
	public static function fromPath($path)
	{
		$doc = JsonLD::getDocument($path);
		$graph = $doc->getGraph();
		return static::fromGraph($graph);
	}

	/**
	 * @param Graph $graph
	 * @return HydraClass
	 */
	public static function fromGraph(Graph $graph)
	{
		$class = new HydraClass;
		$class->setProperties(static::findProperties($graph));
		return $class;
	}

	/**
	 * @param Graph $graph
	 * @return array
	 */
	public static function findProperties(Graph $graph)
	{
		$properties = array();

		foreach($graph->getNodesByType(HydraClassFactory::IRI_SUPPORTED_PROPERTY) as $node) {
			$properties[] = HydraPropertyFactory::fromNode($node);
		}

		return $properties;
	}
}

