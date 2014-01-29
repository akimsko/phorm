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

namespace Phorm\Renderer;

use Phorm\Element\Element;

/**
 * Class Php
 *
 * @package Phorm\Renderer
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class Php extends Template {

	/**
	 * Render an element tree.
	 *
	 * @param Element $element
	 *
	 * @return string The rendered element tree.
	 */
	public function render(Element $element) {
		static $scoper;

		if (!$scoper) {
			$scoper = new PhpScoper($this->getTemplates(), $this->getHelper());
		}

		return $scoper->render($element);
	}
}

/**
 * Class PhpScoper
 *
 * A bit of hack in an attempt to isolate the php template as much as possible.
 *
 * @package Phorm\Renderer
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
class PhpScoper {

	/** @var array */
	private $superNotSoSecretStuff = array();

	/**
	 * @param TemplateResolver $templates
	 * @param Helper           $helper
	 */
	public function __construct(TemplateResolver $templates, Helper $helper) {
		$this->superNotSoSecretStuff['resolver'] = $templates;
		$this->superNotSoSecretStuff['helper'] = $helper;
	}

	/**
	 * Render an element tree.
	 *
	 * @param Element $element
	 *
	 * @return string The rendered element tree.
	 */
	public function render(Element $element) {
		$formHelper = $this->superNotSoSecretStuff['helper'];
		if (!($this->superNotSoSecretStuff['template'] = $this->superNotSoSecretStuff['resolver']->getTemplateForElement($element))) {
			return $formHelper->renderElement($element);
		}
		ob_start();
		require $this->superNotSoSecretStuff['template'];
		return ob_get_clean();
	}
}
