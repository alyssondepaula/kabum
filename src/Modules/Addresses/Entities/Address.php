<?php

namespace Src\Modules\Addresses\Entities;

class Address {
    public $id;
    public $street;
    public $number;
    public $zip;
    public $complement;
    public $city;
    public $state;
    public $isDefault;
    public $clientId;
}