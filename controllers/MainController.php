<?php

include_once ROOT . '/components/Pagination.php';
include_once ROOT . '/models/User.php';


class MainController
{

    public function actionIndex($page = 1)
    {
        $userId = User::checkLogged();
        User::checkAdmin();
        $users = User::getUsersList($page);
        $total = User::getTotalUsers();
        $pagination = new Pagination($total, $page, User::SHOW_BY_DEFAULT, 'page-');
        require_once ROOT . '/views/main/index.php';
        return true;
    }

    public function actionView($id)
    {
        $userId = User::checkLogged();
        User::checkAdmin();
        $user = User::getUserById($id);
        require_once ROOT . '/views/main/view.php';
        return true;
    }

    public function actionRegister()
    {
        $name = '';
        $surname = '';
        $username = '';
        $password = '';
        $gender = '';
        $birthday = '';
        $result = false;

        if(isset($_POST['submit'])){
            $name = trim(strip_tags($_POST['name']));
            $surname = trim(strip_tags($_POST['surname']));
            $username = trim(strip_tags($_POST['username']));
            $password = trim(strip_tags($_POST['password']));
            $gender = trim(strip_tags($_POST['gender']));
            $birthday = trim(strip_tags($_POST['birthday']));
            $errors = false;
            if(!User::checkUsernameLength($username)){
                $errors[] = 'Too short Username. Username should contain at least 4 signs';
            }
            if(!User::checkUsernameExists($username)){
                $errors[] = 'This Username is already taken by someone';
            }
            if(!User::checkPasswordLength($password)){
                $errors[] = 'Too short Password. Password should contain at least 5 signs';
            }

            if($errors == false){
                $result = User::register($name, $surname, $username, $password, $gender, $birthday);
                header('Location: /login');
            }
        }

        require_once ROOT . '/views/main/signup.php';
        return true;
    }

    public function actionLogin()
    {
        $username = '';
        $password = '';
        $errors = false;

        if(isset($_POST['submit'])){
            $username = trim(strip_tags($_POST['username']));
            $password = trim(strip_tags($_POST['password']));

            if(!User::checkUsernameLength($username)){
                $errors[] = 'Too short Username. Username should contain at least 4 signs';
            }
            if(!User::checkPasswordLength($password)){
                $errors[] = 'Too short Password. Password should contain at least 5 signs';
            }

            $userId = User::checkUserData($username, $password);

            if($userId == false){
                $errors[] = 'Wrong Username or Password';
            } else {
                User::auth($userId);
                header('Location: /');
            }
        }

        require_once ROOT . '/views/main/login.php';
        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header('Location: /login');
    }

    public function actionAdd()
    {
        User::checkLogged();
        User::checkAdmin();

        $name = '';
        $surname = '';
        $username = '';
        $password = '';
        $gender = '';
        $birthday = '';
        $result = false;

        if(isset($_POST['submit'])){
            $name = trim(strip_tags($_POST['name']));
            $surname = trim(strip_tags($_POST['surname']));
            $username = trim(strip_tags($_POST['username']));
            $password = trim(strip_tags($_POST['password']));
            $gender = trim(strip_tags($_POST['gender']));
            $birthday = trim(strip_tags($_POST['birthday']));
            $errors = false;
            if(!User::checkUsernameLength($username)){
                $errors[] = 'Too short Username. Username should contain at least 4 signs';
            }
            if(!User::checkUsernameExists($username)){
                $errors[] = 'This Username is already taken by someone';
            }
            if(!User::checkPasswordLength($password)){
                $errors[] = 'Too short Password. Password should contain at least 5 signs';
            }

            if($errors == false){
                $result = User::register($name, $surname, $username, $password, $gender, $birthday);
                header('Location: /');
            }
        }

        require_once ROOT . '/views/main/add.php';
        return true;
    }

    public function actionEdit($id)
    {
        User::checkLogged();
        User::checkAdmin();
        $user = User::getUserById($id);
        $result = false;

        if(isset($_POST['submit'])) {
            $name = trim(strip_tags($_POST['name']));
            $surname = trim(strip_tags($_POST['surname']));
            $username = trim(strip_tags($_POST['username']));
            $password = trim(strip_tags($_POST['password']));
            $errors = false;
                if (!User::checkUsernameLength($username)) {
                    $errors[] = 'Too short Username. Username should contain at least 4 signs';
                }

                if (!User::checkPasswordLength($password)) {
                    $errors[] = 'Too short Password. Password should contain at least 5 signs';
                }
                if($errors == false){
                    User::edit($id, $name, $surname, $username, $password);
                }
            }

        require_once ROOT . '/views/main/edit.php';
        return true;
    }

    public function actionDelete($id)
    {
        $user = User::checkLogged();
        User::checkAdmin();

        if(!$user){
            return false;
        }
        User::delete($id);
    }

    public function actionAccess()
    {
        $userId = User::checkLogged();
        require_once ROOT . '/views/main/access_denied.php';
        return true;
    }


}