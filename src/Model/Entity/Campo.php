<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Campo Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $valor
 * @property int|null $cartao_id
 *
 * @property \App\Model\Entity\Carto $carto
 */
class Campo extends Entity
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
        'nome' => true,
        'valor' => true,
        'cartao_id' => true,
        'carto' => true,
    ];
}
