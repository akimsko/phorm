<?php

namespace spec\Phorm\Renderer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Phorm\Elements\ElementContainer;
use Phorm\Elements\Element;

class PhpSpec extends ObjectBehavior {
	function it_is_initializable() {
		$this->shouldHaveType('Phorm\Renderer\Php');
		$this->shouldImplement('Phorm\Renderer\RendererInterface');
	}

	function it_should_map_types_to_templates() {
		$this->setTemplate('test1', 'testTemplate1');
		$this->getTemplate('test1')->shouldBeEqualTo('testTemplate1');
		$this->setTemplate('test2', 'testTemplate2');
		$this->getTemplate('test2')->shouldBeEqualTo('testTemplate2');
	}

	function it_should_have_a_default_template() {
		$this->getTemplate('somethingNotMapped')->shouldBeLike(true);
	}

	function it_render_elements() {
		$element1 = new Element(array('name' => 'test1'));
		$element1->setType('typeone');

		$element2 = new Element(array('name' => 'test2'));
		$element2->setType('typetwo');

		$container = new ElementContainer(array('name' => 'container'));
		$container
			->setChild('child1', $element1)
			->setChild('child2', $element2);

		$this->render($container)->shouldReturn(
<<<EOD
<container name="container">
	<typeone name="test1">
	<typetwo name="test2">
</container>

EOD
		);
	}
}
