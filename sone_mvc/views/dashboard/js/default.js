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
            url: hostString + '/dashboard/deleteAjax',
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
            url: hostString + '/user/deleteUserAjax',
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
            url: hostString + '/dashboard/selectUser',
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
            url: hostString + '/dashboard/edit_save_data',
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

    $("#submit_user").click(function(e) {
 
        // using serialize function of jQuery to get all values of form
        var serializedData = $("#user_create_form").serialize();
        var hostString = window.location.protocol + "//" + window.location.host + "/";
        // Variable to hold request
        var request;
        // Fire off the request to process_registration_form.php
        request = $.ajax({
            url: hostString + 'user/createUser',
            type: "POST",
            data: serializedData
        });
 
        // Callback handler that will be called on success
        request.done(function(jqXHR, textStatus, response) {
            // you will get response from your php page (what you echo or print)
             // show successfully for submit message
            $("#result").html(response);
        });
 
        // Callback handler that will be called on failure
        request.fail(function(jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            // show error
            $("#result").html('There is some error while submit');
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
 
//        return false;
        e.preventDefault();
 
    });
//-----------------------------------------

});







