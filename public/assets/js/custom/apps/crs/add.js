"use strict";

// Class definition
var KTModalCustomersAdd = function () {
    var submitButton;
    var cancelButton;
	var closeButton;
    var validator;
    var form;
    var modal;

    // Init form inputs
    var handleForm = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
                    'number': {
						validators: {
							notEmpty: {
								message: 'CRS number is required'
							}
						}
					},
                    'mark': {
						validators: {
							notEmpty: {
								message: 'Reference mark is required'
							}
						}
					},
					'date': {
						validators: {
							notEmpty: {
								message: 'Date is required'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable submit button whilst loading
						submitButton.disabled = true;

						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': document.getElementsByName("_token")[0].value
							}
						});

						$.ajax({
							url: "/crs",
							type: "POST",
							contentType: "application/json",
							data: JSON.stringify({
								number: $(form.querySelector('[name="number"]')).val(),
								mark: $(form.querySelector('[name="mark"]')).val(),
								date: $(form.querySelector('[name="date"]')).val()
							}),
							success: function(response) {
								submitButton.removeAttribute('data-kt-indicator');
								
								if (response.success) {
									Swal.fire({
										text: "Form has been successfully submitted!",
										icon: "success",
										buttonsStyling: false,
										confirmButtonText: "Ok, got it!",
										customClass: {
											confirmButton: "btn btn-primary"
										}
									}).then(function (result) {
										if (result.isConfirmed) {
											// Hide modal
											modal.hide();
	
											// Enable submit button after loading
											submitButton.disabled = false;
	
											// Redirect to customers list page
											window.location = form.getAttribute("data-kt-redirect");
										}
									});
								} else {
									submitButton.disabled = false;
									Swal.fire({
										text: response.message,
										icon: "error",
										buttonsStyling: false,
										confirmButtonText: "Ok, got it!",
										customClass: {
											confirmButton: "btn btn-primary"
										}
									});
								}
								
							},
							error: function(xhrn, status, error) {
								submitButton.removeAttribute('data-kt-indicator');
								submitButton.disabled = false;
								
								Swal.fire({
									text: "Sorry, looks like there are some errors detected, please try again.",
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok, got it!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								});
							}
						})						
					} else {
						submitButton.disabled = false;
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form	
                    modal.hide(); // Hide modal				
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

		closeButton.addEventListener('click', function(e){
			e.preventDefault();

            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form	
                    modal.hide(); // Hide modal				
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
		})
    }

    return {
        // Public functions
        init: function () {
            // Elements
            modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_customer'));

            form = document.querySelector('#kt_modal_add_customer_form');
            submitButton = form.querySelector('#kt_modal_add_customer_submit');
            cancelButton = form.querySelector('#kt_modal_add_customer_cancel');
			closeButton = form.querySelector('#kt_modal_add_customer_close');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModalCustomersAdd.init();
});