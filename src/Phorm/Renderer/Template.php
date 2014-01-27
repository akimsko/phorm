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

	/** @var TemplateMap */
	private $templateMap;

	/**
	 * Set template provider.
	 *
	 * @param TemplateMap $map
	 *
	 * @return $this
	 */
	public function setTemplateMap(TemplateMap $map) {
		$this->templateMap = $map;
		return $this;
	}

	/**
	 * Get the template provider.
	 *
	 * @return TemplateMap
	 */
	public function getTemplateMap() {
		if (!$this->templateMap) {
			$this->templateMap = new TemplateMap();
			$this->templateMap->setDefaultTemplate($this->getDefaultTemplate());
		}
		return $this->templateMap;
	}

	/**
	 * Register a template.
	 *
	 * @param string $key
	 * @param string $template
	 *
	 * @return $this
	 */
	public function setTemplate($key, $template) {
		$this->getTemplateMap()->setTemplate($key, $template);
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
		return $this->getTemplateMap()->getTemplate($key);
	}

	/**
	 * Get the default template.
	 *
	 * @return string
	 */
	abstract protected function getDefaultTemplate();

} 