<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Content;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OutputBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\OutputBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\ContentBuilder');
	}

	function it_builds_to_spec(Content $content) {
		$this->for_('for')->shouldHaveType($this->type);
		$this->form('form')->shouldHaveType($this->type);
		$this->name('name')->shouldHaveType($this->type);
		$this->setContent('test')->shouldHaveType($this->type);

		$content->setElementType('output')->shouldBeCalled()->willReturn($content);
		$content->setTemplateName(null)->shouldBeCalled()->willReturn($content);
		$content->setContent('test')->shouldBeCalled()->willReturn($content);

		$content->setAttributes(
				array(
					 'for'  => 'for',
					 'form' => 'form',
					 'name' => 'name',
				)
		)->shouldBeCalled()->willReturn($content);

		$this->build($content)->shouldHaveType('Phorm\Element\Content');
	}
}
