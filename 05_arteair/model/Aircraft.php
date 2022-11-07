<?php

class Aircraft extends BaseModel {

    public static function getAll() {
        
        return BaseModel::getAllItems('airport');
    }

}