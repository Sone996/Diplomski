<h1>EDIT USER:</h1>
<?php
//var_dump($data);
//var_dump($_SESSION['data']);
?>
<div class="container">
    <form method="post" action="<?php echo URL; ?>user/editSave/<?php echo $data['id']; ?>" class="was-validated">
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="username">Username</label>
                <input type="text" name="login" value="<?php echo $data['login']; ?>" class="form-control" id='username' required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" id='password' placeholder="enter again or new one" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label>Role</label>
                <select name="role">
                    <option value="default" <?php if ($data['role'] == 'default') echo 'selected'; ?> >Default</option>
                    <option value="admin" <?php if ($data['role'] == 'admin') echo 'selected'; ?> >Admin</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label>&nbsp;</label><input class="btn btn-success" type="submit">
            </div>
        </div>
    </form>
</div>

