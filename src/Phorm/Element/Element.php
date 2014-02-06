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

namespace Phorm\Element;

/**
 * Class Element
 *
 * @package Phorm
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class Element {

	/** @var string Element tag. */
	protected $elementType;

	/** @var array Element attributes. */
	protected $attributes = array();

	/** @var string */
	protected $templateName;

	/** @var string */
	protected $tag;

	/** @var array */
	protected $extras = array();

	/**
	 * Set extras.
	 *
	 * @param array $extras
	 *
	 * @return Element
	 */
	public function setExtras(array $extras) {
		$this->extras = $extras;
		return $this;
	}

	/**
	 * Get extras.
	 *
	 * @return array
	 */
	public function getExtras() {
		return $this->extras;
	}

	/**
	 * Set extra.
	 *
	 * @param string $name
	 * @param mixed  $value
	 */
	public function setExtra($name, $value) {
		$this->extras[$name] = $value;
	}

	/**
	 * Get extra.
	 *
	 * @param string $name
	 *
	 * @return null|mixed
	 */
	public function getExtra($name) {
		return isset($this->extras[$name])
			? $this->extras[$name]
			: null;
	}

	/**
	 * Set templateName.
	 *
	 * @param string $templateName
	 *
	 * @return Element
	 */
	public function setTemplateName($templateName) {
		$this->templateName = $templateName;
		return $this;
	}

	/**
	 * Get templateName.
	 *
	 * @return string
	 */
	public function getTemplateName() {
		return $this->templateName;
	}

	/**
	 * Get element type.
	 *
	 * @return string
	 */
	public function getElementType() {
		if (!$this->elementType) {
			$refl = new \ReflectionClass($this);
			$this->elementType = strtolower($refl->getShortName());
		}
		return $this->elementType;
	}

	/**
	 * Set tag.
	 *
	 * @param string $tag
	 *
	 * @return Element
	 */
	public function setTag($tag) {
		$this->tag = $tag;
		return $this;
	}

	/**
	 * Get tag.
	 *
	 * @return string
	 */
	public function getTag() {
		return $this->tag
			? $this->tag
			: $this->getElementType();
	}

	/**
	 * Set element type.
	 *
	 * @param string $elementType
	 *
	 * @return $this
	 */
	public function setElementType($elementType) {
		$this->elementType = $elementType;
		return $this;
	}

	/**
	 * Get element attributes.
	 *
	 * @return array
	 */
	public function getAttributes() {
		return $this->attributes;
	}

	/**
	 * Set element attributes.
	 *
	 * @param array $attributes
	 *
	 * @return $this
	 */
	public function setAttributes(array $attributes) {
		$this->attributes = $attributes;
		return $this;
	}

	/**
	 * Add element attributes.
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
	 * Set element attribute.
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
	 * Get element attribute.
	 *
	 * @param string $name
	 *
	 * @return string|null
	 */
	public function getAttribute($name) {
		return isset($this->attributes[$name])
			? $this->attributes[$name]
			: null;
	}

	/**
	 * Remove an element attribute.
	 *
	 * @param string $name
	 *
	 * @return $this
	 */
	public function removeAttribute($name) {
		if (array_key_exists($name, $this->attributes)) {
			unset($this->attributes[$name]);
		}
		return $this;
	}

	/**
	 * Remove all element attributes.
	 *
	 * @return $this
	 */
	public function removeAttributes() {
		$this->attributes = array();
		return $this;
	}
}
