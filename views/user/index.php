<h1>CREATE USER:</h1>
<p>You can't use white spaces in name or password</p>
<!--For result message on creation-->
<div id="result"></div>
<div class="container">
    <form method="post" id="user_create_form" action="<?php echo URL; ?>user/createUser" autocomplete="off" class="was-validated">
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="username">Username</label>
                <input type="text" name="login" class="form-control" id='username' required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id='password' required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="role">Role</label>
                <select class="form-control chosen-select" name="role">
                    <option value="default" class="form-control" >Default</option>
                    <option value="admin" class="form-control" >Admin</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label>&nbsp;</label><input id="submit_user" class="btn btn-success" type="submit" value="Create User">
            </div>
        </div>
    </form>
</div>
<br>
<br>
<table class="table hover table-striped table-bordered">
    <thead>
    <td>ID</td>
    <td>User</td>
    <td>Role</td>
    <td></td>
    <td></td>
</thead>
<tbody>
    <?php
    foreach ($this->userList as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value['id'] . '</td>';
        echo '<td>' . $value['login'] . '</td>';
        echo '<td>' . $value['role'] . '</td>';
        if ($_SESSION['data']['role'] == 'owner') {
            echo '<td><span class="deleteUser btn btn-danger btn-sm" id="del_' . $value['id'] . '">Delete</span></td>';
        } else {
            echo '<td><button type="button" class="btn btn-sm delete" value="Edit" disabled>Delete</button></td>';
        }
        echo '<td><a class="btn btn-primary" href="' . URL . 'user/editUser/' . $value['id'] . '">Edit</a></td>';
        echo '</tr>';
    }
    ?>
</tbody>
</table>
