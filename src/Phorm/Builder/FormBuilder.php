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

use Phorm\Element\Composite;

/**
 * Class FormBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class FormBuilder extends CompositeBuilder {

	/**
	 * Set accept-charset.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function acceptCharset($value) {
		return $this->setAttribute('accept-charset', $value);
	}

	/**
	 * Set action.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function action($value) {
		return $this->setAttribute('action', $value);
	}

	/**
	 * Set autocomplete.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function autocomplete($value) {
		return $this->setAttribute('autocomplete', $value);
	}

	/**
	 * Set enctype.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function enctype($value) {
		return $this->setAttribute('enctype', $value);
	}

	/**
	 * Set method.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function method($value) {
		return $this->setAttribute('method', $value);
	}

	/**
	 * Set name.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function name($value) {
		return $this->setAttribute('name', $value);
	}

	/**
	 * Set novalidate.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function novalidate($value) {
		return $this->setAttribute('novalidate', $value);
	}

	/**
	 * Set target.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function target($value) {
		return $this->setAttribute('target', $value);
	}

	/**
	 * Add element.
	 *
	 * @param Builder $element
	 *
	 * @return $this
	 */
	public function addElement(Builder $element) {
		$this->addChildBuilder($element);
		return $this;
	}

	/**
	 * Build element.
	 *
	 * @param Composite $element
	 *
	 * @return Composite
	 */
	public function build(Composite $element = null) {
		return $this
			->buildInternal($element ? $element : new Composite())
			->setElementType('form');
	}
}
