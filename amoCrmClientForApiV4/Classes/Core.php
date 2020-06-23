<?php


namespace Classes;

use libs;

class Core
{
    public $amo;

    public function __construct()
    {
        //Доступ к amoCRM
        $AMO_DOMAIN = '';
        $AMO_API ='';
        $AMO_LOGIN ='';
        $this->amo = new libs\hamtimAmocrm($AMO_LOGIN, $AMO_API, $AMO_DOMAIN);
    }
}
