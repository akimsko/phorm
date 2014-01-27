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

/**
 * Class TemplateMap
 *
 * @package Phorm\Renderer
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class TemplateMap {

	/** @var string The default template when key misses. */
	protected $defaultTemplate = '';

	/** @var array Type => template map. */
	protected $templates = array();

	/**
	 * Register a template.
	 *
	 * @param string $key
	 * @param string $template
	 *
	 * @return $this
	 */
	public function setTemplate($key, $template) {
		$this->templates[$key] = $template;
		return $this;
	}

	/**
	 * Get template at key.
	 *
	 * @param string $key
	 *
	 * @return string The template
	 */
	public function getTemplate($key) {
		return array_key_exists($key, $this->templates)
			? $this->templates[$key]
			: $this->defaultTemplate;
	}

	/**
	 * Set the default template when key misses.
	 *
	 * @param string $template
	 *
	 * @return $this
	 */
	public function setDefaultTemplate($template) {
		$this->defaultTemplate = $template;
		return $this;
	}
}