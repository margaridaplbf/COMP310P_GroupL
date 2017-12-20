
$(document).ready(function () {
    $('#user_profile_form').submit(function (event) {
        event.preventDefault();
        var formData = $("#user_profile_form").serializeArray();
        console.log(formData);

        swal({
                title: "Are you sure to update details ?",
                text: "This action cannot be reverted",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, sign up !",
                closeOnConfirm: false
            },
            function () {
                $.ajax({
                    url: "update_user_details.php",
                    data: formData,
                    type: "POST",
                    dataType: "json",
                    success: function (result) {

                        if (result == "password not the same") {
                            swal("Unable to update the account", "New Passwords does not match ! ", "error");
                        }

                        else if (result == "current password is wrong") {
                            swal("Unable to update the account", "Provided current password is wrong ! ", "error");
                        }

                        else if (result == "success") {

                            swal({
                                title: "Successfully updated account!",
                                text: " Your account has been updated successfully.",
                                type: "success",
                                confirmButtonColor: "#289a36",
                                confirmButtonText: "Okay",
                                closeOnConfirm: false,
                                html: false
                            }, function () {
                                location.reload();
                            });
                        }
                    }
                });
            });

    });

});