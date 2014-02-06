<?php

namespace spec\Phorm\Resolver;

use Phorm\Element\Element;
use Phorm\Resolver\Resolver;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResolverAggregateSpec extends ObjectBehavior {
	function it_is_initializable() {
		$this->shouldHaveType('Phorm\Resolver\ResolverAggregate');
	}

	function it_aggregates_resolvers(Resolver $resolver1, Resolver $resolver2, Element $element) {
		$resolver1->getTemplateForElement($element)->shouldBeCalled()->willReturn(null);
		$resolver2->getTemplateForElement($element)->shouldBeCalled()->willReturn('test');

		$this->registerResolver($resolver1)->shouldHaveType('Phorm\Resolver\ResolverAggregate');
		$this->registerResolver($resolver2)->shouldHaveType('Phorm\Resolver\ResolverAggregate');

		$this->resolve($element)->shouldReturn('test');
	}
}
