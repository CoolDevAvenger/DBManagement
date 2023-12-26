function addCylinder() {
    let cylinders = document.getElementById("cylinders");
    let cylinder = document.getElementById("new_cylinder").value;
    let cylinderModel = document.getElementById("new_cylinder_model").value;
    let cylinderSN = document.getElementById("new_cylinder_sn").value;
    if (cylinder)  {
        let newHtmlContent = `<div class="row g-9 mb-7">
                                <div class="col-md-6 fv-row">
                                    <input class="form-control form-control-solid" placeholder="" name="cylinder" value="${cylinder}" disabled/>
                                </div>
                                <div class="col-md-3 fv-row">
                                    <input class="form-control form-control-solid" placeholder="" name="cylinder_model" value="${cylinderModel}" disabled/>
                                </div>
                                <div class="col-md-3 fv-row">
                                    <input class="form-control form-control-solid" placeholder="" name="cylinder_sn" value="${cylinderSN}" disabled/>
                                </div>
                            </div>`
        cylinders.insertAdjacentHTML('afterend', newHtmlContent);
        document.getElementById("new_cylinder").value = "";
        document.getElementById("new_cylinder_model").value = "";
        document.getElementById("new_cylinder_sn").value = "";
    }
}

function addRequestedTasks() {
    let requestedTasks = document.getElementById("requested_tasks");
    let requestedTask = document.getElementById("new_requested_task").value;
    if (requestedTask)  {
        let newHtmlContent = `<div class="fv-row mb-7">
                                <input type="text" class="form-control form-control-solid" placeholder="" name="requested_task" value="${requestedTask}" disabled/>
                            </div>`
        requestedTasks.insertAdjacentHTML('afterend', newHtmlContent);
        document.getElementById("new_requested_task").value = "";
    }
}

function addPerformedTasks() {
    let performedTasks = document.getElementById("performed_tasks");
    let performedTask = document.getElementById("new_performed_task").value;
    if (performedTask)  {
        let newHtmlContent = `<div class="fv-row mb-7">
                                <input type="text" class="form-control form-control-solid" placeholder="" name="performed_task" value="${performedTask}" disabled/>
                            </div>`
        performedTasks.insertAdjacentHTML('afterend', newHtmlContent);
        document.getElementById("new_performed_task").value = "";
    }
}

function addCertificates() {
    let certificates = document.getElementById("certificates");
    let certificate = document.getElementById("new_certificate").value;
    let certificateReference = document.getElementById("new_certificate_reference").value;
    let certificateDate = document.getElementById("new_certificate_date").value;
    if (certificate)  {
        let newHtmlContent = `<div class="row g-9 mb-7">
                                <div class="col-md-6 fv-row">
                                    <input class="form-control form-control-solid" placeholder="" name="certificate" value="${certificate}" />
                                </div>
                                <div class="col-md-3 fv-row">
                                    <input class="form-control form-control-solid" placeholder="" name="certificate_reference" value="${certificateReference}" />
                                </div>
                                <div class="col-md-3 fv-row">
                                    <input class="form-control form-control-solid" placeholder="" name="certificate_date" value="${certificateDate}" />
                                </div>
                            </div>`
        certificates.insertAdjacentHTML('afterend', newHtmlContent);
        document.getElementById("new_certificate").value = "";
        document.getElementById("new_certificate_reference").value = "";
        document.getElementById("new_certificate_date").value = "";
    }
}

function addComments() {
    let comments = document.getElementById("comments");
    let comment = document.getElementById("new_comment").value;
    if (comment)  {
        let newHtmlContent = `<div class="fv-row mb-7">
                                <input type="text" class="form-control form-control-solid" placeholder="" name="comment" value="${comment}" disabled/>
                            </div>`
        comments.insertAdjacentHTML('afterend', newHtmlContent);
        document.getElementById("new_comment").value = "";
    }
}

