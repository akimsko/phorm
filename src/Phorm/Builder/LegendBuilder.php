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
 * Class LegendBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class LegendBuilder extends ContentBuilder {
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
			->setElementType('legend');
	}
}
