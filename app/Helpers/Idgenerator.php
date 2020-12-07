<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Idgenerator{


    public static  function generate_id($id_prefix, $entity)
    {

        $id_no    = DB::table('id_generator')->where('ENTITY', $entity)->value('ID');
        $data     =  trim($id_no) + 1;

        if (strlen($id_no) == 1) {
            self::update_id($data, $entity);
            return  $id_prefix . "00000" . $data;
        }

        if (strlen($id_no) == 2) {
            self::update_id($data, $entity);
            return  $id_prefix . "0000" . $data;
        }

        if (strlen($id_no) == 3) {
            self::update_id($data, $entity);
            return  $id_prefix . "000" . $data;
        }

        if (strlen($id_no) == 4) {
            self::update_id($data, $entity);
            return  $id_prefix . "00" . $data;
        }

        if (strlen($id_no) >= 5) {
            self::update_id($data, $entity);
            return  $id_prefix . "0" . $data;
        }
    }



    /***********************************************
      Updating Last Known ID field
     ************************************************/
    public static function update_id($id, $entity)
    {
        $affected = DB::table('id_generator')->where('ENTITY', $entity)->update(['ID' => $id]);
    }


}
