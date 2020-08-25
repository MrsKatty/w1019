<?php

namespace Controller;

use Core\Config;

class SignUpController extends UsersController
{
    public function actionShow(array $data)
    {
        $this
            ->view
            ->setFolder('signup')
            ->setTemplate('show')
            ->setLayout('planeLayout')
            ->addData([]);
    }

    public function actionShowEdit(array $data)
    {
    }

    public function actionAdd(array $data)
    {

        $data['post']['group_id'] = $this->table->getGroupIdByCode('users');

        parent::actionAdd($data); // TODO: Change the autogenerated stub
    }

    public function actionEdit(array $data)
    {
    }

    public function actionDel(array $data)
    {
    }
}
