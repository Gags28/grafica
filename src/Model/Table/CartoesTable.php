<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cartoes Model
 *
 * @method \App\Model\Entity\Carto newEmptyEntity()
 * @method \App\Model\Entity\Carto newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Carto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Carto findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Carto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Carto[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carto[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carto[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carto[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Carto[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CartoesTable extends Table
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

        $this->setTable('cartoes');
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
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('html')
            ->maxLength('html', 4294967295)
            ->requirePresence('html', 'create')
            ->notEmptyString('html');

        $validator
            ->scalar('css')
            ->maxLength('css', 4294967295)
            ->allowEmptyString('css');

        $validator
            ->scalar('image')
            ->maxLength('image', 4294967295)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->scalar('campos')
            ->maxLength('campos', 255)
            ->allowEmptyString('campos');

        $validator
            ->scalar('image_verso')
            ->maxLength('image_verso', 255)
            ->allowEmptyFile('image_verso');

        return $validator;
    }
}
