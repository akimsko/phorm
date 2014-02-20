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

use Phorm\Element\Composite;
use Phorm\Element\Content;
use Phorm\Element\Element;

/**
 * Class Helper
 *
 * @package Phorm\Renderer
 * @author Bo Thinggaard <bo@unpossiblesystems.com>
 */
class Helper {

	/** @var Renderer */
	private $renderer;

	/**
	 * @param Renderer $renderer
	 */
	public function __construct(Renderer $renderer) {
		$this->renderer = $renderer;
	}

	/**
	 * Render attributes.
	 *
	 * @param array $attributes
	 *
	 * @return string
	 */
	public function renderAttributes(array $attributes) {
		$rendered = '';
		foreach($attributes as $name=>$value){
			$rendered .= " $name=\"$value\"";
		}
		return $rendered;
	}

	/**
	 * Render opening tag.
	 *
	 * @param Element $element
	 * @param boolean $newline
	 *
	 * @return string
	 */
	public function renderTagOpen(Element $element, $newline = true) {
		return "<{$element->getElementType()}{$this->renderAttributes($element->getAttributes())}>" . ($newline ? "\n" : "");
	}

	/**
	 * Render closing tag.
	 *
	 * @param Element $element
	 * @param boolean $newline
	 *
	 * @return string
	 */
	public function renderTagClose(Element $element, $newline = true) {
		return "</{$element->getElementType()}>" . ($newline ? "\n" : "");
	}

	/**
	 * Render element in code.
	 *
	 * @param Element $element
	 *
	 * @return string
	 */
	public function renderElement(Element $element) {
		$rendered = '';

		switch (true) {
			case $element instanceof Composite:
				$rendered .= $this->renderTagOpen($element);
				foreach ($element->getChildren() as $child) {
					$rendered .= $this->renderChild($child);
				}
				$rendered .= $this->renderTagClose($element);
				break;
			case $element instanceof Content:
				$rendered .= $this->renderTagOpen($element, false) . $element->getContent() . $this->renderTagClose($element);
				break;
			default:
				$rendered .= $this->renderTagOpen($element);
		}

		if ($label = $element->getLabel()) {
			$renderedLabel = $this->renderChild($label);
			$rendered =  $element->isLabelAfter()
				? $rendered . $renderedLabel
				: $renderedLabel . $rendered;
		}

		return $rendered;
	}

	/**
	 * Render child element.
	 *
	 * @param Element $child
	 *
	 * @return string
	 */
	public function renderChild(Element $child) {
		return $this->renderer->render($child);
	}

} 