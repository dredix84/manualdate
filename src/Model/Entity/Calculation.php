<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Calculation Entity
 *
 * @property int $id
 * @property string $start_date
 * @property string $end_date
 * @property string $created
 * @property string $modified
 */
class Calculation extends Entity
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
