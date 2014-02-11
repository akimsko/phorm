<?php

namespace spec\Phorm\Renderer;

use Phorm\Element\Composite;
use Phorm\Element\Content;
use Phorm\Element\Element;
use Phorm\Renderer\Renderer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HelperSpec extends ObjectBehavior
{
	private $renderer;

	function let(Renderer $renderer) {
		$this->renderer = $renderer;
		$this->beConstructedWith($renderer);
	}

    function it_is_initializable()
    {
        $this->shouldHaveType('Phorm\Renderer\Helper');
    }

	function it_renders_tags_and_attributes(Element $element) {
		$element->getElementType()->willReturn('test');
		$element->getTag()->willReturn('test');
		$element->getAttributes()->willReturn(array('test' => 'test'));

		$this->renderTagOpen($element)->shouldReturn("<test test=\"test\">\n");
		$this->renderTagClose($element)->shouldReturn("</test>\n");
		$this->renderAttributes(array('test' => 'test'))->shouldReturn(' test="test"');
	}

	function it_renders_element_element(Element $element) {
		$element->getElementType()->willReturn('test');
		$element->getTag()->willReturn('test');
		$element->getAttributes()->willReturn(array('test' => 'test'));
		$element->getLabel()->willReturn(null);

		$this->renderElement($element)->shouldReturn("<test test=\"test\">\n");
	}

	function it_renders_content_element(Content $element) {
		$element->getElementType()->willReturn('test');
		$element->getTag()->willReturn('test');
		$element->getAttributes()->willReturn(array('test' => 'test'));
		$element->getContent()->willReturn('test');
		$element->getLabel()->willReturn(null);

		$this->renderElement($element)->shouldReturn("<test test=\"test\">test</test>\n");
	}

	function it_renders_composite_element(Composite $composite, Element $element1, Element $element2) {
		$this->renderer->render($element1)->willReturn("<typeone name=\"test1\">\n");
		$this->renderer->render($element2)->willReturn("<typetwo name=\"test2\">\n");

		$composite->getElementType()->willReturn('composite');
		$composite->getTag()->willReturn('composite');
		$composite->getAttributes()->willReturn(array('name' => 'container'));
		$composite->getChildren()->willReturn(array($element1, $element2));
		$composite->getLabel()->willReturn(null);

		$this->renderElement($composite)->shouldReturn(
<<<EOD
<composite name="container">
	<typeone name="test1">
	<typetwo name="test2">
</composite>

EOD
		);
	}
}
