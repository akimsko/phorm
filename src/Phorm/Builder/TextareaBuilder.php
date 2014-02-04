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
 * Class TextareaBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class TextareaBuilder extends ContentBuilder {

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
	 * Set cols.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function cols($value) {
		return $this->setAttribute('cols', $value);
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
	 * Set rows.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function rows($value) {
		return $this->setAttribute('rows', $value);
	}

	/**
	 * Set wrap.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function wrap($value) {
		return $this->setAttribute('wrap', $value);
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
			->setElementType('textarea');
	}
}
