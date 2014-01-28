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
 * Class Template
 *
 * @package Phorm\Renderer
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
abstract class Template implements Renderer {

	/** @var TemplateResolver */
	private $templates;

	/**
	 * @param TemplateResolver $templates
	 */
	public function __construct(TemplateResolver $templates = null) {
		if (!$templates) {
			$templates = new TemplateResolver();
			$this->registerTemplates($templates);
		}
		$this->templates = $templates;
	}

	/**
	 * Get the template resolver.
	 *
	 * @return TemplateResolver
	 */
	protected function getTemplates() {
		return $this->templates;
	}

	/**
	 * Register a template.
	 *
	 * @param string $key
	 * @param string $template
	 *
	 * @return $this
	 */
	public function registerTemplate($key, $template) {
		$this->getTemplates()->registerTemplate($key, $template);
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
		return $this->getTemplates()->getTemplate($key);
	}

	/**
	 * Get the template for element.
	 *
	 * @param Element $element
	 *
	 * @return string
	 *
	 * @throws \Phorm\Exception\RendererException
	 */
	public function getTemplateForElement(Element $element) {
		return $this->getTemplates()->getTemplateForElement($element);
	}

	/**
	 * Register templates to the default template resolver.
	 */
	abstract protected function registerTemplates(TemplateResolver $templates);

} 