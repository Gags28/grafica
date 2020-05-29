<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Campos Model
 *
 * @property \App\Model\Table\CartoesTable&\Cake\ORM\Association\BelongsTo $Cartoes
 *
 * @method \App\Model\Entity\Campo newEmptyEntity()
 * @method \App\Model\Entity\Campo newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Campo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Campo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Campo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Campo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Campo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Campo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Campo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Campo[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Campo[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Campo[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Campo[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CamposTable extends Table
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

        $this->setTable('campos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cartoes', [
            'foreignKey' => 'cartao_id',
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->allowEmptyString('nome');

        $validator
            ->scalar('valor')
            ->maxLength('valor', 255)
            ->allowEmptyString('valor');

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

        return $rules;
    }
}
