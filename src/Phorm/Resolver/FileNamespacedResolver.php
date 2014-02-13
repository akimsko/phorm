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

namespace Phorm\Resolver;

use Phorm\Element\Element;

/**
 * Class FileNamespacedResolver
 *
 * @package Phorm\Resolver
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class FileNamespacedResolver extends FileResolver {

	/**
	 * Get template name.
	 *
	 * @param Element $element
	 *
	 * @return string
	 */
	protected function getTemplateName(Element $element) {
		$name = parent::getTemplateName($element);
		if ($element->getTemplateNameSpace()) {
			$name = "{$element->getTemplateNameSpace()}/{$name}";
		}
		return $name;
	}
}