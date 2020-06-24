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
 * @property \App\Model\Table\EmpresaCnpjTable&\Cake\ORM\Association\BelongsTo $EmpresaCnpj
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
    public $statusInativo = 9;

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

        $this->belongsTo('EmpresaCnpj', [
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
            ->scalar('foto')
            ->maxLength('foto', 255)
            ->allowEmptyString('foto');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('senha')
            ->maxLength('senha', 255)
            ->allowEmptyString('senha');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 45)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        $validator
            ->integer('limite_pedidos')
            ->requirePresence('limite_pedidos', 'create')
            ->notEmptyString('limite_pedidos');

        $validator
            ->integer('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['empresa_cnpj_id'], 'EmpresaCnpj'));

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


        if(!empty($query)){

            if ((int) $query->status === (int) $this->statusAtivo) {

                $password = new \Cake\Auth\DefaultPasswordHasher();
                if ($password->check($user['senha'], $query->senha)) {
                    $result['ok'] = true;
                    $result['user'] = [
                        'id' => $query->id,
                        'foto' => $query->foto,
                        'nome' => $query->nome,
                        'email' => $query->email,
                        'empresa_id' => $query->empresa_cnpj_id,
                        'limete_pedidos' => $query->limete_pedidos,
                        'tipo' => $query->tipo,
                        'status' => $query->status,
                        'menu' => $this->setMenu($query->tipo),
                    ];
                    $result['message'] = 'Usuário localizado';
                }else{
                    $result['ok'] = false;
                    $result['user'] = null;
                    $result['message'] = 'Senha incorreta';
                }
    
            }else{
                $result['ok'] = false;
                $result['user'] = null;
                $result['message'] = 'Usuário não autorizado';
            }    
        }
    
        return $result;
    }

    public function setMenu($tipo)
    {
        $menu = [
            'pedidos' => false,
            'usuarios' => false,
            'produtos' => false,
            'empresas' => false,
            'solicitar' => false,
        ];

        switch ($tipo) {
            case $this->tipoAdmin:
                $menu = [
                    'pedidos' => true,
                    'usuarios' => true,
                    'produtos' => true,
                    'empresas' => true,
                    'solicitar' => false,
                ];
                break;
            case $this->tipoComprador:
                $menu = [
                    'pedidos' => true,
                    'usuarios' => true,
                    'produtos' => false,
                    'empresas' => true,
                    'solicitar' => false,
                ];
                break;
            case $this->tipoSolicitante:
                $menu = [
                    'pedidos' => false,
                    'usuarios' => false,
                    'produtos' => false,
                    'empresas' => false,
                    'solicitar' => true,
                ];
                break;
        }

        return $menu;
    }

}
