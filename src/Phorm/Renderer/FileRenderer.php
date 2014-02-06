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

namespace Phorm\Renderer;

use Phorm\Resolver\FileResolver;
use Phorm\Resolver\ResolverAggregate;

/**
 * Class FileRenderer
 *
 * @package Phorm\Renderer
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
abstract class FileRenderer extends Renderer {

	/** @var ResolverAggregate */
	private $resolvers;

	/**
	 * Get resolvers.
	 *
	 * @return ResolverAggregate
	 */
	protected function getResolvers() {
		return $this->resolvers
			? $this->resolvers
			: ($this->resolvers = new ResolverAggregate());
	}

	/**
	 * Set resolver.
	 *
	 * @param FileResolver $resolver
	 *
	 * @return $this
	 */
	public function registerResolver(FileResolver $resolver) {
		$this->getResolvers()->registerResolver($resolver);
		return $this;
	}
}