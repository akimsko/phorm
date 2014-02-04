<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OptionBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\OptionBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\Builder');
	}

	function it_builds_an_element_to_spec(Element $element) {
		$this->disabled('disabled')->shouldHaveType($this->type);
		$this->label('label')->shouldHaveType($this->type);
		$this->selected('selected')->shouldHaveType($this->type);
		$this->value('value')->shouldHaveType($this->type);

		$element->setElementType('option')->shouldBeCalled()->willReturn($element);
		$element->setTemplateName(null)->shouldBeCalled()->willReturn($element);
		$element->setAttributes(
				array(
					 'disabled' => 'disabled',
					 'label'    => 'label',
					 'selected' => 'selected',
					 'value'    => 'value',
				)
		)->shouldBeCalled()->willReturn($element);

		$this->build($element)->shouldHaveType('Phorm\Element\Element');
	}
}
