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
	 * @param string $alt
	 *
	 * @return $this
	 */
	public function alt($alt) {
		return $this->setAttribute('alt', $alt);
	}

	/**
	 * Set formaction.
	 *
	 * @param string $formaction
	 *
	 * @return $this
	 */
	public function formaction($formaction) {
		return $this->setAttribute('formaction', $formaction);
	}

	/**
	 * Set formenctype.
	 *
	 * @param string $formenctype
	 *
	 * @return $this
	 */
	public function formenctype($formenctype) {
		return $this->setAttribute('formenctype', $formenctype);
	}

	/**
	 * Set formmethod.
	 *
	 * @param string $formmethod
	 *
	 * @return $this
	 */
	public function formmethod($formmethod) {
		return $this->setAttribute('formmethod', $formmethod);
	}

	/**
	 * Set formtarget.
	 *
	 * @param string $formtarget
	 *
	 * @return $this
	 */
	public function formtarget($formtarget) {
		return $this->setAttribute('formtarget', $formtarget);
	}

	/**
	 * Set height.
	 *
	 * @param string $height
	 *
	 * @return $this
	 */
	public function height($height) {
		return $this->setAttribute('height', $height);
	}

	/**
	 * Set src.
	 *
	 * @param string $src
	 *
	 * @return $this
	 */
	public function src($src) {
		return $this->setAttribute('src', $src);
	}

	/**
	 * Set width.
	 *
	 * @param string $width
	 *
	 * @return $this
	 */
	public function width($width) {
		return $this->setAttribute('width', $width);
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
