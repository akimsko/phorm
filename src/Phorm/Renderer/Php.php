<?php

namespace Phorm\Renderer;

use Phorm\Elements\ElementContainer;
use Phorm\Elements\Element;

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
		new PhpScoper($element, $this->getTemplateProvider());
		return ob_get_clean();
	}
}

class PhpScoper {
	/** @var TemplateProvider */
	private $templateProvider;

	/**
	 * @param Element          $element
	 * @param TemplateProvider $templateProvider
	 */
	public function __construct(Element $element, TemplateProvider $templateProvider) {
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
