<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;
use PDOException;


class InsertFiasTypes extends Command
{
    protected $signature = 'insert:fias-types';

    protected $description = 'Insert FIAS types into the database.';

    public function handle()
    {
        try {
            // Подключение к базе данных
            $pdo = new PDO(
                'mysql:host=' . config('database.connections.mysql.host') . ';dbname=' . config('database.connections.mysql.database'),
                config('database.connections.mysql.username'),
                config('database.connections.mysql.password'),
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );

            // Чтение JSON из файла
            $jsonFile = file_get_contents(base_path('app/Console/Commands/index.json'));


            // Декодирование JSON
            $data = json_decode($jsonFile, true);

            // Подготовка и выполнение запроса на вставку
            $stmt = $pdo->prepare("INSERT INTO fias_types (type_id, address_level, type_short_name, type_name) VALUES (:type_id, :address_level, :type_short_name, :type_name)");

            foreach ($data['types'] as $type) {
                $stmt->bindParam(':type_id', $type['id'], PDO::PARAM_INT);
                $stmt->bindParam(':address_level', $type['address_level'], PDO::PARAM_INT);
                $stmt->bindParam(':type_short_name', $type['type_short_name'], PDO::PARAM_STR);
                $stmt->bindParam(':type_name', $type['type_name'], PDO::PARAM_STR);

                $stmt->execute();
            }

            $this->info("Данные успешно добавлены в базу данных.");

        } catch (PDOException $e) {
            $this->error("Ошибка: " . $e->getMessage());
        }
    }
}