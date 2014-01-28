<?php

namespace Phorm\Builder;

use Phorm\Element\Element;

class FileBuilder extends InputBuilder {
	/**
	 * Set accept.
	 *
	 * @param string $accept
	 *
	 * @return $this
	 */
	public function setAccept($accept) {
		return $this->setAttribute('accept', $accept);
	}

	/**
	 * Build element.
	 *
	 * @param Element $element
	 *
	 * @return Element
	 */
	public function build(Element $element = null) {
		$this->setType('file');
		return parent::build($element);
	}
}
