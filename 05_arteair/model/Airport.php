<?php

class Airport extends BaseModel {

    public function full_name() {
        return $this->name . ' - ' . $this->airport_code;
    }
}