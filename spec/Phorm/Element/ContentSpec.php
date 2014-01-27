<?php

namespace spec\Phorm\Element;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ContentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phorm\Element\Content');
    }

	function it_has_content() {
		$this->setContent('test');
		$this->getContent()->shouldReturn('test');
	}

	function it_is_chainable() {
		$this->setContent('test')->shouldHaveType('Phorm\Element\Content');
	}
}
