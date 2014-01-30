<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LabelBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\LabelBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\Builder');
	}

	function it_builds_an_element_to_spec(Element $element) {
		$this->for_('for')->shouldHaveType($this->type);
		$this->form('form')->shouldHaveType($this->type);

		$element->setElementType('label')->shouldBeCalled();
		$element->setAttributes(
				array(
					'for'  => 'for',
					'form' => 'form'
				)
		)->shouldBeCalled();

		$this->build($element)->shouldHaveType('Phorm\Element\Element');
	}
}
