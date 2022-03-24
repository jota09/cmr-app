<?php


namespace App\DTO;

abstract class AbstractPublicDTO
{
    /**
     * @return static
     */
    public static function instance()
    {
        return new static;
    }

    abstract public function load($model);

    /**
     * Load model to dto with all attr
     *
     * @return void
     */
    public function loadFullModel($model)
    {
        $arr = [];
        if($model){
            foreach ($model->attributesToArray() as $key => $value){
                $arr[$key] = $value;
            }
        }
        return (object) $arr;
    }

}
