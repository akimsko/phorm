<?php

namespace spec\Phorm\Renderer\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TemplateNotFoundExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phorm\Renderer\Exception\TemplateNotFoundException');
    }
}
