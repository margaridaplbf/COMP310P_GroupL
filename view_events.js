$(document).ready(function () {


    $('#performer').click(function() {
        var chosenPerformer = $('#performer').val();
        console.log(chosenPerformer);

        if (chosenPerformer == "new") {
            $('#new_performer').show();
        }

        else {
            $('#new_performer').hide();
        }
    });



    $('.edit_event_details').click(function () {

        $('#edit_event_details_modal').modal('show');

        var eventID = $(this).attr('value');

        $.ajax({
            url: "get_event_details.php",
            data: {
                event_id : eventID
            },
            async:false,
            type: "POST",
            dataType: "json",
            success: function(response){
                console.log(response);
                if (!!response.venue_capacity) {
                    $('#availability_edit').val(response.venue_capacity);
                }

                if (!!response.event_name) {
                    $('#event_name_edit').val(response.event_name);
                }

                if (!!response.end_purchase_date) {
                    $('#purchase_end_date_edit').val(response.end_purchase_date);
                }

                if (!!response.event_date) {
                    $('#event_date_edit').val(response.event_date);
                }

                if (!!response.venue_id) {
                    $("#venue_eid").val(response.venue_id);
                }

                if (!!response.event_id) {
                    $("#event_id_edit").val(response.event_id);
                }

            }
        });

    });


    $('#edit_event_details_form').submit(function (event) {
        event.preventDefault();
        var formData = $("#edit_event_details_form").serializeArray();
        console.log(formData);

        swal({
                title: "Are you sure to update the details ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, update !",
                closeOnConfirm: false
            },
            function () {
                $.ajax({
                    url: "update_event_details.php",
                    data: formData,
                    type: "POST",
                    dataType: "json",
                    success: function (result) {

                        if (result == "success") {
                            swal({
                                title: "Successfully updated event!",
                                text: " Your event has been updated successfully.",
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

    $('#add_event_form').submit(function (event) {
        event.preventDefault();
        var formData = $("#add_event_form").serializeArray();
        console.log(formData);

        var error = "";

        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();


        var output = (day<10 ? '0' : '') + day + '/' +
            (month<10 ? '0' : '') + month + '/' +
            d.getFullYear();

        var eventDate = "";
        var eventPurchaseDate = "";

        $(formData).each(function (index,value) {

            if (value.name == "event_date") {
                if (value.value == "") {
                    error = "missing_event_date"
                }

                else {
                    eventDate = new Date(value.value);
                }
            }

            if (value.name == "purchase_end_date") {

                if (value.value == "") {
                    error = "missing_purchase_date"
                }

                else {
                    eventPurchaseDate = new Date(value.value);
                }
            }

            if (value.name == "event_date") {

                var newDate = new Date(value.value);
                var month = newDate.getMonth()+1;
                var day = newDate.getDate();


                var newDateChosen = (day<10 ? '0' : '') + day + '/' +
                    (month<10 ? '0' : '') + month + '/' +
                    d.getFullYear();

                if (newDateChosen < output) {
                    error = "event_date_past"
                }
            }
        });

        if (eventPurchaseDate > eventDate) {
            swal("Unable to create the event", "Event purchase date cannot set up to be after the event date!", "error");
            return;
        }

        if (formData.name == "event_date"
            && formData.value == ""
        ) {
            swal("Unable to create the event", "Please specify the event date !", "error");
            return;
        }

        if (error != "") {
            switch (error) {
                case "missing_event_date":
                    swal("Unable to create the event", "Please specify the event date !", "error");
                    return;
                case "missing_purchase_date":
                    swal("Unable to create the event", "Please specify the event purchase end date !", "error");
                    return;
                case "event_date_past":
                    swal("Unable to create the event", "Event Date cannot be in the past !", "error");
                    return;
            }
        }


        swal({
                title: "Are you sure to add the event ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, update !",
                closeOnConfirm: false
            },
            function () {
                $.ajax({
                    url: "add_event_details.php",
                    data: formData,
                    type: "POST",
                    dataType: "json",
                    success: function (result) {

                        if (result == "success") {
                            swal({
                                title: "Successfully added event!",
                                text: " Your event has been created successfully.",
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


    $('.book_event').click(function () {
        $('#add_event_modal').modal('show');
    });
});

