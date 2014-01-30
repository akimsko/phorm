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
 * Interface Resolver
 *
 * @package Phorm\Resolver
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
interface Resolver {

	/**
	 * Register a template for key.
	 *
	 * @param string $key
	 * @param string $template
	 *
	 * @return $this
	 */
	public function registerTemplate($key, $template);

	/**
	 * Get template at key.
	 *
	 * @param string $key
	 *
	 * @return null|string The template
	 */
	public function getTemplate($key);

	/**
	 * Get the template for element.
	 *
	 * @param Element $element
	 *
	 * @return null|string
	 */
	public function getTemplateForElement(Element $element);
} 