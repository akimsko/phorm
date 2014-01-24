<?php

namespace Phorm\Elements;

/**
 * Class Container
 *
 * @package Phorm
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class Container extends Element {

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
	 * @return ElementContainer
	 */
	public function addChildren(array $children) {
		$this->children = array_merge($this->children, $children);
		return $this;
	}

	/**
	 * Set children.
	 *
	 * @param Element[] $children
	 *
	 * @return ElementContainer
	 */
	public function setChildren(array $children) {
		$this->children = $children;
		return $this;
	}

	/**
	 * Remove all children.
	 *
	 * @return ElementContainer
	 */
	public function removeChildren() {
		$this->children = array();
		return $this;
	}

	/**
	 * Set/add child.
	 *
	 * @param string  $index
	 * @param Element $child
	 *
	 * @return ElementContainer
	 */
	public function setChild($index, Element $child) {
		$this->children[$index] = $child;
		return $this;
	}

	/**
	 * Get child at index.
	 *
	 * @param string $index
	 *
	 * @return null|Element
	 */
	public function getChild($index) {
		return isset($this->children[$index])
			? $this->children[$index]
			: null;
	}

	/**
	 * Remove child at index.
	 *
	 * @param string $index
	 *
	 * @return ElementContainer
	 */
	public function removeChild($index) {
		if (array_key_exists($index, $this->children)) {
			unset($this->children[$index]);
		}
		return $this;
	}
}
