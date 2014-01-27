<?php

namespace spec\Phorm\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GeneralExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phorm\Exception\GeneralException');
    }
}
