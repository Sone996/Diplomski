$(document).ready(function () {

//------------------------------------------------------------
// Delete data
    $('.delete').click(function () {

        var el = this;
        var id = this.id;
        var splitid = id.split("_");
        // Delete id
        var deleteid = splitid[1];
        var hostString = window.location.protocol + "//" + window.location.host + "/";
        $.ajax({
            url: hostString + '/Sone_MVC/dashboard/deleteAjax',
            type: 'GET',
            data: {id: deleteid},
            success: function (response) {
                if (response == 1) {
                    // Remove row from HTML Table
                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(800, function () {
                        $(this).remove();
                    });
                } else {
                    alert('Invalid ID.');
                }
            }
        });
    });
    //------------------------------------------------------------------------------
    //delete user


    $('.deleteUser').click(function () {

        var el = this;
        var id = this.id;
        var splitid = id.split("_");
        // Delete id
        var deleteid = splitid[1];
        var hostString = window.location.protocol + "//" + window.location.host + "/";
        $.ajax({
            url: hostString + '/Sone_MVC/user/deleteUserAjax',
            type: 'GET',
            data: {id: deleteid},
            success: function (response) {
                if (response == 1) {
                    // Remove row from HTML Table
                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(800, function () {
                        $(this).remove();
                    });
                } else {
                    alert('Owner can not be deleted!!!');
                }
            }
        });
    });

    //---------------------------------------------------------------------------------------------
    // edit data
    // open modal
    $('.edit').click(function () {
        var id = $(this).attr("id");
        var hostString = window.location.protocol + "//" + window.location.host + "/";
        $.ajax({
            url: hostString + '/Sone_MVC/dashboard/selectUser',
            method: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data) {
                $('#title').val(data.title);
                $('#text').val(data.text);
                $('#id_edit').val(data.id);
//                $('#myModal').modal('show');
                window.$("#myModal").modal("show");
            }
        });
    });

    // saving changes
    $('#submit_changes').click(function () {
        var title = $("#title").val();
        var text = $("#text").val();
        var id = $("#id_edit").val();
        var hostString = window.location.protocol + "//" + window.location.host + "/";
        $.ajax({
            url: hostString + '/Sone_MVC/dashboard/edit_save_data',
            method: "POST",
            data: {id: id,
                title: title,
                text: text},
            dataType: "json",
            success: function (data) {
                alert("Success, data inserted" + data);
                document.getElementById('table-data').reset();
            }
        });
    });

    //--------------------------------------------------------------------------------------------
    // filters
    $('#table-data').DataTable();

    //------------------------------------------------------------------------------------
    //validate



    $('#submit_user').click(function () {
        var username = $("input[name='login']").val();
        var password = $("input[name='password']").val();
        var hostString = window.location.protocol + "//" + window.location.host + "/";
        alert("username: " + username + "\npassword: " + password);
        $.ajax({
            url: hostString + '/Sone_MVC/dashboard/createUser',
            method: "POST",
            data: {
                username: username,
                password: password
            },
             success: function (data) {
                if (data) {
                    alert("Success, user created!");
                    alert(data);
                } else {
                    alert('You cant use blankspaces in name and password!');
                }
            }
        });
    });

//    $('#submit_user').submit(function (e) {
//        e.preventDefault();
//        var username = $("#username").val();
//        var password = $("#password").val();
//        var hostString = window.location.protocol + "//" + window.location.host + "/";
//        alert("username: " + username + "\npassword: " + password);
//        $.ajax({
//            url: hostString + '/Sone_MVC/dashboard/createUser',
//            method: "POST",
//            data: {
//                username: username,
//                password: password
//            },
//            dataType: "json",
//            success: function (data) {
//                console.log(data);
//                if (data) {
//                    alert("Success, user created!");
//                } else {
//                    alert('You cant use blankspaces in name and password!');
//                }
//            }
//        });
//    });

});







