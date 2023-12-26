function addTask() {
    let tasks = document.getElementById("tasks");
    let task = document.getElementById("new_task").value;
    let taskTool = document.getElementById("new_task_tool").value;
    let taskOk = document.getElementById("new_task_ok").value;
    if (task)  {
        let newHtmlContent = `<div class="row g-9 mb-7">
                                <div class="col-md-6 fv-row">
                                    <input class="form-control form-control-solid" placeholder="" name="task" value="${task}" disabled/>
                                </div>
                                <div class="col-md-3 fv-row">
                                    <input class="form-control form-control-solid" placeholder="" name="task_tool" value="${taskTool}" disabled/>
                                </div>
                                <div class="col-md-3 fv-row">
                                    <input class="form-control form-control-solid" placeholder="" name="task_ok" value="${taskOk}" disabled/>
                                </div>
                            </div>`
        tasks.insertAdjacentHTML('afterend', newHtmlContent);
        document.getElementById("new_task").value = "";
        document.getElementById("new_task_tool").value = "";
        document.getElementById("new_task_ok").value = "";
    }
}

function addMaterial() {
    let materials = document.getElementById("materials");
    let material = document.getElementById("new_material").value;
    if (material)  {
        let newHtmlContent = `<div class="fv-row mb-7">
                                <input type="text" class="form-control form-control-solid" placeholder="" name="material" value="${material}" disabled/>
                            </div>`
        materials.insertAdjacentHTML('afterend', newHtmlContent);
        document.getElementById("new_material").value = "";
    }
}

function addAdditionalTask() {
    let additionalTasks = document.getElementById("additional_tasks");
    let additionalTask = document.getElementById("new_additional_task").value;
    if (addAdditionalTask)  {
        let newHtmlContent = `<div class="fv-row mb-7">
                                <input type="text" class="form-control form-control-solid" placeholder="" name="additional_task" value="${additionalTask}" disabled/>
                            </div>`
        additionalTasks.insertAdjacentHTML('afterend', newHtmlContent);
        document.getElementById("new_additional_task").value = "";
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
    var headers = ['', '', 'PT.CAO.052', ''];

    // Instantiate jsPDF
    var doc = new jsPDF();

    // Transform data for autoTable
    // var rows = data.map(function(item){
    //     return [item.id, item.name, item.email];
    // });
    const tasks = JSON.parse(data.tasks);
    const materials = JSON.parse(data.materials);
    const additionalTasks = JSON.parse(data.additionalTasks);
    const comments = JSON.parse(data.comments);

    let rows = [];
    rows.push(['TASKS CONTROL REPORT', '', 'NUMBER', data.number]);
    rows.push(['', '', '', '']);
    rows.push(['EQUIPMENT (cross not applicable)', 'MANUF. & MODEL', 'S/N', 'REGISTRATION (if applicable)']);
    rows.push([data.equipment, data.model, data.sn, data.registration]);
    rows.push(['TASK', '', 'TOOLS & CALIBRATION DATE', 'OK/NO OK']);
    tasks.map(item => {
        rows.push([item.task, '', item.task_tool, item.task_ok]);
    })
    rows.push(['USED MATERIALS', '', '', '']);
    materials.map(item => {
        rows.push([item, '', '', '']);
    })
    rows.push(['ADDITIONAL TASKS', '', '', '']);
    additionalTasks.map(item => {
        rows.push([item, '', '', '']);
    })
    rows.push(['COMMENTS AND/OR NON-CONFORMITIES', '', '', '']);
    comments.map(item => {
        rows.push([item, '', '', '']);
    })
    rows.push(['ORGANIZATION', 'SIGNATURE', '', 'DATE']);
    rows.push([data.organization, '', '', data.date]);

    // Use autoTable to generate the table
    doc.autoTable({
        head: [headers],
        body: rows,
    });

    // Save the PDF
    doc.save('table.pdf');
}