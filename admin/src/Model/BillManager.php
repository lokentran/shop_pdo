<?php


namespace App\Model;


class BillManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAllBill()
    {
        $sql = "SELECT * FROM bills";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $bill = new Bill($item['date'], $item['status'], $item['totalPrice'], $item['customer_id']);
            $bill->setId($item['id']);
            array_push($arr, $bill);
        }
        return $arr;
    }


    public function addBill($bill)
    {
        $sql = "INSERT INTO `bills`( `date`, `status`, `totalPrice`, `customer_id`) VALUES (:date, :status , :totalPrice, :customer_id)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':date', $bill->getDate());
        $stmt->bindParam(':status', $bill->getStatus());
        $stmt->bindParam(':totalPrice', $bill->getTotalPrice());
        $stmt->bindParam(':customer_id', $bill->getCustomerId());
        $stmt->execute();
    }

//    public function getBillId($id)
//    {
//        $sql = "SELECT * FROM `bills` WHERE id =:id";
//        $stmt = $this->database->prepare($sql);
//        $stmt->bindParam(":id",$id);
//        $stmt->execute();
//        return $stmt->fetch();
//    }

    public function updateBillStatus($id, $status)
    {
        $sql = "UPDATE bills SET status =:status WHERE id =:id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
//
//    public function deleteBill($id)
//    {
//        $sql = 'DELETE FROM `bills` WHERE id = :id';
//        $stmt = $this->database->prepare($sql);
//        $stmt->bindParam(':id',$id);
//        $stmt->execute();
//    }

    public function detailBillAndCustomer()
    {
        $sql = "SELECT categories.name,products.name,products.price,details.quantity,bills.totalPrice,bills.status,customers.name,customers.phone,customers.email,customers.address FROM categories 
INNER JOIN products on categories.id = products.category_id
INNER Join details on products.id = details.product_id
INNER JOIN 	bills on details.bill_id = bills.id
INNER JOIN customers on bills.customer_id = customers.id";
        $stmt = $this->database->query($sql);
        return $stmt->fetchAll();
    }

    public function findDetailId($id)
    {
        $sql = "SELECT categories.name,products.name,products.price,details.quantity,bills.totalPrice,bills.status,customers.name,customers.phone,customers.email,customers.address,bills.id FROM categories INNER JOIN products on categories.id = products.category_id
INNER Join details on products.id = details.product_id
INNER JOIN 	bills on details.bill_id = bills.id
INNER JOIN customers on bills.customer_id = customers.id Where bills.id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}