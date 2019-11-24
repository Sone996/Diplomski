<h1 style="font-weight: 800">Hello <?php echo $_SESSION['data']['login'];?></h1>
<h3>Add title of your task and your comment:</h3>
<br>
<div class="container">
    <form method="post" action="<?php echo URL; ?>dashboard/create" autocomplete="off" class="was-validated">
        <div class="form-group row">
            <div class="col-md-5 mb-3">
                <label for="new_title">Title: </label>
                <input type="text" class="form-control" id='new_title' name="title" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-5 mb-3">
                <label for="new_text">Content: </label>
                <textarea name="text" class="form-control" id='new_text' required rows="6" cols="50"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-5 mb-3">
                <label>&nbsp;</label><input class="btn btn-success" type="submit">
            </div>
        </div>
    </form>
</div>
<br>
<br>
<div class="container">
<table id="table-data" class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Creator</td>
            <td>Title</td>
            <td>Text</td>
            <td>Date&Time</td>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($this->dashboardList as $key => $value) {
            echo '<tr>';
            echo '<td>'.$value['id'].'</td>';
            echo '<td>'.$value['creator'].'</td>';
            echo '<td>'.$value['title'].'</td>';
            echo '<td class="ellipsis">'.$value['text'].'</td>';
            echo '<td>'.$value['datetime'].'</td>';
            //------------------------- EDIT -------------------------------------------
            echo '<td>';
            if ($_SESSION['data']['login'] == $value['creator']) {
                echo '<span type="button" class="btn btn-primary btn-sm edit" id="'.$value['id'].'" data-target="#myModal" >Edit</span>';
            } else {
                echo '<button type="button" class="btn btn-sm edit" value="Edit" disabled>Edit</button>';
            }
            echo '</td>';
            //---------------------------- DELETE -----------------------------------------
            echo '<td><span type="button" class="btn btn-danger btn-sm delete" id="del_'.$value['id'].'">Delete</span></td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
</div>
<!-------------------------------------------- MODAL ZA EDIT ---------------------------------------------------------------->
<!-- Modal - Update User details -->
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form method="post" id="edit_form" action="<?php echo URL; ?>dashboard/edit_save_data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update</h4>
                </div>
                <div class="modal-body">
                    <input type="text" id="id_edit" placeholder="ID" class="form-control hidden">
                    <div class="form-group">
                        <label >Title</label>
                        <input type="text" id="title" placeholder="Title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label >Text</label>
                        <textarea type="text" id="text" placeholder="Text" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input id="submit_changes" type="submit" class="btn btn-success" name="submit" value="Confirm" data-dismiss="modal">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
