<?php
namespace App\Traits;

trait GeneralMessage
{
    public static function GeneralMessage($type, $text){
        session()->flash('message', [
            'type' => $type,
            'text' => $text
            ]);
    }
}