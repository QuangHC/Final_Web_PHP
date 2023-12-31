<?php
/** @var $model app\models\Subject */
/** @var $id string */
/** @var View $this */

use app\core\Application;
use app\core\form\TextareaField;
use app\core\View;
use \app\core\form\SelectionBoxField;

$this->title = 'Update Subject';
?>
<h3>Update Subject</h3>
<?php $form = \app\core\form\Form::begin('', "post") ?>
<?php echo $form->field($model, 'name')?>
<?php echo new SelectionBoxField($model, 'school_year', ['Năm 1', 'Năm 2', 'Năm 3', 'Năm 4']) ?>
<?php echo (new TextareaField($model, 'description'))?>
<input type="hidden" name="edit" value="">
<input type="hidden" name="id" value="<?php echo ($id != '') ? $id : $model->id ?>">
<input type="hidden" name="old_avatar" value="<?php echo $model->avatar ?>">

<div>
    <img src="../web/avatar/<?php echo $model->avatar?>" class="img-fluid" alt="Avatar Image" style="width: 300px; height: auto">
</div>
<?php echo $form->field($model, 'avatar')->fileField() ?>

<div class="mt-3">
    <button type="submit" class="btn btn-success">Xác nhận</button>
</div>
<?php \app\core\form\Form::end() ?>
