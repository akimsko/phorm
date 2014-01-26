<?php
/**
 * This file is part of the phorm project.
 */


namespace Unpossible\Phorm\Renderer;

use Unpossible\Phorm\Elements\Element;

interface RendererInterface {

	/**
	 * Render an element.
	 *
	 * @param Element $element
	 *
	 * @return string The rendered element.
	 */
	public function render(Element $element);

} 