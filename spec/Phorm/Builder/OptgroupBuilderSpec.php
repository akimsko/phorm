<?php

namespace spec\Phorm\Builder;

use Phorm\Builder\OptionBuilder;
use Phorm\Element\Composite;
use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OptgroupBuilderSpec extends ObjectBehavior {
	private $type = 'Phorm\Builder\OptgroupBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\CompositeBuilder');
	}

	function it_builds_to_spec(Composite $optgroup, OptionBuilder $builder, Element $element) {
		$this->disabled('disabled')->shouldHaveType($this->type);
		$this->label('label')->shouldHaveType($this->type);

		$this->addOption($builder)->shouldHaveType($this->type);

		$optgroup->setElementType('optgroup')->shouldBeCalled()->willReturn($optgroup);
		$optgroup->addChild($element)->shouldBeCalled()->willReturn($optgroup);
		$optgroup->setTemplateNameSpace(null)->shouldBeCalled()->willReturn($optgroup);
		$optgroup->setTitle(null)->shouldBeCalled()->willReturn($optgroup);
		$optgroup->setDescription(null)->shouldBeCalled()->willReturn($optgroup);
		$optgroup->setError(null)->shouldBeCalled()->willReturn($optgroup);
		$optgroup->setExtras(array())->shouldBeCalled()->willReturn($optgroup);

		$optgroup->setAttributes(
				 array(
					  'disabled' => 'disabled',
					  'label'    => 'label',
				 )
		)        ->shouldBeCalled()->willReturn($optgroup);


		$builder->build()->shouldBecalled()->willReturn($element);
		$builder->setTemplateNamespace(null)->shouldBecalled()->willReturn($element);

		$this->build($optgroup)->shouldHaveType('Phorm\Element\Composite');
	}
}
