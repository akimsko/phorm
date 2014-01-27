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

use Phorm\Elements\ElementContainer;
use Phorm\Elements\Element;

/**
 * Class Php
 *
 * @package Phorm\Renderer
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class Php extends Template {

	/**
	 * Get the default template.
	 *
	 * @return string
	 */
	protected function getDefaultTemplate() {
		return __DIR__ . '/../templates/default.php';
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
		new PhpScoper($element, $this->getTemplateMap());
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
	/** @var TemplateMap */
	private $templateProvider;

	/**
	 * @param Element          $element
	 * @param TemplateMap $templateProvider
	 */
	public function __construct(Element $element, TemplateMap $templateProvider) {
		$this->templateProvider = $templateProvider;
		$this->render($element);
	}

	/**
	 * Render.
	 *
	 * @param Element $element
	 */
	private function render(Element $element) {
		$template = $this->templateProvider->getTemplate($element->getType());

		if ($element instanceof ElementContainer) {
			$children = $element->getChildren();
		}

		require $template;
	}
}
