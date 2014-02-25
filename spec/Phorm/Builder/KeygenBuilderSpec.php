<?php

namespace spec\Phorm\Builder;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KeygenBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\KeygenBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\Builder');
	}

	function it_builds_to_spec(Element $element) {
		$this->autofocus('autofocus')->shouldHaveType($this->type);
		$this->challenge('challenge')->shouldHaveType($this->type);
		$this->disabled('disabled')->shouldHaveType($this->type);
		$this->form('form')->shouldHaveType($this->type);
		$this->keytype('keytype')->shouldHaveType($this->type);
		$this->name('name')->shouldHaveType($this->type);

		$element->setElementType('keygen')->shouldBeCalled()->willReturn($element);
		$element->setTemplateNameSpace(null)->shouldBeCalled()->willReturn($element);
		$element->setTitle(null)->shouldBeCalled()->willReturn($element);
		$element->setDescription(null)->shouldBeCalled()->willReturn($element);
		$element->setError(null)->shouldBeCalled()->willReturn($element);
		$element->setExtras(array())->shouldBeCalled()->willReturn($element);
		$element->setAttributes(
				array(
					 'autofocus' => 'autofocus',
					 'challenge' => 'challenge',
					 'disabled'  => 'disabled',
					 'form'      => 'form',
					 'keytype'   => 'keytype',
					 'name'      => 'name',
				)
		)       ->shouldBeCalled()->willReturn($element);


		$this->build($element)->shouldHaveType('Phorm\Element\Element');
	}
}
