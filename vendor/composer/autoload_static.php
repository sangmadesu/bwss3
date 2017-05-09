<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit73d0370419ce400f772b6634c87dc236
{
    public static $files = array (
        '2dcc1fe700145c8f64875eb0ae323e56' => __DIR__ . '/../..' . '/helpers.php',
    );

    public static $classMap = array (
        'AdminController' => __DIR__ . '/../..' . '/app/controllers/admin/AdminController.php',
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Auth' => __DIR__ . '/../..' . '/app/controllers/Auth.php',
        'Blog' => __DIR__ . '/../..' . '/app/models/Blog.php',
        'BlogController' => __DIR__ . '/../..' . '/app/controllers/admin/BlogController.php',
        'Category' => __DIR__ . '/../..' . '/app/models/Category.php',
        'CategoryController' => __DIR__ . '/../..' . '/app/controllers/admin/CategoryController.php',
        'Config' => __DIR__ . '/../..' . '/app/core/Config.php',
        'Hash' => __DIR__ . '/../..' . '/app/core/Hash.php',
        'HomeController' => __DIR__ . '/../..' . '/app/controllers/HomeController.php',
        'Input' => __DIR__ . '/../..' . '/app/core/Input.php',
        'Menu' => __DIR__ . '/../..' . '/app/models/Menu.php',
        'MenuController' => __DIR__ . '/../..' . '/app/controllers/admin/MenuController.php',
        'Model' => __DIR__ . '/../..' . '/app/models/Model.php',
        'PageController' => __DIR__ . '/../..' . '/app/controllers/admin/PageController.php',
        'Redirect' => __DIR__ . '/../..' . '/app/core/Redirect.php',
        'SQL' => __DIR__ . '/../..' . '/app/core/SQL.php',
        'Session' => __DIR__ . '/../..' . '/app/core/Session.php',
        'Storage' => __DIR__ . '/../..' . '/app/core/Storage.php',
        'Token' => __DIR__ . '/../..' . '/app/core/Token.php',
        'User' => __DIR__ . '/../..' . '/app/models/User.php',
        'UserController' => __DIR__ . '/../..' . '/app/controllers/admin/UserController.php',
        'Validator' => __DIR__ . '/../..' . '/app/core/Validator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit73d0370419ce400f772b6634c87dc236::$classMap;

        }, null, ClassLoader::class);
    }
}
