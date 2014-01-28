<?php
/**
 * This file is part of the phorm project.
 */


namespace Phorm\Builder;


/**
 * Class Builder
 *
 * @package Phorm\Builder
 * @author Bo Thinggaard <bo@unpossiblesystems.com>
 */
abstract class Builder {

	/** @var array Element attributes. */
	private $attributes = array();

	/** @var string The element type */
	private $elementType;

	/**
	 * Get attributes.
	 *
	 * @return array
	 */
	public function getAttributes() {
		return $this->attributes;
	}

	/**
	 * Get element type.
	 *
	 * @return string
	 */
	public function getElementType() {
		return $this->elementType
			? $this->elementType
			: ($this->elementType = $this->getDefaultElementType());
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
	public function setId($elementId) {
		return $this->setAttribute('id', $elementId);
	}

	/**
	 * Set element class.
	 *
	 * @param string $class
	 *
	 * @return $this
	 */
	public function setClass($class) {
		return $this->setAttribute('class', $class);
	}

	/**
	 * Set element type.
	 *
	 * Overrides the default type for the element.
	 *
	 * @param string $type
	 *
	 * @return $this
	 */
	public function setElementType($type) {
		$this->elementType = $type;
		return $this;
	}

	/**
	 * Get default element type.
	 *
	 * @return string
	 */
	abstract protected function getDefaultElementType();

	/**
	 * Build element.
	 *
	 * @return \Phorm\Element\Element
	 */
	abstract public function build();
} 