<?php


namespace App\Controller;


use App\Model\DetailManager;

class DetailController
{
    protected $detailController;

    public function __construct()
    {
        $this->detailController = new DetailManager();
    }


}