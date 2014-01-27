<?php

namespace Phorm\Element;

class Content extends Element {

	/** @var string */
	protected $content;

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
	public function getContent() {
		return $this->content;
	}
}
