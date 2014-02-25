<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Content;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LegendBuilderSpec extends ObjectBehavior
{
	private $type = 'Phorm\Builder\LegendBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\ContentBuilder');
	}

	function it_builds_to_spec(Content $content) {
		$this->setContent('test')->shouldHaveType($this->type);

		$content->setElementType('legend')->shouldBeCalled()->willReturn($content);
		$content->setTemplateNameSpace(null)->shouldBeCalled()->willReturn($content);
		$content->setContent('test')->shouldBeCalled()->willReturn($content);
		$content->setAttributes(array())->shouldBeCalled()->willReturn($content);
		$content->setTitle(null)->shouldBeCalled()->willReturn($content);
		$content->setDescription(null)->shouldBeCalled()->willReturn($content);
		$content->setError(null)->shouldBeCalled()->willReturn($content);
		$content->setExtras(array())->shouldBeCalled()->willReturn($content);

		$this->build($content)->shouldHaveType('Phorm\Element\Content');
	}
}
