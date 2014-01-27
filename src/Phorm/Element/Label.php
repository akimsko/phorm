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

namespace Phorm\Element;

/**
 * Class Label
 *
 * @package Phorm
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class Label extends Content {

	/**
	 * Get for.
	 *
	 * @return null|string
	 */
	public function getFor() {
		return $this->getAttribute('for');
	}

	/**
	 * Get form.
	 *
	 * @return null|string
	 */
	public function getForm() {
		return $this->getAttribute('form');
	}

	/**
	 * Set for attribute.
	 *
	 * @param string $elementId
	 *
	 * @return Label
	 */
	public function setFor($elementId) {
		return $this->setAttribute('for', $elementId);
	}

	/**
	 * Set form attribute.
	 *
	 * @param string $formId
	 *
	 * @return Label
	 */
	public function setForm($formId) {
		return $this->setAttribute('form', $formId);
	}
}
