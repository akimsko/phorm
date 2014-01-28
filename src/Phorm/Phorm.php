<?php

/*
 * This file is part of the Phorm project.
 *
 * @link https://github.com/akimsko/phorm
 *
 * @copyright Copyright 2014 Bo Thinggaard
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Phorm;

use Phorm\Element\Element;
use Phorm\Exception\PhormException;
use Phorm\Renderer\Renderer;

/**
 * Class Phorm
 *
 * @package Phorm
 * @author  Bo Thinggaard <bo@unpossiblesystems.com>
 *
 * @method Builder\LabelBuilder label() Build a label element.
 * @method Builder\CheckboxBuilder checkbox() Build a checkbox element.
 * @method Builder\FileBuilder file() Build a file element.
 * @method Builder\FormBuilder form() Build a form.
 * @method Builder\ImageBuilder image() Build an image element.
 * @method Builder\InputBuilder input() Build an input element.
 * @method Builder\RadioBuilder radio() Build a radio element.
 */
class Phorm implements Renderer {

	/** @var Renderer */
	private $renderer;

	/** @var array type => builder class map. */
	private $builders = array(
		'label'    => 'Phorm\Builder\LabelBuilder',
		'checkbox' => 'Phorm\Builder\CheckboxBuilder',
		'file'     => 'Phorm\Builder\FileBuilder',
		'form'     => 'Phorm\Builder\FormBuilder',
		'image'    => 'Phorm\Builder\ImageBuilder',
		'input'    => 'Phorm\Builder\InputBuilder',
		'radio'    => 'Phorm\Builder\RadioBuilder',
	);

	/**
	 * @param Renderer $renderer
	 */
	public function __construct(Renderer $renderer) {
		$this->setRenderer($renderer);
	}

	/**
	 * Set renderer.
	 *
	 * @param Renderer $renderer
	 *
	 * @return $this
	 */
	public function setRenderer(Renderer $renderer) {
		$this->renderer = $renderer;
		return $this;
	}

	/**
	 * Get renderer.
	 *
	 * @return Renderer
	 */
	public function getRenderer() {
		return $this->renderer;
	}

	/**
	 * Register a builder.
	 *
	 * @param string $type
	 * @param string $class Fully qualified class name.
	 *
	 * @return $this
	 */
	public function registerBuilder($type, $class) {
		$this->builders[$type] = $class;
		return $this;
	}

	/**
	 * Magic builder caller.
	 *
	 * @param string $name
	 * @param array  $arguments
	 *
	 * @return \Phorm\Builder\Builder
	 *
	 * @throws Exception\PhormException
	 */
	public function __call($name, array $arguments) {
		if (!isset($this->builders[$name]) || !class_exists($this->builders[$name])) {
			throw new PhormException("No builder registered for '$name', or builder class not found.");
		}
		return new $this->builders[$name]();
	}

	/**
	 * Render an element.
	 *
	 * @param Element $element
	 *
	 * @return string The rendered element.
	 */
	public function render(Element $element) {
		return $this->getRenderer()->render($element);
	}
}
