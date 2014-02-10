<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Content;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OptionBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\OptionBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\ContentBuilder');
	}

	function it_builds_to_spec(Content $content) {
		$this->disabled('disabled')->shouldHaveType($this->type);
		$this->label('label')->shouldHaveType($this->type);
		$this->selected('selected')->shouldHaveType($this->type);
		$this->value('value')->shouldHaveType($this->type);
		$this->setContent('test')->shouldHaveType($this->type);

		$content->setElementType('option')->shouldBeCalled()->willReturn($content);
		$content->setTemplateName(null)->shouldBeCalled()->willReturn($content);
		$content->setContent('test')->shouldBeCalled()->willReturn($content);
		$content->setAttributes(
				array(
					 'disabled' => 'disabled',
					 'label'    => 'label',
					 'selected' => 'selected',
					 'value'    => 'value',
				)
		)->shouldBeCalled()->willReturn($content);

		$this->build($content)->shouldHaveType('Phorm\Element\Element');
	}
}
