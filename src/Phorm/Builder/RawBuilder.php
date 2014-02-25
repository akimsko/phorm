<?php
/**
 * This file is part of the Phorm project.
 */

namespace Phorm\Builder;

use Phorm\Element\Element;
use Phorm\Element\Raw;

/**
 * Class RawBuilder
 *
 * @package Phorm\Builder
 * @author Bo Thinggaard <bo@unpossiblesystems.com>
 */
class RawBuilder extends ContentBuilder {

	/**
	 * Build element.
	 *
	 * @param Raw $element
	 *
	 * @return Element
	 */
	public function build(Raw $element = null) {
		return parent::buildInternal($element ? $element : new Raw());
	}
}