<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Comments Model
 *
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\BelongsTo $Requests
 *
 * @method \App\Model\Entity\Comment newEmptyEntity()
 * @method \App\Model\Entity\Comment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Comment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Comment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Comment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Comment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Comment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Comment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Comment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Comment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Comment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Comment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Comment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Comment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Comment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Comment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Comment> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CommentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('comments');
        $this->setDisplayField('content');
        $this->setPrimaryKey('id');

        $this->belongsTo('Requests', [
            'foreignKey' => 'request_id',
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
            ->scalar('content')
            ->maxLength('content', 2048)
            ->requirePresence('content', 'create')
            ->notEmptyString('content');

        $validator
            ->integer('request_id')
            ->allowEmptyString('request_id');

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
        $rules->add($rules->existsIn(['request_id'], 'Requests'), ['errorField' => 'request_id']);

        return $rules;
    }
}
