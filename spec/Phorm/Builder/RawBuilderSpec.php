<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Raw;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RawBuilderSpec extends ObjectBehavior
{
	private $type = 'Phorm\Builder\RawBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\ContentBuilder');
	}

	function it_builds_to_spec(Raw $content) {
		$this->setContent('test')->shouldHaveType($this->type);

		$content->setTemplateNameSpace(null)->shouldBeCalled()->willReturn($content);
		$content->setContent('test')->shouldBeCalled()->willReturn($content);
		$content->setTitle(null)->shouldBeCalled()->willReturn($content);
		$content->setDescription(null)->shouldBeCalled()->willReturn($content);
		$content->setError(null)->shouldBeCalled()->willReturn($content);
		$content->setExtras(array())->shouldBeCalled()->willReturn($content);
		$content->setAttributes(array())->shouldBeCalled()->willReturn($content);

		$this->build($content)->shouldHaveType('Phorm\Element\Element');
	}
}
