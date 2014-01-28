<?php

namespace spec\Phorm\Renderer\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RendererExceptionSpec extends ObjectBehavior {
	function it_is_initializable() {
		$this->shouldHaveType('Phorm\Exception\RendererException');
	}
}
