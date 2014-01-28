<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\FileBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\InputBuilder');
	}

	function it_builds_an_element_to_spec(Element $element) {
		$element->setElementType('input')->shouldBeCalled();
		$element->setAttributes(
				array(
					'type'   => 'file',
					'accept' => 'accept'
				)
		)->shouldBeCalled();

		$this->setAccept('accept');

		$this->build($element)->shouldHaveType('Phorm\Element\Element');
	}

	function it_is_chainable() {
		$this->setAccept('test')->shouldHaveType($this->type);
	}
}
