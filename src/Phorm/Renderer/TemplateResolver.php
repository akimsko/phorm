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

use Phorm\Element\Element;
use Phorm\Renderer\Exception\TemplateNotFoundException;

/**
 * Class TemplateResolver
 *
 * @package Phorm\Renderer
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class TemplateResolver {

	/** @var array Type => template map. */
	protected $templates = array();

	/**
	 * Register a template for key.
	 *
	 * @param string $key
	 * @param string $template
	 *
	 * @return $this
	 */
	public function registerTemplate($key, $template) {
		$this->templates[$key] = $template;
		return $this;
	}

	/**
	 * Get template at key.
	 *
	 * @param string $key
	 *
	 * @return null|string The template
	 */
	public function getTemplate($key) {
		return array_key_exists($key, $this->templates)
			? $this->templates[$key]
			: null;
	}

	/**
	 * Get the template for element.
	 *
	 * @param Element $element
	 *
	 * @return string
	 *
	 * @throws Exception\TemplateNotFoundException
	 */
	public function getTemplateForElement(Element $element) {
		if (array_key_exists($element->getType(), $this->templates)) {
			return $this->templates[$element->getType()];
		}

		$refl = new \ReflectionClass($element);
		do {
			$key = strtolower($refl->getShortName());
			if (array_key_exists($key, $this->templates)) {
				return $this->templates[$key];
			}

		} while ($refl = $refl->getParentClass());

		throw new TemplateNotFoundException("Could not resolve template for element '" . get_class($element) . "'");
	}
}