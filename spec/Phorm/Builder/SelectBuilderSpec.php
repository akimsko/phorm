<?php

namespace spec\Phorm\Builder;

use Phorm\Builder\OptgroupBuilder;
use Phorm\Builder\OptionBuilder;
use Phorm\Element\Composite;
use Phorm\Element\Content;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SelectBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\SelectBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\CompositeBuilder');
	}

	function it_builds_to_spec(Composite $select, OptionBuilder $builder, OptgroupBuilder $optgroup, Content $element) {
		$this->autofocus('autofocus')->shouldHaveType($this->type);
		$this->disabled('disabled')->shouldHaveType($this->type);
		$this->form('form')->shouldHaveType($this->type);
		$this->multiple('multiple')->shouldHaveType($this->type);
		$this->name('name')->shouldHaveType($this->type);
		$this->required('required')->shouldHaveType($this->type);
		$this->size('size')->shouldHaveType($this->type);
		$this->selected('test')->shouldHaveType($this->type);

		$this->option($builder)->shouldHaveType($this->type);
		$this->options(array())->shouldHaveType($this->type);
		$this->optgroup($optgroup)->shouldHaveType($this->type);

		$select->setElementType('select')->shouldBeCalled()->willReturn($select);
		$select->addChild($element)->shouldBeCalled()->willReturn($select);
		$select->setTemplateNameSpace(null)->shouldBeCalled()->willReturn($select);

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
		)->shouldBeCalled()->willReturn($select);


		$builder->build()->shouldBecalled()->willReturn($element);
		$builder->setTemplateNamespace(null)->shouldBecalled()->willReturn($element);
		$optgroup->build()->shouldBecalled()->willReturn($element);
		$optgroup->setTemplateNamespace(null)->shouldBecalled()->willReturn($element);

		$this->build($select)->shouldHaveType('Phorm\Element\Composite');
	}
}
