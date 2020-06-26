<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pedidos Model
 *
 * @property \App\Model\Table\PedidosItensTable&\Cake\ORM\Association\HasMany $PedidosItens
 *
 * @method \App\Model\Entity\Pedido newEmptyEntity()
 * @method \App\Model\Entity\Pedido newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Pedido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pedido get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pedido findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Pedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pedido|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedido saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PedidosTable extends Table
{

    public $statusAguardandoAprovacao = 1;
    public $statusAProduzir = 2;
    public $statusProduzindo = 3;
    public $stutusFinalizado = 4;
    public $enderecoGrafica = 'Rua Paraná, 320, Ribeirão Preto - SP.';


    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pedidos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('PedidosItens', [
            'foreignKey' => 'pedido_id',
        ]);

        $this->belongsTo('EmpresaCnpj', [
            'foreignKey' => 'id_faturamento',
        ]);

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'id_usuario',
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
            ->integer('id_usuario')
            ->requirePresence('id_usuario', 'create')
            ->notEmptyString('id_usuario');

        $validator
            ->integer('id_faturamento')
            ->requirePresence('id_faturamento', 'create')
            ->notEmptyString('id_faturamento');

        $validator
            ->integer('id_entrega')
            ->requirePresence('id_entrega', 'create')
            ->notEmptyString('id_entrega');

        $validator
            ->dateTime('data')
            ->requirePresence('data', 'create')
            ->notEmptyDateTime('data');

        $validator
            ->integer('urgencia')
            ->notEmptyString('urgencia');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }

    public function enderecoEntrega($pedidos){
        
        $EmpresaCnpjTable = \Cake\ORM\TableRegistry::getTableLocator()->get('EmpresaCnpj');

        foreach($pedidos as $key => $pedido){
            $query = $EmpresaCnpjTable->find()
            ->where([
                'id' => $pedidos[$key]->id_entrega
            ])->first();

            if(empty($query)){
                $pedidos[$key]->entrega = 'Retirar na Gráfica - '. $this->enderecoGrafica;
            }else{
                $pedidos[$key]->entrega = $query->rua . ', ' . $query->numero . ', ' . $query->rua . ', ' . ((isset($query->complemento)) ? $query->complemento . ', ' : ' ') . $query->bairro . ', ' . $query->cidade . ' - ' . $query->estado;

            }
        }
        
        return $pedidos;
    }
}
