<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Referrer Entity
 *
 * @property int $id
 * @property string $type
 * @property string $status
 * @property string $business_name
 * @property string $email
 * @property int $phone
 * @property int $fax_phone
 * @property string $address1
 * @property string $address2
 * @property string $suburb
 * @property int $postcode
 * @property string $state
 * @property string $country
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Patient[] $patients
 * @property \App\Model\Entity\Refcontact[] $refcontacts
 */
class Referrer extends Entity
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
}
