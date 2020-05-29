<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CamposFuncionarios Model
 *
 * @method \App\Model\Entity\CamposFuncionario newEmptyEntity()
 * @method \App\Model\Entity\CamposFuncionario newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CamposFuncionario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CamposFuncionario get($primaryKey, $options = [])
 * @method \App\Model\Entity\CamposFuncionario findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CamposFuncionario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CamposFuncionario[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CamposFuncionario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CamposFuncionario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CamposFuncionario[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CamposFuncionario[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CamposFuncionario[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CamposFuncionario[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CamposFuncionariosTable extends Table
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

        $this->setTable('campos_funcionarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id_funcionario')
            ->allowEmptyString('id_funcionario');

        $validator
            ->integer('id_campo')
            ->allowEmptyString('id_campo');

        return $validator;
    }
}
