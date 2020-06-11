<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmpresaCnpj Entity
 *
 * @property int $id
 * @property string $cnpj
 * @property int $empresa_id
 * @property string $status
 * @property string|null $rua
 * @property string|null $numero
 * @property string|null $complemento
 * @property string|null $bairro
 * @property string|null $cidade
 * @property string|null $estado
 *
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class EmpresaCnpj extends Entity
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
        'cnpj' => true,
        'empresa_id' => true,
        'status' => true,
        'rua' => true,
        'numero' => true,
        'complemento' => true,
        'bairro' => true,
        'cidade' => true,
        'estado' => true,
        'empresa' => true,
        'usuarios' => true,
    ];
}
