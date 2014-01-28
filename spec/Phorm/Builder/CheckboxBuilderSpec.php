<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CheckboxBuilderSpec extends ObjectBehavior
{
	private $type = 'Phorm\Builder\CheckboxBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\InputBuilder');
	}

	function it_builds_an_element_to_spec(Element $element) {
		$element->setElementType('input')->shouldBeCalled();
		$element->setAttributes(
				array(
					'type'   => 'checkbox',
					'checked' => 'checked'
				)
		)->shouldBeCalled();

		$this->setChecked('checked');

		$this->build($element)->shouldHaveType('Phorm\Element\Element');
	}

	function it_is_chainable() {
		$this->setChecked('checked')->shouldHaveType($this->type);
	}
}
