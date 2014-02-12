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
	 * Get template filename for element.
	 *
	 * @param Element $element
	 *
	 * @return string
	 */
	public function resolveFilename(Element $element) {
		$name = $element->getAttribute('type')
			? "{$element->getElementType()}_{$element->getAttribute('type')}"
			: $element->getElementType();

		if ($element->getTemplateName()) {
			$name = "{$element->getTemplateName()}/$name";
		}

		$filePath = array_key_exists($name, $this->templates)
			? $this->templates[$name]
			: $this->getTemplatePath() . $name . $this->getExtension();

		return $filePath;
	}
}