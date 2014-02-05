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

use Phorm\Element\Content;

/**
 * Class ButtonBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class ButtonBuilder extends ContentBuilder {

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
	 * Set form.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function form($value) {
		return $this->setAttribute('form', $value);
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
	 * Build element.
	 *
	 * @param Content $element
	 *
	 * @return Content
	 */
	public function build(Content $element = null) {
		return $this
			->buildInternal($element ? $element : new Content())
			->setElementType('button');
	}
}
