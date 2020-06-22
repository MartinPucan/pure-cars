<?php

class BaseRepository
{
    public string $tableName;
    public PDO $pdo;

    public function __construct()
    {
        [
            'host' => $host,
            'database' => $database,
            'user' => $user,
            'password' => $password] = $this->getConfig();

        $this->pdo = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
    }

    public function findOne(int $id): ?array
    {
        return $this->findAll(['where' => ['id' => $id]])[0] ?? null;
    }

    public function findAll(array $options = []): array
    {
        $orderBy = $options['orderBy'] ?? [];
        $whereClauses = $options['where'] ?? [];
        $limit = $options['limit'] ?? 0;

        $orderByClause = count($orderBy) === 0 ? '' : " order by {$orderBy['column']} {$orderBy['sortType']} ";
        $limitClause = $limit === 0 ? '' : 'limit ' . $limit;

        $sql = <<<SQL
        SELECT * FROM {$this->tableName} {$this->getWhereClause($whereClauses)} {$orderByClause} {$limitClause}
        SQL;

        $query = $this->pdo->prepare($sql);

        foreach ($whereClauses as $column => $value) {
            $query->bindParam($column, $value);
        }

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getWhereClause(array $whereClauses): string
    {
        if (count($whereClauses) === 0) {
            return '';
        }

        $whereClause = ' where ';

        foreach (array_keys($whereClauses) as $column) {
            $whereClause .= "{$column}=:{$column}";
        }

        return $whereClause;
    }

    private function getConfig(): array
    {
        $config = file_get_contents(__DIR__ . '/config.json');

        if (!$config) {
            echo 'Config not found!';
            die;
        }

        return json_decode($config, true) ?? [];
    }
}