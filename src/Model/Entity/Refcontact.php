<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Refcontact Entity
 *
 * @property int $id
 * @property int $referrer_id
 * @property string $type
 * @property string $status
 * @property string $first_name
 * @property string $other_name
 * @property string $last_name
 * @property string $email
 * @property int $phone
 * @property int $mobile_phone
 * @property int $other_phone
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Referrer $referrer
 */
class Refcontact extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
        protected function _getFullName()
    {
        return $this->_properties['first_name'] . '  ' . $this->_properties['other_name'] . ' ' .
        $this->_properties['last_name'];
    }

}
