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

	/** @var string */
	private $title;

	/** @var string */
	private $description;

	/** @var string */
	private $error;

	/** @var array */
	private $extras = array();

	/**
	 * Set extra.
	 *
	 * @param string $name
	 * @param mixed  $value
	 *
	 * @return Builder
	 */
	public function setExtra($name, $value) {
		$this->extras[$name] = $value;
		return $this;
	}

	/**
	 * Get extra.
	 *
	 * @return array
	 */
	protected function getExtras() {
		return $this->extras;
	}

	/**
	 * Set description.
	 *
	 * @param string $description
	 *
	 * @return Builder
	 */
	public function description($description) {
		$this->description = $description;
		return $this;
	}

	/**
	 * Get description.
	 *
	 * @return string
	 */
	protected function getDescription() {
		return $this->description;
	}

	/**
	 * Set error.
	 *
	 * @param string $error
	 *
	 * @return Builder
	 */
	public function error($error) {
		$this->error = $error;
		return $this;
	}

	/**
	 * Get error.
	 *
	 * @return string
	 */
	protected function getError() {
		return $this->error;
	}

	/**
	 * Set title.
	 *
	 * @param string $title
	 *
	 * @return Builder
	 */
	public function title($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * Get title.
	 *
	 * @return string
	 */
	protected function getTitle() {
		return $this->title;
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
		return $element
			->setTitle($this->getTitle())
			->setDescription($this->getDescription())
			->setError($this->getError())
			->setExtras($this->getExtras())
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