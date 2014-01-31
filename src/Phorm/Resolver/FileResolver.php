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
use Phorm\Exception\ResolverException;

/**
 * Class FileResolver
 *
 * @package Phorm\Resolver
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class FileResolver implements Resolver {

	/** @var array key => template map. */
	protected $templates = array();

	/** @var string */
	protected $templatePath = '';

	/** @var string */
	protected $extension = '';

	/**
	 * Set extension.
	 *
	 * @param string $extension
	 *
	 * @return FileResolver
	 */
	public function setExtension($extension) {
		$this->extension = $extension;
		return $this;
	}

	/**
	 * Get extension.
	 *
	 * @return string
	 */
	public function getExtension() {
		return $this->extension;
	}

	/**
	 * Set template directory.
	 *
	 * @param $path
	 *
	 * @return $this
	 */
	public function setTemplatePath($path) {
		$this->templatePath = $path;
		return $this;
	}

	/**
	 * Get template directory.
	 *
	 * @return string
	 */
	public function getTemplatePath() {
		return $this->templatePath;
	}

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
	 * @return null|string
	 */
	public function getTemplateForElement(Element $element) {
		$name = $element->getAttribute('type')
			? "{$element->getElementType()}_{$element->getAttribute('type')}"
			: $element->getElementType();

		if ($element->getTemplateName()) {
			$name = "{$element->getTemplateName()}/$name";
		}

		return array_key_exists($name, $this->templates)
			? $this->templates[$name]
			: $this->getTemplatePath() . $name . $this->getExtension();
	}
}