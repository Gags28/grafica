<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Funcionario Entity
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $cargo
 * @property int|null $empresa_id
 * @property int|null $status
 * @property string|null $email
 * @property string|null $telefone
 *
 * @property \App\Model\Entity\Empresa $empresa
 */
class Funcionario extends Entity
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
        'cargo' => true,
        'empresa_id' => true,
        'status' => true,
        'email' => true,
        'telefone' => true,
        'empresa' => true,
    ];
}
