<?php
namespace App\Traits;

trait GetAllColumn
{
    public static function getAllColumn($field = 'id', $array = false)
    {
        $models = (new self)->select($field)->get();
        $string = '';
        foreach ($models as $model) {
            $string .= $model->{$field} . ',';
        }
        $columns =  rtrim($string, ',');
        if($array){
            return array_map('intval', explode(",", $columns));
        }
        return $columns;
    }
}