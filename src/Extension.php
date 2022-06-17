<?php
declare(strict_types=1);

namespace Kravcik\LatteFontAwesomeIcon;

use Latte;
use Nette\Utils\Html;

class Extension extends Latte\Extension
{
	public static string $defaultStyle;

	public static bool $defaultFixedWidth;

	public static string $defaultElement;

	private static array $colorClass = [
		'primary',
		'secondary',
		'success',
		'danger',
		'warning',
		'info',
		'light',
		'dark',
		'body',
		'muted',
		'white',
		'black-50',
		'white-50'
	];

	public function __construct
	(
		?string $defaultStyle,
		?bool $defaultFixedWidth,
		?string $defaultElement
	)
	{
		self::$defaultStyle = $defaultStyle ?: 'fal';
		self::$defaultFixedWidth = $defaultFixedWidth === false ? $defaultFixedWidth : true;
		self::$defaultElement = $defaultElement ?: 'span';
	}


	public function getTags(): array
	{
		return [
			'icon' => [$this, 'createNode']
		];
	}


	public function createNode(Latte\Compiler\Tag $tag): Latte\Compiler\Node
	{		
		$subject = $tag->parser->parseUnquotedStringOrExpression();
		$tag->parser->stream->tryConsume(',');
		$args = $tag->parser->parseArguments();

		return new Latte\Compiler\Nodes\AuxiliaryNode(
			fn(Latte\Compiler\PrintContext $context) =>
				$context->format('echo %escape(\Kravcik\LatteFontAwesomeIcon\Extension::render(%node, ...%node));', $subject, $args)
		);
	}


	public static function render($name, ?string $color = null, ?int $size = null, ?bool $fw = null, ?string $element = null, ?string $style = null, ?string $class = null): Html
	{		
		$param = [];				
		$param[] = $style ?: self::$defaultStyle;
		$param[] = 'fa-' . $name;
		
		if($fw === true || ($fw === null && self::$defaultFixedWidth === true))
		{
			$param[] = 'fa-fw';
		}

		if($size !== null)
		{
			$param[] = is_numeric($size) ? 'fa-' . $size . 'x' : 'fa-' . $size;
		}

		if(!empty($class))
		{
			$param[] = $class;
		}

		if($color)
		{
			$param[] = in_array($color, self::$colorClass, true) ? 'text-' . $color : 'color-' . $color;
		}

		return Html::el($element ?: self::$defaultElement)->class(implode(' ', $param));
	}
}