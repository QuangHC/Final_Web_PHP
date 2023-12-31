<?php
/** @var \app\models\forms\SearchFormSubject $model  */
/** @var app\models\Subject[] $items  */
/** @var View $this */

use app\core\form\SelectionBoxField;
use app\core\View;

$this->title = 'SEARCH SUBJECTS';
?>
<h3>Search Subject</h3>
<?php $form = \app\core\form\Form::begin('', "post","searchForm") ?>
<?php echo new SelectionBoxField($model, 'search_value', ['Năm 1', 'Năm 2', 'Năm 3', 'Năm 4']) ?>
<?php echo $form->field($model, 'keyword_value') ?>
<input id="delete_id" name="delete_id" type="text" class="d-none">
    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
<?php \app\core\form\Form::end() ?>

<h5 class="mt-2">Số môn học tìm thấy: <?php echo count($items) ?></h5>
<table class="table mt-2">
    <thead>
    <tr>
        <th scope="col">NO</th>
        <th scope="col">Tên môn học</th>
        <th scope="col">Khóa học</th>
        <th scope="col">Mô tả chi tiết</th>
        <th scope="col" colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $index => $item): ?>
        <tr>
            <th scope="row"><?php echo $index + 1?></th>
            <td class='d-none'><?php echo $item->id ?></td>
            <td><?php echo $item->name ?></td>
            <td><?php echo $item->school_year ?></td>
            <td><?php echo $item->description ?></td>
            <td class='text-end'><button class='btn btn-danger delete_btn'>Xóa</button></td>
            <td>
                <a href="/updateSubject?id=<?php echo $item->id ?>" class='btn btn-info display_edit'>Sửa</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<button type="button" id="delete_popup" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#delete"></button>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa phòng học</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn muốn xóa phòng học này?
            </div>
            <div class="modal-footer">
                <button type="button" id="delete_item" class="btn btn-secondary" data-bs-dismiss="modal">Xóa</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.delete_btn', function() {
        var id = $(this).closest("tr").find(".d-none").text();
        console.log("ID to be deleted: " + id);
        $("#delete_popup").click();
        $("#delete_id").val(id);
    });

    $("#delete_item").on("click", () => {
        $('#searchForm').submit();
    });
</script>