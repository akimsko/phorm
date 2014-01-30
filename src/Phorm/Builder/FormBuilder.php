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
use Phorm\Element\Element;
use Phorm\Exception\BuilderException;

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
	 * @param string $acceptCharset
	 *
	 * @return $this
	 */
	public function acceptCharset($acceptCharset) {
		return $this->setAttribute('accept-charset', $acceptCharset);
	}

	/**
	 * Set action.
	 *
	 * @param string $action
	 *
	 * @return $this
	 */
	public function action($action) {
		return $this->setAttribute('action', $action);
	}

	/**
	 * Set autocomplete.
	 *
	 * @param string $autocomplete
	 *
	 * @return $this
	 */
	public function autocomplete($autocomplete) {
		return $this->setAttribute('autocomplete', $autocomplete);
	}

	/**
	 * Set enctype.
	 *
	 * @param string $enctype
	 *
	 * @return $this
	 */
	public function enctype($enctype) {
		return $this->setAttribute('enctype', $enctype);
	}

	/**
	 * Set method.
	 *
	 * @param string $method
	 *
	 * @return $this
	 */
	public function method($method) {
		return $this->setAttribute('method', $method);
	}

	/**
	 * Set name.
	 *
	 * @param string $name
	 *
	 * @return $this
	 */
	public function name($name) {
		return $this->setAttribute('name', $name);
	}

	/**
	 * Set novalidate.
	 *
	 * @param string $novalidate
	 *
	 * @return $this
	 */
	public function novalidate($novalidate) {
		return $this->setAttribute('novalidate', $novalidate);
	}

	/**
	 * Set target.
	 *
	 * @param string $target
	 *
	 * @return $this
	 */
	public function target($target) {
		return $this->setAttribute('target', $target);
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
