<?php

class Database
{
    private static $instance = null;

    private $connection = null;

    protected function __construct()
    {

        $this->connection = new \PDO('mysql:host=127.0.0.1;dbname=sportshop;charset=utf8', 'root', null,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //выбрасывать исключение при ошибке
            PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC, //использовать имена столбцов
            PDO::ATTR_EMULATE_PREPARES => false //Подготовка запроса на уровне БД
        ]);


    }

    //Запрет клонирования
    protected function __clone()
    {

    }
    //Запрет десериализации
    public function __wakeup()
    {
        throw new \BadMethodCallException('Десериализация запрещена');
    }

    //Экземляр класса, хранящий подключение к БД
    public static function getInstance(): Database
    {
        if(null == self::$instance){
            self::$instance = new static();
        }
        return self::$instance;
    }

    //Экземляр подключения к БД
    public static function connection(): \PDO
    {
        return static::getInstance()->connection;
    }

    //Подготовленное выражение
    public static function prepare($statement): \PDOStatement
    {
        return static::connection()->prepare($statement);
    }

    //ID последней добавленной записи
    public static function last_insert_id(): int
    {
        return intval(static::connection()->lastInsertId());
    }
}

?>