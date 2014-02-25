<?php

namespace spec\Phorm\Builder;

use Phorm\Builder\Builder;
use Phorm\Element\Composite;
use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FieldsetBuilderSpec extends ObjectBehavior
{
	private $type = 'Phorm\Builder\FieldsetBuilder';

	function it_is_initializable() {
		$this->shouldHaveType($this->type);
		$this->shouldHaveType('Phorm\Builder\CompositeBuilder');
	}

	function it_builds_to_spec(Composite $group, Builder $builder, Element $element) {
		$this->addElement($builder)->shouldHaveType($this->type);

		$group->setElementType('fieldset')->shouldBeCalled()->willReturn($group);
		$group->addChild($element)->shouldBeCalled()->willReturn($group);
		$group->setTemplateNameSpace(null)->shouldBeCalled()->willReturn($group);
		$group->setTitle(null)->shouldBeCalled()->willReturn($group);
		$group->setDescription(null)->shouldBeCalled()->willReturn($group);
		$group->setError(null)->shouldBeCalled()->willReturn($group);
		$group->setExtras(array())->shouldBeCalled()->willReturn($group);

		$group->setAttributes(array())
			->shouldBeCalled()
			->willReturn($group);

		$builder->build()->shouldBecalled()->willReturn($element);
		$builder->setTemplateNamespace(null)->shouldBecalled()->willReturn($element);

		$this->build($group)->shouldHaveType('Phorm\Element\Composite');
	}
}
