<?php

use View\Html\Html;
use TexLab\Html\Select;

/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 */

$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setClass('form');

foreach ($fields as $name => $value) {
    $form->addContent(Html::create('Label')->setFor($name)->setInnerText($comments[$name])->html());
    if ($name == 'status') {
        $form->addContent((new Select())
            ->setName($name)
            ->setId($name)
            ->setData([
                'do' => 'здесь',
                'todo' => 'придумай'
            'notodo' => 'сама'
        ])
        ->html());
}else{
        $form->addContent(Html::create('input')->setName($name)->setId($name)->setValue($value)->html());
    }}
echo $form->addContent(Html::create('Input')->setType('hidden')->setName('id')->setValue($id)->html())
    ->addContent(Html::create('Input')->setType('submit')->setValue('OK')->html())
    ->html();