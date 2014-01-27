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
abstract class Template implements RendererInterface {

	/** @var TemplateResolver */
	private $templates;

	/**
	 * Set template provider.
	 *
	 * @param TemplateResolver $templates
	 *
	 * @return $this
	 */
	public function setTemplates(TemplateResolver $templates) {
		$this->templates = $templates;
		return $this;
	}

	/**
	 * Get the template resolver.
	 *
	 * @return TemplateResolver
	 */
	public function getTemplates() {
		if (!$this->templates) {
			$this->templates = new TemplateResolver();
			$this->registerDefaultTemplates($this->templates);
		}
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
	 * @throws Exception\TemplateNotFoundException
	 */
	public function getTemplateForElement(Element $element) {
		return $this->getTemplates()->getTemplateForElement($element);
	}

	/**
	 * Register default templates.
	 */
	abstract protected function registerDefaultTemplates(TemplateResolver $templates);

} 