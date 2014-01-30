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
 * Class InputBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class InputBuilder extends Builder {

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
	 * Set autofocus.
	 *
	 * @param string $autofocus
	 *
	 * @return $this
	 */
	public function autofocus($autofocus) {
		return $this->setAttribute('autofocus', $autofocus);
	}

	/**
	 * Set disabled.
	 *
	 * @param string $disabled
	 *
	 * @return $this
	 */
	public function disabled($disabled) {
		return $this->setAttribute('disabled', $disabled);
	}

	/**
	 * Set form id.
	 *
	 * @param string $formId
	 *
	 * @return $this
	 */
	public function form($formId) {
		return $this->setAttribute('form', $formId);
	}

	/**
	 * Set formnovalidate.
	 *
	 * @param string $formnovalidate
	 *
	 * @return $this
	 */
	public function formnovalidate($formnovalidate) {
		return $this->setAttribute('formnovalidate', $formnovalidate);
	}

	/**
	 * Set list id.
	 *
	 * @param string $listId
	 *
	 * @return $this
	 */
	public function list_($listId) {
		return $this->setAttribute('list', $listId);
	}

	/**
	 * Set max.
	 *
	 * @param string $max
	 *
	 * @return $this
	 */
	public function max($max) {
		return $this->setAttribute('max', $max);
	}

	/**
	 * Set maxlength.
	 *
	 * @param string $maxlength
	 *
	 * @return $this
	 */
	public function maxlength($maxlength) {
		return $this->setAttribute('maxlength', $maxlength);
	}

	/**
	 * Set multiple.
	 *
	 * @param string $multiple
	 *
	 * @return $this
	 */
	public function multiple($multiple) {
		return $this->setAttribute('multiple', $multiple);
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
	 * Set pattern.
	 *
	 * @param string $pattern
	 *
	 * @return $this
	 */
	public function pattern($pattern) {
		return $this->setAttribute('pattern', $pattern);
	}

	/**
	 * Set placeholder.
	 *
	 * @param string $placeholder
	 *
	 * @return $this
	 */
	public function placeholder($placeholder) {
		return $this->setAttribute('placeholder', $placeholder);
	}

	/**
	 * Set readonly.
	 *
	 * @param string $readonly
	 *
	 * @return $this
	 */
	public function readonly($readonly) {
		return $this->setAttribute('readonly', $readonly);
	}

	/**
	 * Set required.
	 *
	 * @param string $required
	 *
	 * @return $this
	 */
	public function required($required) {
		return $this->setAttribute('required', $required);
	}

	/**
	 * Set size.
	 *
	 * @param string $size
	 *
	 * @return $this
	 */
	public function size($size) {
		return $this->setAttribute('size', $size);
	}

	/**
	 * Set step.
	 *
	 * @param string $step
	 *
	 * @return $this
	 */
	public function step($step) {
		return $this->setAttribute('step', $step);
	}

	/**
	 * Set type.
	 *
	 * @param string $type
	 *
	 * @return $this
	 */
	public function type($type) {
		return $this->setAttribute('type', $type);
	}

	/**
	 * Set value.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function value($value) {
		return $this->setAttribute('value', $value);
	}

	/**
	 * Set min.
	 *
	 * @param string $min
	 *
	 * @return $this
	 */
	public function min($min) {
		return $this->setAttribute('min', $min);
	}

	/**
	 * Build element.
	 *
	 * @param Element $element
	 *
	 * @return Element
	 */
	public function build(Element $element = null) {
		return $this
			->buildInternal($element ? $element : new Element())
			->setElementType('input');
	}
}
