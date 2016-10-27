<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class CartForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('ProductID', 'string');
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('ProductID', 'length', [
            'rule' => ['minLength', 10],
            'message' => 'Error, try again'
        ]);
    }

    protected function _execute(array $data)
    {
        return true;
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
?>