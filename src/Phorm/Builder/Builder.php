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

namespace Phorm\Builder;

use Phorm\Element\Element;

/**
 * Class Builder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
abstract class Builder {

	/** @var array Element attributes. */
	private $attributes = array();

	/** @var string The template namespace. */
	private $templateNamespace;

	/** @var LabelBuilder The label builder. */
	private $label;

	/** @var boolean Mark label as after. */
	private $labelAfter = false;

	/**
	 * Set a custom label builder.
	 *
	 * @param LabelBuilder $label The custom label builder.
	 * @param boolean      $after Request it be shown after the element.
	 *
	 * @return $this This.
	 */
	public function addLabelBuilder(LabelBuilder $label, $after = false) {
		$this->label = $label;
		$this->labelAfter = $after;
		return $this;
	}

	/**
	 * Set label text.
	 *
	 * If this element has an id set, the label "for" attribute will be set to match.
	 *
	 * @param string  $label The label text.
	 * @param boolean $after Request it be shown after the element.
	 *
	 * @return $this This.
	 */
	public function addLabel($label, $after = false) {
		$labelBuilder = new LabelBuilder();
		if ($id = $this->getAttribute('id')) {
			$labelBuilder->for_($id);
		}
		$this->addLabelBuilder($labelBuilder->setContent($label), $after);
		return $this;
	}

	/**
	 * Get label.
	 *
	 * @return LabelBuilder|null The label builder, if set.
	 */
	protected function getLabel() {
		return $this->label;
	}

	/**
	 * Is label after.
	 *
	 * @return boolean Is label after.
	 */
	protected function isLabelAfter() {
		return $this->labelAfter;
	}

	/**
	 * Set template namespace.
	 *
	 * This decides what namespace (like a subfolder)
	 * to look for a template in, when this element is rendered.
	 *
	 * @param string $templateNamespace
	 *
	 * @return $this
	 */
	public function setTemplateNamespace($templateNamespace) {
		$this->templateNamespace = $templateNamespace;
		return $this;
	}

	/**
	 * Get templateNamespace.
	 *
	 * @return string
	 */
	protected function getTemplateNamespace() {
		return $this->templateNamespace;
	}

	/**
	 * Get attributes.
	 *
	 * @return array
	 */
	protected function getAttributes() {
		return $this->attributes;
	}

	/**
	 * Get attribute.
	 *
	 * @param string $name
	 *
	 * @return null|string
	 */
	protected function getAttribute($name) {
		return isset($this->attributes[$name])
			? $this->attributes[$name]
			: null;
	}

	/**
	 * Add additional element attributes.
	 *
	 * @param array $attributes
	 *
	 * @return $this
	 */
	public function addAttributes(array $attributes) {
		$this->attributes = array_merge($this->attributes, $attributes);
		return $this;
	}

	/**
	 * Set an additional element attribute.
	 *
	 * Only the most common attributes are exposed with setters.
	 * Use this to set any additional attributes, like style, data-* etc.
	 *
	 * @param string $name
	 * @param string $value
	 *
	 * @return $this
	 */
	public function setAttribute($name, $value) {
		$this->attributes[$name] = $value;
		return $this;
	}

	/**
	 * Set element id.
	 *
	 * @param string $elementId
	 *
	 * @return $this
	 */
	public function id($elementId) {
		return $this->setAttribute('id', $elementId);
	}

	/**
	 * Set element class.
	 *
	 * @param string $class
	 *
	 * @return $this
	 */
	public function class_($class) {
		return $this->setAttribute('class', $class);
	}

	/**
	 * Build internal.
	 *
	 * @param Element $element
	 *
	 * @return Element
	 */
	protected function buildInternal(Element $element) {
		if ($label = $this->getLabel()) {
			$element->setLabel($label->build(), $this->isLabelAfter());
		}

		return $element
			->setAttributes($this->getAttributes())
			->setTemplateNameSpace($this->getTemplateNamespace());
	}

	/**
	 * Build element.
	 *
	 * @return Element
	 */
	abstract public function build();
} 