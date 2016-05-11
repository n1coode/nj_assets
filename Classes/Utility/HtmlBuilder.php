<?php
namespace N1coode\NjPage\Utility;

/**
 * @package nj_page
 */
class HtmlBuilder
{
	const _ATTRIBUTE_ANGULAR_APP			= 'ng-app';
	const _ATTRIBUTE_ANGULAR_VIEW			= 'ng-view';
	
	const _ATTRIBUTE_CLASS					= 'class';
	const _ATTRIBUTE_DATA_DEVICE			= 'data-device';
	const _ATTRIBUTE_DATA_ROLE				= 'data-role';
	const _ATTRIBUTE_DATA_ORIENTATION		= 'data-orientation';
	
	const _ATTRIBUTE_ID						= 'id';
	const _ATTRIBUTE_ROLE					= 'role';
	
	const _CLASS_PREFIX						= 'n1';
	const _CLASS_BASE						= 'n1base';
	const _CLASS_CONTAINER					= 'n1container';
	const _CLASS_SECTION					= 'n1section';
	const _CLASS_WRAPPER					= 'n1wrapper';
	
	const _ELEMENT_SECTION_ADDRESS			= 'address';
	const _ELEMENT_SECTION_ARTICLE			= 'article';
	const _ELEMENT_SECTION_ASIDE			= 'aside';
	const _ELEMENT_SECTION_BODY				= 'body';
	const _ELEMENT_SECTION_FOOTER			= 'footer';
	const _ELEMENT_SECTION_HEADER			= 'header';
	const _ELEMENT_SECTION_HEADLINE_1		= 'h1';
	const _ELEMENT_SECTION_HEADLINE_2		= 'h2';
	const _ELEMENT_SECTION_HEADLINE_3		= 'h3';
	const _ELEMENT_SECTION_HEADLINE_4		= 'h4';
	const _ELEMENT_SECTION_HEADLINE_5		= 'h5';
	const _ELEMENT_SECTION_HEADLINE_6		= 'h6';
	const _ELEMENT_SECTION_MAIN				= 'main';
	const _ELEMENT_SECTION_NAV				= 'nav';
	const _ELEMENT_SECTION_SECTION			= 'section';
	
	
	const _ELEMENT_STD_DIV					= 'div';
	
	const _EMPTY_SPACE						= ' ';
	
	const _TAG_ACTION_OPEN					= 'open';
	const _TAG_ACTION_CLOSE					= 'close';
	const _TAG_ACTION_COMPLETE				= 'complete';
	
	
	public static function attribute($name,$value)
	{
		return $name.'="'.$value.'"';
	}
	
	private static function tagOpen($element)
	{
		return '<'.$element;
	}
	
	private static function tagClose()
	{
		return '>';
	}
	
	public static function elementOpen($element, $tagAction)
	{
		switch($tagAction)
		{
			case self::_TAG_ACTION_OPEN:
				return self::tagOpen($element);
			case self::_TAG_ACTION_CLOSE:
				return self::tagClose();
			case self::_TAG_ACTION_COMPLETE:
				return self::tagOpen($element).self::tagClose();
		}
	}
	
	public static function elementClose($element)
	{
		return '</'.$element.'>';
	}
}