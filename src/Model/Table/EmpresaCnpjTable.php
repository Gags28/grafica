<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmpresaCnpj Model
 *
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 *
 * @method \App\Model\Entity\EmpresaCnpj newEmptyEntity()
 * @method \App\Model\Entity\EmpresaCnpj newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaCnpj[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaCnpj get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmpresaCnpj findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EmpresaCnpj patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaCnpj[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaCnpj|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpresaCnpj saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpresaCnpj[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmpresaCnpj[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmpresaCnpj[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmpresaCnpj[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EmpresaCnpjTable extends Table
{

    public $statusAtivo = 1;
    public $statusInativo = 9;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('empresa_cnpj');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Usuarios', [
            'foreignKey' => 'empresa_cnpj_id',
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
            ->scalar('cnpj')
            ->maxLength('cnpj', 15)
            ->requirePresence('cnpj', 'create')
            ->notEmptyString('cnpj')
            ->add('cnpj', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('status')
            ->maxLength('status', 45)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('rua')
            ->maxLength('rua', 255)
            ->allowEmptyString('rua');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 45)
            ->allowEmptyString('numero');

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 45)
            ->allowEmptyString('complemento');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 255)
            ->allowEmptyString('bairro');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 255)
            ->allowEmptyString('cidade');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 255)
            ->allowEmptyString('estado');

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
        $rules->add($rules->isUnique(['cnpj']));
        $rules->add($rules->existsIn(['empresa_id'], 'Empresas'));

        return $rules;
    }
}
