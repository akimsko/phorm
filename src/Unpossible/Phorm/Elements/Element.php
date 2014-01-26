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

namespace Unpossible\Phorm\Elements;

/**
 * Class Element
 *
 * @package Phorm
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class Element {

	/** @var string Uknown type. */
	const TYPE_UNKNOWN = 'unknown';

	/** @var string Element type. */
	protected $type;

	/** @var array Element attributes. */
	protected $attributes;

	/**
	 * @param array  $attributes
	 */
	public function __construct(array $attributes = array()) {
		$this->attributes = $attributes;
	}

	/**
	 * Get element type.
	 *
	 * @return string
	 */
	public function getType() {
		if (!$this->type && !($this->type = strtolower(substr(get_class($this), strlen(get_class()))))) {
			$this->type = self::TYPE_UNKNOWN;
		}
		return $this->type;
	}

	/**
	 * Set element type.
	 *
	 * @param string $type
	 *
	 * @return Element
	 */
	public function setType($type) {
		$this->type = $type;
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
	 * @return Element
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
	 * @return Element
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
	 * @return Element
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
	 * @return Element
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
	 * @return Element
	 */
	public function removeAttributes() {
		$this->attributes = array();
		return $this;
	}
}
