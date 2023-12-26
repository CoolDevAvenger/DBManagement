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
                    'owner': {
						validators: {
							notEmpty: {
								message: 'owner is required'
							}
						}
					},
                    'organization': {
						validators: {
							notEmpty: {
								message: 'organization mark is required'
							}
						}
					},
					'number': {
						validators: {
							notEmpty: {
								message: 'Work Order number is required'
							}
						}
					},
					'complete_date': {
						validators: {
							notEmpty: {
								message: 'Complete date is required'
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

						let cylindersData = [];

						let cylinders = form.querySelectorAll('[name="cylinder"]');
						let cylinderModels = form.querySelectorAll('[name="cylinder_model"]');
						let cylinderSNs = form.querySelectorAll('[name="cylinder_sn"]');

						for(let i = 0; i < cylinders.length; i++) {
							cylindersData.push({
								cylinder: cylinders[i].value,
								cylinder_model: cylinderModels[i].value,
								cylinder_sn: cylinderSNs[i].value
							})
						}

						let requestTaskData = [];

						let requests = form.querySelectorAll('[name="requested_task"]');

						for(let i = 0; i < requests.length; i++) {
							requestTaskData.push(requests[i].value)
						}

						let performedTaskData = [];

						let performs = form.querySelectorAll('[name="performed_task"]');

						for(let i = 0; i < performs.length; i++) {
							performedTaskData.push(performs[i].value)
						}

						let certificateData = [];

						let certificates = form.querySelectorAll('[name="certificate"]');
						let certificate_references = form.querySelectorAll('[name="certificate_reference"]');
						let certificate_dates = form.querySelectorAll('[name="certificate_date"]');

						for(let i = 0; i < certificates.length; i++) {
							certificateData.push({
								certificate: certificates[i].value,
								certificate_reference: certificate_references[i].value,
								certificate_date: certificate_dates[i].value
							})
						}

						let commentsData = [];
						let comments = form.querySelectorAll('[name="comment"]');

						for(let i = 0; i < comments.length; i++) {
							commentsData.push(comments[i].value)
						}

						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': document.getElementsByName("_token")[0].value
							}
						});

						$.ajax({
							url: "/work-order",
							type: "POST",
							contentType: "application/json",
							data: JSON.stringify({
								number: $(form.querySelector('[name="number"]')).val(),
								owner: $(form.querySelector('[name="owner"]')).val(),
								envelop: JSON.stringify({
									envelop: $(form.querySelector('[name="envelop"]')).val(),
									envelopModel: $(form.querySelector('[name="envelop_model"]')).val(),
									envelopSN: $(form.querySelector('[name="envelop_sn"]')).val(),
									registration: $(form.querySelector('[name="registration"]')).val(),
									lastDate: $(form.querySelector('[name="last_date"]')).val(),
									totalHour: $(form.querySelector('[name="total_hour"]')).val(),
									lasthour: $(form.querySelector('[name="last_hour"]')).val(),
								}),
								basket: JSON.stringify({
									basket: $(form.querySelector('[name="basket"]')).val(),
									basketModel: $(form.querySelector('[name="basket_model"]')).val(),
									basketSN: $(form.querySelector('[name="basket_sn"]')).val(),
								}),
								burner: JSON.stringify({
									burner: $(form.querySelector('[name="burner"]')).val(),
									burnerModel: $(form.querySelector('[name="burner_model"]')).val(),
									burnerSN: $(form.querySelector('[name="burner_sn"]')).val(),
								}),
								cylinder: JSON.stringify(cylindersData),
								requestedTasks: JSON.stringify(requestTaskData),
								workAccept: JSON.stringify({
									workAccept: $(form.querySelector('[name="work_accept"]')).val(),
									workAcceptDate: $(form.querySelector('[name="work_accept_date"]')).val(),
								}),
								ownerApproval: JSON.stringify({
									ownerApproval: $(form.querySelector('[name="owner_approval"]')).val(),
									ownerApprovalDate: $(form.querySelector('[name="owner_approval_date"]')).val(),
								}),
								performedTasks: JSON.stringify(performedTaskData),
								certificates: JSON.stringify(certificateData),
								comments: JSON.stringify(commentsData),
								organization: $(form.querySelector('[name="organization"]')).val(),
								completeDate: $(form.querySelector('[name="complete_date"]')).val(),
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