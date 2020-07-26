<?php


namespace App\Controller;


use App\Model\Bill;
use App\Model\BillManager;
use App\Model\CustomerManager;
use App\Model\DetailManager;

class BillController
{
    protected $billController;
    protected $detailController;

    public function __construct()
    {
        $this->billController = new BillManager();
        $this->detailController = new DetailManager();
    }

    public function getAllBill()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $detailObj = new DetailManager();
            $customerObj = new CustomerManager();
            $customers = $customerObj->getAllCustomer();
            $details = $detailObj->getAllDetail();
            $bills = $this->billController->getAllBill();
            include('src/View/bill/list.php');
        }
    }

    public function getBillDetail()
    {
        $idBill = $_REQUEST['id'];
        $bills = $this->billController->getAllBill();
        $billDetails = $this->billController->findDetailId($idBill);
        include('src/View/bill/listDetail.php');
    }

    public function updateBillStatus()
    {

        $id = $_REQUEST['id'];
        $status = $_REQUEST['status'];
        $this->billController->updateBillStatus($id, $status);
        header('location:index.php?page=list-bill');
    }


}