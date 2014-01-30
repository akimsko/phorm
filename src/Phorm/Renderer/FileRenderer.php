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

/**
 * Class FileRenderer
 *
 * @package Phorm\Renderer
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
abstract class FileRenderer extends Renderer {

	/** @var FileResolver */
	private $resolver;

	/**
	 * Get resolver.
	 *
	 * @return FileResolver
	 */
	public function getResolver() {
		if (!$this->resolver) {
			$this->setResolver($this->getDefaultResolver());
		}

		return $this->resolver;
	}

	/**
	 * Set resolver.
	 *
	 * @param FileResolver $resolver
	 *
	 * @return $this
	 */
	public function setResolver(FileResolver $resolver) {
		$this->resolver = $resolver;
		return $this;
	}

	/**
	 * Get the default resolver.
	 *
	 * @return FileResolver
	 */
	abstract protected function getDefaultResolver();
}