<?php
namespace Src\Modules\Users\Mappers;


use Src\Modules\Users\Entities\User;

abstract class Usermap {

    public static function UserMap($obj){

        $user = new User();

        echo $obj->id;

        $user->id = $obj->id;
        $user->name = $obj->email;
        $user->email = $obj->email;
        $user->password = $obj->password;

        return $user;

    }
}
?>