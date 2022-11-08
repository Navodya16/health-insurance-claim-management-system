$(document).ready(function() {

    // $(document).on('click', '.delete_hospital_btn', function(e) {
    //     e.preventDefault();

    //     var id = $(this).val();
    //     //alert(id);

    //     swal({
    //             title: "Are you sure?",
    //             text: "Once deleted, you will not be able to recover",
    //             icon: "warning",
    //             buttons: true,
    //             dangerMode: true,
    //         })
    //         .then((willDelete) => {
    //             if (willDelete) {
    //                 $.ajax({
    //                     method: "POST",
    //                     url: "code.php",
    //                     data: {
    //                         'hospital_id': id,
    //                         'delete_hospital_btn': true
    //                     },
    //                     success: function(response) {
    //                         if (response == 200) {
    //                             swal("Success!", "Hospital deleted successfully!", "success");
    //                             $("#hospital_table").load(location.href + " #hospital_table"); //reload the page after deletion
    //                         } else if (response == 500) {
    //                             swal("Error!", "Something went wrong!", "error");
    //                         }
    //                     }
    //                 });
    //             }
    //         });

    // });

    // $(document).on('click', '.delete_patient_btn', function(e) {
    //     e.preventDefault();

    //     var id = $(this).val();
    //     //alert(id);

    //     swal({
    //             title: "Are you sure?",
    //             text: "Once deleted, you will not be able to recover",
    //             icon: "warning",
    //             buttons: true,
    //             dangerMode: true,
    //         })
    //         .then((willDelete) => {
    //             if (willDelete) {
    //                 $.ajax({
    //                     method: "POST",
    //                     url: "code.php",
    //                     data: {
    //                         'patient_id': id,
    //                         'delete_patient_btn': true
    //                     },
    //                     success: function(response) {
    //                         if (response == 200) {
    //                             swal("Success!", "Patient deleted successfully!", "success");
    //                             $("#patient_table").load(location.href + " #patient_table"); //reload the page after deletion
    //                         } else if (response == 500) {
    //                             swal("Error!", "Something went wrong!", "error");
    //                         }
    //                     }
    //                 });
    //             }
    //         });

    // });

    $('.delete_patient_btn').click(function(e) {
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
                            'patient_id': id,
                            'delete_patient_btn': true
                        },
                        success: function(response) {
                            if (response == 200) {
                                swal("Success!", "Patient deleted successfully!", "success");
                                $("#patients_table").load(location.href + " #patients_table"); //reload the page after deletion
                            } else if (response == 500) {
                                swal("Error!", "Something went wrong!", "error");
                            }
                        }
                    });
                }
            });

    });

    $('.delete_hospital_btn').click(function(e) {
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
                            'hospital_id': id,
                            'delete_hospital_btn': true
                        },
                        success: function(response) {
                            if (response == 200) {
                                swal("Success!", "Hospital deleted successfully!", "success");
                                $("#hospital_table").load(location.href + " #hospital_table"); //reload the page after deletion
                            } else if (response == 500) {
                                swal("Error!", "Something went wrong!", "error");
                            }
                        }
                    });
                }
            });

    });

});