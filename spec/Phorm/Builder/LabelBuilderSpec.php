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

	function it_builds_to_spec(Element $element) {
		$this->for_('for')->shouldHaveType($this->type);
		$this->form('form')->shouldHaveType($this->type);

		$element->setElementType('label')->shouldBeCalled()->willReturn($element);
		$element->setTemplateName(null)->shouldBeCalled()->willReturn($element);
		$element->setAttributes(
				array(
					'for'  => 'for',
					'form' => 'form'
				)
		)->shouldBeCalled()->willReturn($element);

		$this->build($element)->shouldHaveType('Phorm\Element\Element');
	}
}
