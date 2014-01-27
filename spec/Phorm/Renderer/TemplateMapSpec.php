<?php

namespace spec\Phorm\Renderer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TemplateMapSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phorm\Renderer\TemplateMap');
    }

	function it_should_map_types_to_templates() {
		$this->setTemplate('test1', 'testTemplate1');
		$this->getTemplate('test1')->shouldBeEqualTo('testTemplate1');
		$this->setTemplate('test2', 'testTemplate2');
		$this->getTemplate('test2')->shouldBeEqualTo('testTemplate2');
	}

	function it_should_have_a_default_template() {
		$this->setDefaultTemplate('test');
		$this->getTemplate('somethingNotMapped')->shouldBe('test');
	}
}
