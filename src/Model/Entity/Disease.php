<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Disease Entity
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $comment
 * @property string $code
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\DiseaseSpecific[] $disease_specifics
 * @property \App\Model\Entity\Patient[] $patients
 */
class Disease extends Entity
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
