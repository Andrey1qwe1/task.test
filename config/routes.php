<?php

return [

    'user/view/(.+)' => 'main/view/$1',
    'user/edit/(.+)' => 'main/edit/$1',
    'user/delete/(.+)' => 'main/delete/$1',
    'user/add' => 'main/add',
    'register' => 'main/register',
    'access' => 'main/access',
    'login' => 'main/login',
    'logout' => 'main/logout',
    'page-(.+)' => 'main/index/$1',
    '' => 'main/index',

];