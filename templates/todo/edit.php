<?php

use Psalm\Internal\Type\ParseTree\Value;
use View\Html\Html;
use TexLab\Html\Select;

/** @var int $id
 * @var string $type
 * @var array $fields
 * @var array $comments
 */
?>

<div class="main_form">
    <div class="picture_signIn">


<div class="form_signIn_container">

<?php
$form = Html::create('Form')
    ->setMethod('POST')
    ->setAction("?action=edit&type=$type")
    ->setClass('form')
    ->setId("editForm");

foreach ($fields as $name => $value) {
    $form->addContent(Html::create('Label')->setFor($name)->setInnerText($comments[$name])->html());
    if ($name == 'status') {
        $form->addContent((new Select())
            ->setName($name)
            ->setId($name)
            ->setSelectedValue($value)
            ->setData([
                "Performed" => "Performed",
                "Completed" => "Completed"
            ])
            ->html());

    } elseif ($name == 'priority') {
        $form->addContent((new Select())
            ->setName($name)
            ->setId($name)
            ->setSelectedValue($value)
            ->setData([
                "Main" => "Main",
                "Secondary" => "Secondary"
            ])
            ->html());
    } else {
        $form->addContent(Html::create('input')->setName($name)->setValue($value)->html());
    }
}
echo $form->addContent(Html::create('Input')->setType('hidden')->setName('id')->setValue($id)->html())
    ->addContent(Html::create('Input')->setType('submit')->setValue('OK')->html())
    ->html();
?>
</div></div></div>