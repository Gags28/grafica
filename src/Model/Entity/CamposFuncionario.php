<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CamposFuncionario Entity
 *
 * @property int $id
 * @property int|null $id_funcionario
 * @property string|null $nome
 * @property string|null $valor
 * @property int|null $id_cartao
 * @property int|null $id_pedido
 */
class CamposFuncionario extends Entity
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
        'id_funcionario' => true,
        'nome' => true,
        'valor' => true,
        'id_cartao' => true,
        'id_pedido' => true,
    ];
}
