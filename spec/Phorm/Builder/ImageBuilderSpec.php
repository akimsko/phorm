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

		$this->setAlt('alt');
		$this->setFormaction('formaction');
		$this->setFormenctype('formenctype');
		$this->setFormmethod('formmethod');
		$this->setFormtarget('formtarget');
		$this->setHeight('height');
		$this->setSrc('src');
		$this->setWidth('width');

		$this->build($element)->shouldHaveType('Phorm\Element\Element');
	}

	function it_is_chainable() {
		$this->setAlt('alt')->shouldHaveType($this->type);
		$this->setFormaction('formaction')->shouldHaveType($this->type);
		$this->setFormenctype('formenctype')->shouldHaveType($this->type);
		$this->setFormmethod('formmethod')->shouldHaveType($this->type);
		$this->setFormtarget('formtarget')->shouldHaveType($this->type);
		$this->setHeight('height')->shouldHaveType($this->type);
		$this->setSrc('src')->shouldHaveType($this->type);
		$this->setWidth('width')->shouldHaveType($this->type);
	}
}
