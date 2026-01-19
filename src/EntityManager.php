<?php
namespace App;

use App\Config\Database;
use MongoDB\BSON\ObjectId;

class EntityManager
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getDb();
    }

    public function findAll(string $collectionName): array
    {
        return $this->db->$collectionName->find()->toArray();
    }

    public function findById(string $collectionName, $value, string $field = '_id'): ?array
    {
        $collection = $this->db->$collectionName;

        try {
            if ($field === '_id') {
                $value = new ObjectId($value);
            }
        } catch (\Exception $e) {
            return null;
        }

        $result = $collection->findOne([$field => $value]);
        return $result ? (array) $result : null;
    }

    public function insertOne(string $collectionName, array $data, ?string $uniqueField = null): ?array
    {
        $collection = $this->db->$collectionName;

        if ($uniqueField && isset($data[$uniqueField])) {
            if ($collection->findOne([$uniqueField => $data[$uniqueField]])) {
                return null;
            }
        }

        $data['_id'] = new ObjectId();

        try {
            $collection->insertOne($data);
            return $data;
        } catch (\Exception $e) {
            return null;
        }
    }
}
