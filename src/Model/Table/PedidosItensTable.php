<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PedidosItens Model
 *
 * @property \App\Model\Table\PedidosTable&\Cake\ORM\Association\BelongsTo $Pedidos
 *
 * @method \App\Model\Entity\PedidosIten newEmptyEntity()
 * @method \App\Model\Entity\PedidosIten newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PedidosIten[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PedidosIten get($primaryKey, $options = [])
 * @method \App\Model\Entity\PedidosIten findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PedidosIten patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PedidosIten[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PedidosIten|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PedidosIten saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PedidosIten[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PedidosIten[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PedidosIten[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PedidosIten[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PedidosItensTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pedidos_itens');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cartoes', [
            'foreignKey' => 'cartao_id',
        ]);
        $this->belongsTo('Pedidos', [
            'foreignKey' => 'pedido_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('quantidade')
            ->allowEmptyString('quantidade');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['cartao_id'], 'Cartoes'));
        $rules->add($rules->existsIn(['pedido_id'], 'Pedidos'));

        return $rules;
    }
}
