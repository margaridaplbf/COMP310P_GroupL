$(document).ready(function () {



    $('#from_date').change(function(){
        var fromDate = $('#from_date').val();
        fromDate = fromDate.split('/');
        fromDate = fromDate[1] + "/" + fromDate[0] + "/" + fromDate[2];
        $('#from_date').val(fromDate);

    });

    $('#to_date').change(function(){
        var fromDate = $('#to_date').val();
        fromDate = fromDate.split('/');
        fromDate = fromDate[1] + "/" + fromDate[0] + "/" + fromDate[2];
        $('#to_date').val(fromDate);

    });

    $('#registration_form').submit(function (event) {
        event.preventDefault();
        var formData = $("#registration_form").serializeArray();
        console.log(formData);

        swal({
                title: "Are you sure to Sign Up ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, sign up !",
                closeOnConfirm: false
            },
            function () {
                $.ajax({
                    url: "user.php",
                    data: formData,
                    type: "POST",
                    dataType: "json",
                    success: function (result) {

                        if (result == "username taken") {
                            swal("Unable to create the account", "Username is taken ! ", "error");
                        }

                        else if (result == "email taken") {
                            swal("Unable to create the account", "Email Address is taken ! ", "error");
                        }

                        else if (result == "passwords not same") {
                            swal("Unable to create the account", "Passwords are not the same !", "error");
                        }
                        else if (result == "too short") {
                            swal("Unable to create the account", "Password must be minimum 8 characters.", "error");
                        }
                        else if (result == "icu") {
                            swal("Unable to create the account", "Invalid characters in username.", "error");
                        }
                        else if (result == "icp") {
                            swal("Unable to create the account", "Password must contain atleast 1 upercase character, 1 lowercase character and 1 number.", "error");
                        }
                        else if (result == "too short uname") {
                            swal("Unable to create the account", "Username must be minimum 3 characters.", "error");
                        }
                        else if (result == "invalid email") {
                            swal("Unable to create the account", "Invalid email format.", "error");
                        }

                        else if (result == "too yung") {
                            swal("Unable to create the account", "You must be over 16 years old to sign up.", "error");
                        }


                        else if (result == "successfully created") {

                            swal({
                                title: "Successfully created account!",
                                text: " Your account has been created successfully.",
                                type: "success",
                                confirmButtonColor: "#289a36",
                                confirmButtonText: "Okay",
                                closeOnConfirm: false,
                                html: false
                            }, function () {
                                location.reload();
                            });
                        }

                        else if (result == "failed to created") {
                            swal("Unable to create the account!", "Please try again later!", "error");
                        }
                    }
                });
            });

    });


    $('#forgot_password').click(function () {
        $('#myModal').modal('hide');
        $('#forgottenPasswordModal').modal('show');
    });

//Email and username
    $('#forgotten_password_form_submit').click(function (event) {
        event.preventDefault();
        var formData = $("#forgotten_password_form").serializeArray();
        console.log(formData);


        $.ajax({
            url: "forgotten_password.php",
            data: formData,
            type: "POST",
            dataType: "json",
            success: function (result) {

                if (result == "email address doesn't exist") {
                    swal("Unable to reset password", "Email Address doesn't exist ! ", "error");
                }

                else if (result == "failed") {
                    swal("Unable to reset password", "Please try again later !", "error");
                }

                else {
                    // $('#forgottenPasswordModal').modal('hide');
                    // $("#forgottenPasswordModalQuestion").find("#prevmail").val(formData[0].value);
                    // $("#forgottenPasswordModalQuestion").find("#secret_question").append(result);
                    // $("#forgottenPasswordModalQuestion").modal("show");
                    // $("#forgottenPasswordModalNew").find("#emailpass").val(formData[1].value);




                    swal({
                        title: "Successfully requested for a forgotten password",
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
//Security Question
//     $('#forgotten_password_secret_answer').click(function(event){
//         event.preventDefault();
//         var formData = $("#forgotten_password_form_answer").serializeArray();
//         console.log(formData);
//         $.ajax({
//             url: "forgotten_password_answer.php",
//             data: formData,
//             type: "POST",
//             dataType: "json",
//             success: function (result) {
//                 if (result == "failed") {
//                     swal("Answer does not match!", "Please try again.");
//                 }

//                 else if (result == "success") {

//                     $("#forgottenPasswordModalQuestion").modal("hide");
//                     $("#forgottenPasswordModalNew").modal("show");

//                 }
//             }
//         });
//     });

// //New password
//     $('#forgotten_password_form_neww').click(function(event){
//         event.preventDefault();
//         var formData = $("#forgotten_password_form_new").serializeArray();
//         $.ajax({
//             url: "forgotten_password_new.php",
//             data: formData,
//             type: "POST",
//             dataType: "json",
//             success: function (result) {
//                 if (result == "no match") {
//                     swal("Passwords do not match!", "Please try again.");
//                 }
//                 else if (result == 'too short'){
//                     swal("New password must be minimum 8 characters.");
//                 }else if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $_POST['passs'])){
//                     swal("Password contains invalid characters.");
//                 }
//                 else{

//                     swal({
//                         title: "Successfully changed password",
//                         type: "success",
//                         confirmButtonColor: "#289a36",
//                         confirmButtonText: "Okay",
//                         closeOnConfirm: false,
//                         html: false
//                     },function(){
//                         location.reload();
//                     });
//                 }
//             }
//         });
//     });



    $("#login-form").submit(function (event) {
        event.preventDefault();
        var formData = $("#login-form").serializeArray();
        console.log(formData);

        $.ajax({
            url: "sign_in.php",
            data: formData,
            type: "POST",
            dataType: "json",
            success: function (result) {
                if (result == "email address and password combination does not match") {
                    swal("Unable to sign in", "Username and Password combination does not match ! ", "error");
                }

                else if (result == "username doesn't exist") {
                    swal("Error","Unable to sign in", "Username doesn't exist ! ");
                }
                else if (result == "success") {

                    swal({
                        title: "Successfully Signed In",
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
