<?php

namespace Phorm\Builder;

use Phorm\Element\Composite;

class FormBuilder extends Builder {

	/**
	 * Get default element type.
	 *
	 * @return string
	 */
	protected function getDefaultElementType() {
		return 'form';
	}

	public function setAcceptCharset($acceptCharset) {
		return $this->setAttribute('accept-charset', $acceptCharset);
	}

	public function setAction($action) {
		return $this->setAttribute('action', $action);
	}

	public function setAutocomplete($autocomplete) {
		return $this->setAttribute('autocomplete', $autocomplete);
	}

	public function setEnctype($enctype) {
		return $this->setAttribute('enctype', $enctype);
	}

	public function setMethod($method) {
		return $this->setAttribute('method', $method);
	}

	public function setName($name) {
		return $this->setAttribute('name', $name);
	}

	public function setNovalidate($novalidate) {
		return $this->setAttribute('novalidate', $novalidate);
	}

	public function setTarget($target) {
		return $this->setAttribute('target', $target);
	}

	/**
	 * Build element.
	 *
	 * @return \Phorm\Element\Composite
	 */
	public function build() {
		$form = new Composite();
		return $form
			->setAttributes($this->getAttributes())
			->setTag($this->getElementType());
	}
}
