$(document).ready(function() {

    $(document).on('click', '.delete_report_btn', function(e) {
        e.preventDefault();

        var id = $(this).val();
        //alert(id);

        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'report_id': id,
                            'delete_report_btn': true
                        },
                        success: function(response) {
                            if (response == 200) {
                                swal("Success!", "Report deleted successfully!", "success");
                                $("#reports_table").load(location.href + " #reports_table"); //reload the page after deletion
                            } else if (response == 500) {
                                swal("Error!", "Something went wrong!", "error");
                            }
                        }
                    });
                }
            });

    });

    $(document).on('click', '.delete_category_btn', function(e) {
        e.preventDefault();

        var id = $(this).val();
        //alert(id);

        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'category_id': id,
                            'delete_category_btn': true
                        },
                        success: function(response) {
                            if (response == 200) {
                                swal("Success!", "Category deleted successfully!", "success");
                                $("#category_table").load(location.href + " #category_table"); //reload the page after deletion
                            } else if (response == 500) {
                                swal("Error!", "Something went wrong!", "error");
                            }
                        }
                    });
                }
            });

    });


});