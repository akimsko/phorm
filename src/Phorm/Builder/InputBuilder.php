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
	public function setAutocomplete($autocomplete) {
		return $this->setAttribute('autocomplete', $autocomplete);
	}

	/**
	 * Set autofocus.
	 *
	 * @param string $autofocus
	 *
	 * @return $this
	 */
	public function setAutofocus($autofocus) {
		return $this->setAttribute('autofocus', $autofocus);
	}

	/**
	 * Set disabled.
	 *
	 * @param string $disabled
	 *
	 * @return $this
	 */
	public function setDisabled($disabled) {
		return $this->setAttribute('disabled', $disabled);
	}

	/**
	 * Set form id.
	 *
	 * @param string $formId
	 *
	 * @return $this
	 */
	public function setForm($formId) {
		return $this->setAttribute('form', $formId);
	}

	/**
	 * Set formnovalidate.
	 *
	 * @param string $formnovalidate
	 *
	 * @return $this
	 */
	public function setFormnovalidate($formnovalidate) {
		return $this->setAttribute('formnovalidate', $formnovalidate);
	}

	/**
	 * Set list id.
	 *
	 * @param string $listId
	 *
	 * @return $this
	 */
	public function setList($listId) {
		return $this->setAttribute('list', $listId);
	}

	/**
	 * Set max.
	 *
	 * @param string $max
	 *
	 * @return $this
	 */
	public function setMax($max) {
		return $this->setAttribute('max', $max);
	}

	/**
	 * Set maxlength.
	 *
	 * @param string $maxlength
	 *
	 * @return $this
	 */
	public function setMaxlength($maxlength) {
		return $this->setAttribute('maxlength', $maxlength);
	}

	/**
	 * Set multiple.
	 *
	 * @param string $multiple
	 *
	 * @return $this
	 */
	public function setMultiple($multiple) {
		return $this->setAttribute('multiple', $multiple);
	}

	/**
	 * Set name.
	 *
	 * @param string $name
	 *
	 * @return $this
	 */
	public function setName($name) {
		return $this->setAttribute('name', $name);
	}

	/**
	 * Set pattern.
	 *
	 * @param string $pattern
	 *
	 * @return $this
	 */
	public function setPattern($pattern) {
		return $this->setAttribute('pattern', $pattern);
	}

	/**
	 * Set placeholder.
	 *
	 * @param string $placeholder
	 *
	 * @return $this
	 */
	public function setPlaceholder($placeholder) {
		return $this->setAttribute('placeholder', $placeholder);
	}

	/**
	 * Set readonly.
	 *
	 * @param string $readonly
	 *
	 * @return $this
	 */
	public function setReadonly($readonly) {
		return $this->setAttribute('readonly', $readonly);
	}

	/**
	 * Set required.
	 *
	 * @param string $required
	 *
	 * @return $this
	 */
	public function setRequired($required) {
		return $this->setAttribute('required', $required);
	}

	/**
	 * Set size.
	 *
	 * @param string $size
	 *
	 * @return $this
	 */
	public function setSize($size) {
		return $this->setAttribute('size', $size);
	}

	/**
	 * Set step.
	 *
	 * @param string $step
	 *
	 * @return $this
	 */
	public function setStep($step) {
		return $this->setAttribute('step', $step);
	}

	/**
	 * Set type.
	 *
	 * @param string $type
	 *
	 * @return $this
	 */
	public function setType($type) {
		return $this->setAttribute('type', $type);
	}

	/**
	 * Set value.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function setValue($value) {
		return $this->setAttribute('value', $value);
	}

	/**
	 * Set min.
	 *
	 * @param string $min
	 *
	 * @return $this
	 */
	public function setMin($min) {
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
		$element = $element ? $element : new Element();

		$element->setElementType('input');
		$element->setAttributes($this->getAttributes());

		return $element;
	}
}
