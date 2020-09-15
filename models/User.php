<?php


class User
{
    /**
     * This constant defines how much users should be shown on one page.
     */
    const SHOW_BY_DEFAULT = 5;

    public static function getUsersList($page = 1)
    {
        $page = (int) $page;
        $db = Db::getConnection();
        $users = [];
        $offset = self::SHOW_BY_DEFAULT * ($page - 1);
        $result = $db->query('SELECT * FROM test_task LIMIT ' . self::SHOW_BY_DEFAULT . ' OFFSET ' . $offset );
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $users = $result->fetchAll();
        return $users;
    }

    public static function getUserById($id)
    {
        $db = Db::getConnection();
        $result = $db->prepare('SELECT * FROM test_task WHERE id = :id');
        $result->bindParam(':id', $id);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user = $result->fetch();
        return $user;
    }

    /**
     * This method count how much users are in database. It's necessare for Paginator class.
     */
    public static function getTotalUsers()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT COUNT(id) AS count FROM test_task');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user = $result->fetch();
        return $user['count'];
    }

    public static function checkUsernameLength($name)
    {
        if(strlen($name) < 4) {
            return false;
        }
        return true;
    }

    public static function checkPasswordLength($password)
    {
        if(strlen($password) < 5) {
            return false;
        }
        return true;
    }

    public static function checkUsernameExists($username)
    {
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM test_task WHERE username = :username';
        $result = $db->prepare($sql);
        $result->bindParam(':username', $username);
        $result->execute();

        if($result->fetchColumn()){
            return false;
        }
        return true;
    }

    public static function register($name, $surname, $username, $password, $gender, $birthday)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO test_task (name, surname, username, password, gender, birthday) 
                VALUES (:name, :surname, :username, :password, :gender, :birthday)';
        $result = $db->prepare($sql);
        $result->bindParam('name', $name);
        $result->bindParam(':surname', $surname);
        $result->bindParam(':username', $username);
        $result->bindParam(':password', $password);
        $result->bindParam(':gender', $gender);
        $result->bindParam(':birthday', $birthday);
        return $result->execute();


    }

    /**
     * This method is compare user's data with database's data. It uses when user trying to log in.
     */
    public static function checkUserData($username, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM test_task WHERE username = :username AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':username', $username);
        $result->bindParam(':password', $password);
        $result->execute();
        $user = $result->fetch();
        if($user){
            return $user['id'];
        }
        return false;
    }

    /**
     * This method saves user id to session.
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    /**
     * This method checks that user is logged in.
     */
    public static function checkLogged()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header('Location: /login');
    }

    /**
     * This method checks that user has admin access.
     */
    public static function checkAdmin()
    {
        $userId = self::checkLogged();
        $user = self::getUserById($userId);
        if($user['is_admin'] == 1){
            return true;
        }
        header('Location: /access');
    }

    public static function edit($id, $name, $surname, $username, $password)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE test_task SET name = :name, surname = :surname, username = :username, password = :password WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->bindParam(':name', $name);
        $result->bindParam(':surname', $surname);
        $result->bindParam(':username', $username);
        $result->bindParam(':password', $password);
        $result->execute();

        header("Location: /user/view/{$id}");
    }

    public static function delete($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM test_task WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();

        header('Location: /');
    }


}