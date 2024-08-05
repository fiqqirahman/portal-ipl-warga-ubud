<?php

namespace App\Enums;

enum MasterConfigTypeEnum: string {
	case Number = 'number';
	case Text = 'text';
	case RichText = 'richtext';
	case Boolean = 'boolean';
	case Color = 'color';
	case Email = 'email';
	case TextArea = 'textarea';
	case Double = 'double';
	
	public function label(): string
	{
		return match($this) {
			self::Number => 'Number',
			self::Text => 'Text',
			self::RichText => 'Rich Text',
			self::Boolean => 'Boolean',
			self::Color => 'Color',
			self::Email => 'Email',
			self::TextArea => 'Text Area',
			self::Double => 'Double'
		};
	}
	
	public static function isCommonText(): array
	{
		return [
			self::Number->value,
			self::Text->value,
			self::Color->value,
			self::Email->value
		];
	}
}
