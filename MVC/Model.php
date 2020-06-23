<?php

/*
 * Взять все поля с их id;
 */

namespace MVC;

use Classes;

class Model
{
    public function patch($id, $fields)
    {
        $patch = new Classes\Patch();
        return $patch->contactById($id, $fields);
    }

    public function getContactsOfLeadById($id)
    {
        $get = new Classes\Get();
        $lead = $get->leadById($id,'contacts');
        return $get->contactById($lead->_embedded->contacts[0]->id);
    }
}
