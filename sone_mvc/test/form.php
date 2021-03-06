<?php
require '../libs/Form.php';
require '../config.php';
require '../libs/Database.php';

if (isset($_REQUEST['run'])) {
    try {
        $form = new Form();
        $form->post('name')->validate('minlength', 2)->validate('maxlength',15)
            ->post('age')->validate('digit')->validate('minlength', 2)
            ->post('gender');
        $form->subm();
        echo 'The form passed!';
        $data = $form->fetch();
        echo '<pre>';
        print_r($data);
        echo '<pre>';
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
<form method="post" action="?run">
    Name<input type="text" name="name">
    Age<input type="text" name="age">
    Gender<select name="gender">
        <option value="m">Male</option>
        <option value="f">Female</option>
    </select>
    <input type="submit">
</form>
