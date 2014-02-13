<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Content;
use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LabelBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\LabelBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\ContentBuilder');
	}

	function it_builds_to_spec(Content $content) {
		$this->for_('for')->shouldHaveType($this->type);
		$this->form('form')->shouldHaveType($this->type);
		$this->setContent('test')->shouldHaveType($this->type);

		$content->setElementType('label')->shouldBeCalled()->willReturn($content);
		$content->setTemplateNameSpace(null)->shouldBeCalled()->willReturn($content);
		$content->setContent('test')->shouldBeCalled()->willReturn($content);
		$content->setAttributes(
				array(
					'for'  => 'for',
					'form' => 'form'
				)
		)->shouldBeCalled()->willReturn($content);

		$this->build($content)->shouldHaveType('Phorm\Element\Content');
	}
}
