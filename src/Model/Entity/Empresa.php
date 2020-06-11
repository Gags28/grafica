<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity
 *
 * @property int $id
 * @property string $nome
 * @property string|null $nome_resposavel
 * @property string|null $email_responsavel
 * @property string|null $telefone_responsavel
 * @property int|null $status
 *
 * @property \App\Model\Entity\EmpresaCnpj[] $empresa_cnpj
 * @property \App\Model\Entity\Funcinario[] $funcinario
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
        'nome_resposavel' => true,
        'email_responsavel' => true,
        'telefone_responsavel' => true,
        'status' => true,
        'empresa_cnpj' => true,
        'funcinario' => true,
    ];
}
