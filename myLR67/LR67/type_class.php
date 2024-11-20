<?php

class Type
{
    public static function show(): array
    {
        $pdo = Database::connection();
        $sql = "SELECT id_type, name_type FROM types";
        $result = $pdo->prepare($sql);
        $result->execute();
        $arr = [];
        foreach($result as $item)
        {
            $arr[] = $item;
        }
        return $arr;
    }
}