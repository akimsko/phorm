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
	protected $templateNameSpace;

	/** @var string */
	protected $templateName;

	/** @var string */
	protected $templateGroup;

	/** @var array */
	protected $extras = array();

	/** @var string */
	protected $title;

	/** @var string */
	protected $description;

	/** @var string */
	protected $error;

	/**
	 * Get templateGroup.
	 *
	 * @return string
	 */
	public function getTemplateGroup() {
		return $this->templateGroup;
	}

	/**
	 * Set templateGroup.
	 *
	 * @param string $templateGroup
	 *
	 * @return Element
	 */
	public function setTemplateGroup($templateGroup) {
		$this->templateGroup = $templateGroup;
		return $this;
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
	 * @return string|null
	 */
	public function getTemplateName() {
		return $this->templateName;
	}

	/**
	 * Set description.
	 *
	 * @param string $description
	 *
	 * @return Element
	 */
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}

	/**
	 * Get description.
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Set error.
	 *
	 * @param string $error
	 *
	 * @return Element
	 */
	public function setError($error) {
		$this->error = $error;
		return $this;
	}

	/**
	 * Get error.
	 *
	 * @return string
	 */
	public function getError() {
		return $this->error;
	}

	/**
	 * Set title.
	 *
	 * @param string $title
	 *
	 * @return Element
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * Get title.
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

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
	 *
	 * @return $this
	 */
	public function setExtra($name, $value) {
		$this->extras[$name] = $value;
		return $this;
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
	public function setTemplateNameSpace($templateName) {
		$this->templateNameSpace = $templateName;
		return $this;
	}

	/**
	 * Get templateName.
	 *
	 * @return string
	 */
	public function getTemplateNameSpace() {
		return $this->templateNameSpace;
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
