<?php

namespace spec\Phorm\Resolver;

use Phorm\Element\Element;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileResolverSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phorm\Resolver\FileResolver');
		$this->shouldHaveType('Phorm\Resolver\Resolver');
    }

	function it_maps_keys_to_templates() {
		$this->registerTemplate('test1', 'testTemplate1');
		$this->getTemplate('test1')->shouldBeEqualTo('testTemplate1');
		$this->registerTemplate('test2', 'testTemplate2');
		$this->getTemplate('test2')->shouldBeEqualTo('testTemplate2');
	}

	function it_resolves_template_for_elementtype(Element $element) {
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn(null);
		$element->getTemplateName()->willReturn(null);
		$this->getTemplateForElement($element)->shouldReturn('testtype');
	}

	function it_resolves_template_for_elementtype_with_type(Element $element) {
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn('subtype');
		$element->getTemplateName()->willReturn(null);
		$this->getTemplateForElement($element)->shouldReturn('testtype_subtype');
	}

	function it_resolves_template_for_elementtype_with_type_and_template_name(Element $element) {
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn('subtype');
		$element->getTemplateName()->willReturn('templatename');
		$this->getTemplateForElement($element)->shouldReturn('templatename/testtype_subtype');
	}

	function it_resolves_template_for_elementtype_with_template_name(Element $element) {
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn(null);
		$element->getTemplateName()->willReturn('templatename');
		$this->getTemplateForElement($element)->shouldReturn('templatename/testtype');
	}

	function it_overrides_convention_with_registered_templates(Element $element) {
		$this->registerTemplate('testtype', 'testTemplate1');
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn(null);
		$element->getTemplateName()->willReturn(null);
		$this->getTemplateForElement($element)->shouldReturn('testTemplate1');

		$this->registerTemplate('testtype_subtype', 'testTemplate2');
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn('subtype');
		$element->getTemplateName()->willReturn(null);
		$this->getTemplateForElement($element)->shouldReturn('testTemplate2');

		$this->registerTemplate('templatename/testtype_subtype', 'testTemplate3');
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn('subtype');
		$element->getTemplateName()->willReturn('templatename');
		$this->getTemplateForElement($element)->shouldReturn('testTemplate3');

		$this->registerTemplate('templatename/testtype', 'testTemplate4');
		$element->getElementType()->willReturn('testtype');
		$element->getAttribute('type')->willReturn(null);
		$element->getTemplateName()->willReturn('templatename');
		$this->getTemplateForElement($element)->shouldReturn('testTemplate4');
	}
}
