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

/**
 * Class Php
 *
 * @package Phorm\Renderer
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class Php extends Template {

	/**
	 * Register default templates.
	 */
	protected function registerDefaultTemplates(TemplateResolver $templates) {
		$templateDir = __DIR__ . '/../templates/php';
		$templates
			->registerTemplate('element', "$templateDir/element.php")
			->registerTemplate('content', "$templateDir/content.php")
			->registerTemplate('composite', "$templateDir/composite.php");
	}

	/**
	 * Render an element.
	 *
	 * @param Element $element
	 *
	 * @return string The rendered element.
	 */
	public function render(Element $element) {
		ob_start();
		new PhpScoper($element, $this->getTemplates());
		return ob_get_clean();
	}
}

/**
 * Class PhpScoper
 *
 * @package Phorm\Renderer
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class PhpScoper {
	/** @var TemplateResolver */
	private $templates;

	/**
	 * @param Element     $element
	 * @param TemplateResolver $templates
	 */
	public function __construct(Element $element, TemplateResolver $templates) {
		$this->templates = $templates;
		$this->render($element);
	}

	/**
	 * Render.
	 *
	 * @param Element $element
	 */
	private function render(Element $element) {
		$template = $this->templates->getTemplateForElement($element);
		require $template;
	}
}
