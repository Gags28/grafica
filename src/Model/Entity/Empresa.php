<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity
 *
 * @property int $id
 * @property string $nome
 *
 * @property \App\Model\Entity\EmpresaCnpj[] $empresa_cnpj
 * @property \App\Model\Entity\Funcinario[] $funcinario
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class Empresa extends Entity
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
        'empresa_cnpj' => true,
        'funcinario' => true,
        'usuarios' => true,
    ];
}
