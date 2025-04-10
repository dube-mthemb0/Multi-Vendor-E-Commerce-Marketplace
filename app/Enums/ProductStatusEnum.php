<?php

namespace App\Enums;

enum ProductStatusEnum: string
{
    case Draft = 'draft';
    case Published = 'published';

    public static function labels(): array
    {
        return [
            self::Draft->value => __('Draft'),
            self::Published->value => __('Published'),
        ];
    }

    public static function colors(): array
    {
        return [
            self::Draft->value => 'gray', // Draft should be gray
            self::Published->value => 'success', // Published should be success (green)
        ];
    }
}
