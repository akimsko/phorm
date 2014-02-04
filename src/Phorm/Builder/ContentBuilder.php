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
use Phorm\Element\Element;


/**
 * Class ContentBuilder
 *
 * @package Phorm\Builder
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 */
abstract class ContentBuilder extends Builder {

	/** @var string */
	private $content;

	/**
	 * Set content.
	 *
	 * @param string $content
	 *
	 * @return $this
	 */
	public function setContent($content) {
		$this->content = $content;
		return $this;
	}

	/**
	 * Get content.
	 *
	 * @return string
	 */
	protected function getContent() {
		return $this->content;
	}

	/**
	 * Build content.
	 *
	 * @param Content $element
	 *
	 * @return Content
	 */
	protected function buildContent(Content $element) {
		return $element->setContent($this->getContent());
	}

	/**
	 * Build internal.
	 *
	 * @param Element $element
	 *
	 * @return Content
	 */
	public function buildInternal(Element $element) {
		parent::buildInternal($element);
		return $this->buildContent($element);
	}
}