
$(document).ready(function () {

    $('#review_form').submit(function (event) {
        event.preventDefault();
        var formData = $("#review_form").serializeArray();
        console.log(formData);

        $.ajax({
            url: "leave_review.php",
            data: formData,
            type: "POST",
            dataType: "json",
            success: function (result) {
                if (result == "success") {
                    swal({
                        title: "Successfully left a review",
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

    $('.leave_review').click(function () {
        $('#review_modal_form').modal('show');
    });

    $('.buy_event_ticket').click(function () {
        $('#buy_ticket_modal_form').modal('show');
    });


    $('#buy_ticket_form_form').submit(function (event) {

        event.preventDefault();
        var formData = $("#buy_ticket_form_form").serializeArray();
        console.log(formData);

        swal({
                title: "Are you sure to buy this ticket ?",
                text: "This action cannot be reverted",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, buy it !",
                closeOnConfirm: false
            },
            function () {
                $.ajax({
                    url: "buy_ticket.php",
                    data: formData,
                    type: "POST",
                    dataType: "json",
                    success: function (result) {

                        if (result == "capacity reached") {
                            swal("Unable to buy the ticket", "No seats available ! ", "error");
                        }

                        else if (result.indexOf("Available seats") != -1) {
                            var availableSeats = result;
                            availableSeats = availableSeats.split(' ');
                            availableSeats = availableSeats[2];

                            swal("Unable to buy the ticket", "Remaining seats available : "+availableSeats+" " , "error");
                        }

                        else if (result == "success") {

                            swal({
                                title: "Successfully bought the ticket!",
                                text: " Ticket can be found under the Tickets page.",
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
