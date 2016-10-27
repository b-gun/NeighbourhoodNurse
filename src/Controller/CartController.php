<?php
/**
 * Created by PhpStorm.
 * User: Lawrence
 * Date: 8/6/2016
 * Time: 10:06 PM
 */
namespace App\Controller;

use App\Controller\AppController;
use App\Form\CartForm;

class ContactController extends AppController
{
    public $useTable = false;

    public function add() {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $this->Cart->addProduct($this->request->data['Cart']['ProductID']);
        }
        echo $this->Cart->getCount();
    }

    /*
     * add a product to cart
     */
    public function addProduct($productId) {
        $allProducts = $this->readProduct();
        if (null!=$allProducts) {
            if (array_key_exists($productId, $allProducts)) {
                $allProducts[$productId]++;
            } else {
                $allProducts[$productId] = 1;
            }
        } else {
            $allProducts[$productId] = 1;
        }

        $this->saveProduct($allProducts);
    }

    /*
     * get total count of products
     */
    public function getCount() {
        $allProducts = $this->readProduct();

        if (count($allProducts)<1) {
            return 0;
        }

        $count = 0;
        foreach ($allProducts as $product) {
            $count=$count+$product;
        }

        return $count;
    }
    /*
     * save data to session
     */
    public function saveProduct($data) {
        return  $this->request->session()->write('Cart.items', array_merge($this->request->session()->read('Cart'), array($data)));
    }

    /*
     * read cart data from session
     */
    public function readProduct() {
        return $this->request->session()->read('Cart.items');
    }
}