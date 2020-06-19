<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Carto Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $html
 * @property string|null $css
 * @property string $image
 * @property string|null $campos
 * @property string|null $image_verso
 */
class Carto extends Entity
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
        'html' => true,
        'css' => true,
        'image' => true,
        'campos' => true,
        'image_verso' => true,
    ];
}
