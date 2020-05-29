<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \App\Model\Table\EmpresaTable&\Cake\ORM\Association\BelongsTo $Empresa
 *
 * @method \App\Model\Entity\Usuario newEmptyEntity()
 * @method \App\Model\Entity\Usuario newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsuariosTable extends Table
{
    public $statusAtivo = 1;
    public $statusInativo = 2;

    public $tipoAdmin = 1;
    public $tipoComprador = 2;
    public $tipoSolicitante = 3;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('usuarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Empresa', [
            'foreignKey' => 'empresa_id',
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
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->scalar('senha')
            ->maxLength('senha', 255)
            ->allowEmptyString('senha');

        $validator
            ->integer('limite_pedidos')
            ->allowEmptyString('limite_pedidos');

        $validator
            ->integer('tipo')
            ->allowEmptyString('tipo');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

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
        $rules->add($rules->existsIn(['empresa_id'], 'Empresa'));

        return $rules;
    }

    public function beforeSave(\Cake\Event\Event $event, \Cake\Datasource\EntityInterface $entity, \ArrayObject $options)
    {
        if (!empty($entity->senha)) {
            $senha = (new \Cake\Auth\DefaultPasswordHasher())->hash($entity->senha);
            $entity->senha = $senha;
        } else {
            unset($entity->senha);
        }

        return true;
    }


    public function validaLogin($user)
    {
        $result = [];
        $result['ok'] = false;
        $result['user'] = null;
        $result['message'] = 'Usuário não encontrado';

        $query = $this->find()->where(['email' => $user['email']])->first();

        if ((int) $query->status === (int) $this->statusAtivo) {

            $password = new \Cake\Auth\DefaultPasswordHasher();
            if ($password->check($user['senha'], $query->senha)) {
                $result['ok'] = true;
                $result['user'] = [
                    'id' => $query->id,
                    'foto' => $query->foto,
                    'nome' => $query->nome,
                    'email' => $query->email,
                    'empresa_id' => $query->empresa_id,
                    'limete_pedidos' => $query->limete_pedidos,
                    'tipo' => $query->tipo,
                    'status' => $query->status,
                ];
                $result['message'] = 'Usuário localizado';
            }

        }else{
            $result['ok'] = false;
            $result['user'] = null;
            $result['message'] = 'Usuário não autorizado';
        }

        return $result;
    }
}
