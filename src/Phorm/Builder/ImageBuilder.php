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
 * Class ImageBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class ImageBuilder extends InputBuilder {

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
		$this->type('image');
		return parent::build($element);
	}
}