function onCreatePdf(data) {
    console.log(data);
    const { jsPDF } = window.jspdf;

    // Column headers
    var headers = ['', 'Anex IV', 'PT.CAO.052', ''];

    // Instantiate jsPDF
    var doc = new jsPDF();

    // Transform data for autoTable
    // var rows = data.map(function(item){
    //     return [item.id, item.name, item.email];
    // });
    const owner = JSON.parse(data.owner);
    const envelop = JSON.parse(data.envelop);
    const basket = JSON.parse(data.basket);
    const burner = JSON.parse(data.burner);
    const cylinders = JSON.parse(data.cylinder);
    const requestedTasks = JSON.parse(data.requestedTasks);
    const workAccept = JSON.parse(data.workAccept);
    const ownerApproval = JSON.parse(data.ownerApproval);
    const performedTasks = JSON.parse(data.performedTasks);
    const certificates = JSON.parse(data.certificates);
    const comments = JSON.parse(data.comments);

    let rows = [];
    rows.push(['WORK ORDER', '', 'NUMBER', data.number]);
    rows.push(['', '', '', '']);
    rows.push(['OWNER/OPERATOR', '', '', '']);
    rows.push(['NAME', 'ADDRESS', '', '']);
    rows.push([owner.name, owner.address, '', '']);
    rows.push(['CITY', 'POSTAL CODE', 'PHONE', 'EMAIL']);
    rows.push([owner.city, owner.postal, owner.phone, owner.email]);
    rows.push(['AIRCRAFT', '', '', '']);
    rows.push(['ENVELOPE', 'MODEL', 'S/N', 'REGISTRATION']);
    rows.push([envelop.envelop, envelop.envelopModel, envelop.envelopSN, envelop.registration]);
    rows.push(['LAST INSPECTION DATE', 'TOTAL HOURS', '', 'HOURS SINCE LAST INSPECTION']);
    rows.push([envelop.lastDate, envelop.totalHour, '', envelop.lasthour]);
    rows.push(['BASKET', 'MODEL', 'S/N', '']);
    rows.push([basket.basket, basket.basketModel, basket.basketSN, '']);
    rows.push(['BURNER', 'MODEL', 'S/N', '']);
    rows.push([burner.burner, burner.burnerModel, burner.burnerSN, '']);
    rows.push(['CYLINDERS', 'MODEL', 'S/N', '']);
    cylinders.map(item => {
        rows.push([item.cylinder, item.cylinder_model, item.cylinder_sn, '']);
    })
    rows.push(['REQUESTED TASKS', '', '', '']);
    requestedTasks.map(item => {
        rows.push([item, '', '', '']);
    })
    rows.push(['WORK ORDER CAO ACCEPTATION', 'DATE', 'SIGNATURE', '']);
    rows.push([workAccept.workAccept, workAccept.workAcceptDate, '', '']);
    rows.push(['OWNER/OPERATOR WO APPROVAL', 'DATE', 'SIGNATURE', '']);
    rows.push([ownerApproval.ownerApproval, ownerApproval.ownerApprovalDate, '', '']);
    rows.push(['PERFORMED TASKS', '', '', '']);
    performedTasks.map(item => {
        rows.push([item, '', '', '']);
    })
    rows.push(['CERTIFICATES ISSUED', 'REFERENCE NR.', '', 'DATE']);
    certificates.map(item => {
        rows.push([item.certificate, item.certificate_reference, '', item.certificate_date]);
    })
    rows.push(['COMMENTS AND/OR NON-CONFORMITIES', '', '', '']);
    comments.map(item => {
        rows.push([item, '', '', '']);
    })
    rows.push(['ORGANIZATION', 'SIGNATURE', '', 'COMPLETION DATE']);
    rows.push([data.organization, '', '', data.completeDate]);

    // Use autoTable to generate the table
    doc.autoTable({
        head: [headers],
        body: rows,
    });

    // Save the PDF
    doc.save('table.pdf');
}