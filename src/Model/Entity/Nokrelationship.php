<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nokrelationship Entity.
 *
 * @property int $id
 * @property int $patient_id
 * @property \App\Model\Entity\Patient $patient
 * @property string $relationship
 * @property string $gender
 * @property string $first_name
 * @property string $other_name
 * @property string $last_name
 * @property \Cake\I18n\Time $dateofbirth
 * @property string $email
 * @property string $poa
 * @property int $home_phone
 * @property int $work_phone
 * @property int $mobile_phone
 * @property int $other_phone
 * @property string $address1
 * @property string $address2
 * @property string $suburb
 * @property int $postcode
 * @property string $state
 * @property string $country
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Nokrelationship extends Entity
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
        'id' => false,
    ];
}
