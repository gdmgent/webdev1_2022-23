<?php

class Airport extends BaseModel {

    public static function getAll() {
        
        return BaseModel::getAllItems('airport');
    }

}