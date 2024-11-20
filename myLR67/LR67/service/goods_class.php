<?php

class Goods
{
    public static function add(string $name_, int $cost_, string $des_, int $type_, string $file_name_, string $file_path_) : void
    {
        $pdo = Database::connection();
        
        if (isset($name_) && isset($cost_) && isset($type_) && isset($file_name_) && isset($file_path_))
        {
            $name = ($name_);
            $cost = ($cost_);
            $des = isset($des_) ? $des_ : null;
            $type = ($type_);

            // формирование имени файла с текущей датой и временем
            $file_name_ = date("Ymdhms") . $file_name_;

            $url = dirname(__FILE__, 2) . '/images_pack/' . $file_name_;
            
            // проверяем, существует ли папка и права на запись
            if (!is_dir(dirname($url))) {
                echo "Ошибка: Папка для хранения изображений не существует!";
                return;
            }

            // проверяем размер файла и его тип
            if ($_FILES['img']['error'] == UPLOAD_ERR_OK) {
                // Пытаемся переместить файл в целевую папку
                if (move_uploaded_file($file_path_, $url)) {
                    // echo "Файл успешно загружен!";
                } else {
                    echo "Ошибка при сохранении файла.";
                    return;
                }
            } else {
                echo "Ошибка при загрузке файла: " . $_FILES['img']['error'];
                return;
            }

            // выполняем запрос на добавление данных в базу данных
            $file_name_ = 'images_pack\\' . $file_name_;
            $sql = "INSERT INTO goods (`id`, `img_path`, `name`, `id_type`, `description`, `cost`) 
                    VALUES (null, :file_name_, :name, :type, :des, :cost)";
            $result = $pdo->prepare($sql);
            $result->execute([
                'file_name_' => $file_name_,
                'name' => $name,
                'type' => $type,
                'des' => $des,
                'cost' => $cost
            ]);
        }
    }

    public static function show(): array
    {
        $pdo = Database::connection();
        $sql = "SELECT goods.id as id, img_path, goods.name AS name, types.name_type AS type_name, description, cost FROM goods 
                INNER JOIN types ON goods.id_type = types.id_type";
        $result = $pdo->prepare($sql);
        $result->execute();
        $arr = [];
        foreach ($result as $item) {
            $arr[] = $item;
        }
        return $arr;
    }

    public static function delete(int $id_) : void
    {
        $pdo = Database::connection();
        $id = ($id_);
        $sql = "SELECT img_path FROM goods WHERE id = $id";
        $result = $pdo->prepare($sql);
        $result->execute();
        foreach ($result as $item)
        {
            $item['img_path'] = basename($item['img_path']);
            $file_delete = dirname(__FILE__, 2) . '\\images_pack\\' . $item['img_path'];
            unlink($file_delete);
        }
        $sql = "DELETE FROM goods WHERE id = $id";
        $result = $pdo->prepare($sql);
        $result->execute();
    }

    public static function get_by_id(int $id_): array
    {
        $pdo = Database::connection();
        $id = ($id_);
        $sql = "SELECT goods.id as id, img_path, goods.name AS name, types.name_type AS type_name, description, cost FROM goods 
                INNER JOIN types ON goods.id_type = types.id_type WHERE goods.id = $id";
        $result = $pdo->prepare($sql);
        $result->execute();
        $arr = [];
        foreach ($result as $item) {
            $arr[] = $item;
        }
        return $arr;
    }

    public static function edit_without_file(int $id_, string $name_, int $cost_, string $des_, int $type_): void
    {
        $pdo = Database::connection();
        if (isset($name_) && isset($cost_) && isset($type_) && isset($id_))
        {
            $id = ($id_);
            $name = ($name_);
            $cost = ($cost_);
            $des = isset($des_) ? $des_ : null;
            $type = ($type_);
            $sql = "UPDATE goods SET name = :name, description = :des, cost = :cost, id_type = :type WHERE id = :id";
            $result = $pdo->prepare($sql);
            $result->execute([
                'name' => $name,
                'des' => $des,
                'cost' => $cost,
                'type' => $type,
                'id' => $id
            ]);
        }
    }

    public static function edit_with_file(int $id_, string $name_, int $cost_, string $des_, int $type_, string $last_file_name, string $file_name_, string $file_path_): void
{
    $pdo = Database::connection();

    if (isset($name_) && isset($cost_) && isset($type_) && isset($id_) && isset($last_file_name) && isset($file_name_) && isset($file_path_)) {
        $id = ($id_);
        $name = ($name_);
        $cost = ($cost_);
        $des = isset($des_) ? $des_ : null;
        $type = ($type_);

        $file_name_ = 'images_pack/' . date("YmdHis") . '_' . $file_name_;

        $url = "../" . $file_name_;
        
        // перемещение загруженного файла в целевую директорию
        if (move_uploaded_file($file_path_, $url)) {
            if (!empty($last_file_name)) {
                $file_delete = dirname(__FILE__, 2) . '/' . $last_file_name;
                if (file_exists($file_delete)) {
                    unlink($file_delete); // удаление старого изображения
                }
            }

            $sql = "UPDATE goods SET name = :name, description = :des, cost = :cost, id_type = :type, img_path = :file_name_ WHERE id = :id";
            $result = $pdo->prepare($sql);
            $result->execute([
                'name' => $name,
                'des' => $des,
                'cost' => $cost,
                'type' => $type,
                'file_name_' => $file_name_,
                'id' => $id
            ]);
        } else {
            echo "Ошибка при загрузке файла.";
        }
    }
}

}
