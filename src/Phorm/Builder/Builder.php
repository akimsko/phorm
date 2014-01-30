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
 * @author Bo Thinggaard <bo@unpossiblesystems.com>
 */
abstract class Builder {

	/** @var array Element attributes. */
	private $attributes = array();

	/**
	 * Get attributes.
	 *
	 * @return array
	 */
	protected function getAttributes() {
		return $this->attributes;
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
	 * Build element.
	 *
	 * @param Element $element
	 *
	 * @return Element
	 */
	abstract public function build(Element $element = null);
} 