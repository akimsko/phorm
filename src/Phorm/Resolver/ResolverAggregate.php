<?php

/*
 * This file is part of the Phorm project.
 *
 * @link https://github.com/akimsko/phorm
 *
 * @copyright Copyright 2014 Bo Thinggaard
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phorm\Resolver;

use Phorm\Element\Element;

/**
 * Class ResolverAggregate
 *
 * @package Phorm\Resolver
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class ResolverAggregate {

	/** @var Resolver[] */
	private $resolvers = array();

	/**
	 * Register resolver.
	 *
	 * @param Resolver $resolver
	 *
	 * @return $this
	 */
	public function registerResolver(Resolver $resolver) {
		$this->resolvers[] = $resolver;
		return $this;
	}

	/**
	 * Resolve template for element.
	 *
	 * @param Element $element
	 *
	 * @return null|string
	 */
	public function resolve(Element $element) {
		$result = null;
		foreach ($this->resolvers as $resolver) {
			if ($result = $resolver->getTemplateForElement($element)) {
				break;
			}
		}
		return $result;
	}
}
