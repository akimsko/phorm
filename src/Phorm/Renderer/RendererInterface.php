<?php
/**
 * This file is part of the phorm project.
 */


namespace Phorm\Renderer;

use Phorm\Elements\Element;

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