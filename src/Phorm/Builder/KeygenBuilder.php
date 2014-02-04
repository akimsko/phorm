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
 * Class KeygenBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class KeygenBuilder extends Builder {

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
	 * Set challenge.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function challenge($value) {
		return $this->setAttribute('challenge', $value);
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
	 * Set keytype.
	 *
	 * @param string $value
	 *
	 * @return $this
	 */
	public function keytype($value) {
		return $this->setAttribute('keytype', $value);
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
	 * Build element.
	 *
	 * @param Element $element
	 *
	 * @return Element
	 */
	public function build(Element $element = null) {
		return $this
			->buildInternal($element ? $element : new Element())
			->setElementType('keygen');
	}
}
