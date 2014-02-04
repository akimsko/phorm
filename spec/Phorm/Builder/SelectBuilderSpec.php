<?php

namespace spec\Phorm\Builder;

use Phorm\Builder\OptgroupBuilder;
use Phorm\Builder\OptionBuilder;
use Phorm\Element\Composite;
use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SelectBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\SelectBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\CompositeBuilder');
	}

	function it_builds_a_form_to_spec(Composite $select, OptionBuilder $builder, OptgroupBuilder $optgroup, Element $element) {
		$this->autofocus('autofocus')->shouldHaveType($this->type);
		$this->disabled('disabled')->shouldHaveType($this->type);
		$this->form('form')->shouldHaveType($this->type);
		$this->multiple('multiple')->shouldHaveType($this->type);
		$this->name('name')->shouldHaveType($this->type);
		$this->required('required')->shouldHaveType($this->type);
		$this->size('size')->shouldHaveType($this->type);

		$this->addOption($builder)->shouldHaveType($this->type);
		$this->addOptgroup($optgroup)->shouldHaveType($this->type);

		$select->setElementType('select')->shouldBeCalled()->willReturn($select);
		$select->addChild($element)->shouldBeCalled()->willReturn($select);
		$select->setTemplateName(null)->shouldBeCalled()->willReturn($select);

		$select->setAttributes(
			 array(
				  'autofocus' => 'autofocus',
				  'disabled'  => 'disabled',
				  'form'      => 'form',
				  'multiple'  => 'multiple',
				  'name'      => 'name',
				  'required'  => 'required',
				  'size'      => 'size',
			 )
		)    ->shouldBeCalled()->willReturn($select);


		$builder->build()->willReturn($element);
		$optgroup->build()->willReturn($element);

		$this->build($select)->shouldHaveType('Phorm\Element\Composite');
	}
}
