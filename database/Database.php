<?php
declare(strict_types=1);

class Database
{
    public PDO $pdo;

    public function getConnection()
    {
        [
            'host' => $host,
            'database' => $database,
            'user' => $user,
            'password' => $password
        ] = $this->getConfig();

        try {
            $this->pdo = new PDO("mysql:host={$host};dbname={$database}", $user, $password);
        } catch(PDOException $exception) {
            echo "Ops, something went wrong: " . $exception->getMessage();
        }

        return $this->pdo;
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
