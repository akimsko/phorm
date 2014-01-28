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
 * Class Composite
 *
 * @package Phorm
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class Composite extends Element {

	/** @var Element[] Children. */
	protected $children = array();

	/**
	 * Get children.
	 *
	 * @return Element[]
	 */
	public function getChildren() {
		return $this->children;
	}

	/**
	 * Add children to existing ones.
	 *
	 * @param Element[] $children
	 *
	 * @return $this
	 */
	public function addChildren(array $children) {
		$this->children = array_merge($this->children, array_values($children));
		return $this;
	}

	/**
	 * Set children.
	 *
	 * @param Element[] $children
	 *
	 * @return $this
	 */
	public function setChildren(array $children) {
		$this->children = array_values($children);
		return $this;
	}

	/**
	 * Remove all children.
	 *
	 * @return $this
	 */
	public function removeChildren() {
		$this->children = array();
		return $this;
	}

	/**
	 * Add child.
	 *
	 * @param Element $child
	 *
	 * @return $this
	 */
	public function addChild(Element $child) {
		$this->children[] = $child;
		return $this;
	}

	/**
	 * Get child at $position.
	 *
	 * @param string $position
	 *
	 * @return null|Element
	 */
	public function getChild($position) {
		return isset($this->children[$position])
			? $this->children[$position]
			: null;
	}

	/**
	 * Remove child at index.
	 *
	 * @param string $position
	 *
	 * @return $this
	 */
	public function removeChild($position) {
		if (array_key_exists($position, $this->children)) {
			unset($this->children[$position]);
			$this->children = array_values($this->children);
		}
		return $this;
	}
}
