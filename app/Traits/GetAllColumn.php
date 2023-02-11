<?php
namespace App\Traits;

trait GetAllColumn
{
    public static function getAllColumn($column = 'id')
    {
        $models = (new self)->select($column)->get();
        $string = '';
        foreach ($models as $model) {
            $string .= $model->{$column} . ',';
        }
        return rtrim($string, ',');
    }
}