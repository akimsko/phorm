<?php

/**
 * This file is part of the phorm project.
 */

namespace Unpossible\Phorm\Renderer;

/**
 * Class TemplateProvider
 *
 * @package Unpossible\Phorm\Renderer
 * @author Bo Thinggaard <bo@unpossiblesystems.com>
 */
class TemplateProvider {

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
	 * @return TemplateProvider
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
	 * @return TemplateProvider
	 */
	public function setDefaultTemplate($template) {
		$this->defaultTemplate = $template;
		return $this;
	}
}