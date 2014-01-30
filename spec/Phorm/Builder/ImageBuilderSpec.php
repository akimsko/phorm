<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImageBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\ImageBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\InputBuilder');
	}

	function it_builds_an_element_to_spec(Element $element) {
		$this->alt('alt')->shouldHaveType($this->type);
		$this->formaction('formaction')->shouldHaveType($this->type);
		$this->formenctype('formenctype')->shouldHaveType($this->type);
		$this->formmethod('formmethod')->shouldHaveType($this->type);
		$this->formtarget('formtarget')->shouldHaveType($this->type);
		$this->height('height')->shouldHaveType($this->type);
		$this->src('src')->shouldHaveType($this->type);
		$this->width('width')->shouldHaveType($this->type);

		$element->setElementType('input')->shouldBeCalled();
		$element->setAttributes(
				array(
					'type'        => 'image',
					'alt'         => 'alt',
					'formaction'  => 'formaction',
					'formenctype' => 'formenctype',
					'formmethod'  => 'formmethod',
					'formtarget'  => 'formtarget',
					'height'      => 'height',
					'src'         => 'src',
					'width'       => 'width',
				)
		)->shouldBeCalled();

		$this->build($element)->shouldHaveType('Phorm\Element\Element');
	}
}
