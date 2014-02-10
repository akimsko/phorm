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
	 * @param string $value
	 *
	 * @return $this
	 */
	public function autocomplete($value) {
		return $this->setAttribute('autocomplete', $value);
	}

	/**
	 * Set autofocus.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function autofocus($value) {
		return $this->setAttribute('autofocus', $value);
	}

	/**
	 * Set disabled.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function disabled($value) {
		return $this->setAttribute('disabled', $value);
	}

	/**
	 * Set form id.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function form($value) {
		return $this->setAttribute('form', $value);
	}

	/**
	 * Set formnovalidate.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function formnovalidate($value) {
		return $this->setAttribute('formnovalidate', $value);
	}

	/**
	 * Set list id.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function list_($value) {
		return $this->setAttribute('list', $value);
	}

	/**
	 * Set max.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function max($value) {
		return $this->setAttribute('max', $value);
	}

	/**
	 * Set maxlength.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function maxlength($value) {
		return $this->setAttribute('maxlength', $value);
	}

	/**
	 * Set multiple.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function multiple($value) {
		return $this->setAttribute('multiple', $value);
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
	 * Set pattern.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function pattern($value) {
		return $this->setAttribute('pattern', $value);
	}

	/**
	 * Set placeholder.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function placeholder($value) {
		return $this->setAttribute('placeholder', $value);
	}

	/**
	 * Set readonly.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function readonly($value) {
		return $this->setAttribute('readonly', $value);
	}

	/**
	 * Set required.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function required($value) {
		return $this->setAttribute('required', $value);
	}

	/**
	 * Set size.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function size($value) {
		return $this->setAttribute('size', $value);
	}

	/**
	 * Set step.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function step($value) {
		return $this->setAttribute('step', $value);
	}

	/**
	 * Set type.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function type($value) {
		return $this->setAttribute('type', $value);
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
	 * @param string $value
	 *
	 * @return $this
	 */
	public function min($value) {
		return $this->setAttribute('min', $value);
	}


	/**
	 * Set checked.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function checked($value) {
		return $this->setAttribute('checked', $value);
	}

	/**
	 * Set accept.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function accept($value) {
		return $this->setAttribute('accept', $value);
	}

	/**
	 * Set alt.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function alt($value) {
		return $this->setAttribute('alt', $value);
	}

	/**
	 * Set formaction.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function formaction($value) {
		return $this->setAttribute('formaction', $value);
	}

	/**
	 * Set formenctype.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function formenctype($value) {
		return $this->setAttribute('formenctype', $value);
	}

	/**
	 * Set formmethod.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function formmethod($value) {
		return $this->setAttribute('formmethod', $value);
	}

	/**
	 * Set formtarget.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function formtarget($value) {
		return $this->setAttribute('formtarget', $value);
	}

	/**
	 * Set height.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function height($value) {
		return $this->setAttribute('height', $value);
	}

	/**
	 * Set src.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function src($value) {
		return $this->setAttribute('src', $value);
	}

	/**
	 * Set width.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function width($value) {
		return $this->setAttribute('width', $value);
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
