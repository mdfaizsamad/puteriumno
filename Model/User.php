<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property UserRole $UserRole
 */
class User extends AppModel
{
    // private static $queried = [];
    // public function find($query="first", $options=[])
    // {
    //     $opt = json_encode($options);
    //     if (isset(self::$queried[$query][$opt])) {
    //         $value = self::$queried[$query][$opt];
    //     } else {
    //         $value = parent::find($query, $options);
    //         self::$queried[$query][$opt] = $value;
    //     }
    //
    //     return $value;
    // }
}
