<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string|null $foto
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property string $telefone
 * @property int $limite_pedidos
 * @property int $empresa_cnpj_id
 * @property int $tipo
 * @property int $status
 *
 * @property \App\Model\Entity\Empresa $empresa
 */
class Usuario extends Entity
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
        'foto' => true,
        'nome' => true,
        'email' => true,
        'senha' => true,
        'telefone' => true,
        'limite_pedidos' => true,
        'empresa_cnpj_id' => true,
        'tipo' => true,
        'status' => true,
        'empresa' => true,
    ];
}
