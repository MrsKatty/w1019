<?php

namespace Controller;

use Core\Config;
use Model\TodoModel;
use Model\UsersModel;
use TexLab\MyDB\DB;
use TexLab\MyDB\DbEntity;
use View\View;

class TodoController extends AbstractTableController
{

    protected $tableName = "`todo`";
    protected $usersTable;

    public function __construct(View $view)
    {
        parent::__construct($view);
        $this->table = new TodoModel(
            $this->tableName,
            DB::Link([
                'host' => Config::MYSQL_HOST,
                'username' => Config::MYSQL_USER_NAME,
                'password' => Config::MYSQL_PASSWORD,
                'dbname' => Config::MYSQL_DATABASE
            ])
        );
        $this->usersTable = new UsersModel(
            "users",
            DB::Link([
                'host' => Config::MYSQL_HOST,
                'username' => Config::MYSQL_USER_NAME,
                'password' => Config::MYSQL_PASSWORD,
                'dbname' => Config::MYSQL_DATABASE
            ])
        );
        $this->view->setFolder('todo');
    }

    public function actionShow(array $data)
    {
        parent::actionShow($data);
        $this
            ->view
            ->setFolder('todo');
        $this->view->addData(
            [
                "usersList" => $this->usersTable->getUsers(),
                'table' => $this
                    ->table
                    ->reset()
                    ->setPageSize(Config::PAGE_SIZE)
                    ->getTodoPage($data['get']['page'] ?? 1)
            ]
        );
    }

    public function actionShowEdit(array $data)
    {
        parent::actionShowEdit($data); // TODO: Change the autogenerated stub

        $this
            ->view
            ->setFolder('todo');
        $this->view->addData(
            [
                "usersList" => $this->usersTable->getUsers(),
            ]
        );
    }
}
