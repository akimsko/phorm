<?php

namespace spec\Phorm\Element;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RawSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phorm\Element\Raw');
		$this->shouldHaveType('Phorm\Element\Element');
    }

	function it_has_content() {
		$this->setContent('test')->shouldHaveType('Phorm\Element\Raw');
		$this->getContent()->shouldReturn('test');
	}
}
