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
                    'equipment': {
						validators: {
							notEmpty: {
								message: 'equipment is required'
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

						let taskData = [];

						let tasks = form.querySelectorAll('[name="task"]');
						let taskTools = form.querySelectorAll('[name="task_tool"]');
						let taskOks = form.querySelectorAll('[name="task_ok"]');

						for(let i = 0; i < tasks.length; i++) {
							taskData.push({
								task: tasks[i].value,
								task_tool: taskTools[i].value,
								task_ok: taskOks[i].value
							})
						}

						let materialsData = [];

						let materials = form.querySelectorAll('[name="material"]');

						for(let i = 0; i < materials.length; i++) {
							materialsData.push(materials[i].value)
						}

						let addtionalTaskData = [];

						let additionalTasks = form.querySelectorAll('[name="additional_task"]');

						for(let i = 0; i < additionalTasks.length; i++) {
							addtionalTaskData.push(additionalTasks[i].value)
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
							url: "/task-review",
							type: "POST",
							contentType: "application/json",
							data: JSON.stringify({
								number: $(form.querySelector('[name="number"]')).val(),
								equipment: $(form.querySelector('[name="equipment"]')).val(),
								model: $(form.querySelector('[name="model"]')).val(),
								sn: $(form.querySelector('[name="sn"]')).val(),
								registration: $(form.querySelector('[name="registration"]')).val(),
								tasks: JSON.stringify(taskData),
								additionalTasks: JSON.stringify(addtionalTaskData),
								materials: JSON.stringify(materialsData),
								comments: JSON.stringify(commentsData),
								organization: $(form.querySelector('[name="organization"]')).val(),
								date: $(form.querySelector('[name="date"]')).val(),
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