$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

$(function(){
    $('div[onload]').trigger('onload');
});
function copy_text(el){
    document.getElementById(el.dataset.elem).select();
    document.execCommand("copy");
}
function save_message(but,func){
    $( "#save-message" )
        .animate({ "right": "+=230px" }, 300 )
        .animate({ "right": "-=15px" }, 200 )
        .animate({ "right": "+=5px" }, 200)
        .animate({ "right": "-=0px" }, 1000 )
        .animate({ "top": "-=70px" }, 200 )
        .animate({ "right": "-=220px" }, 0 )
        .animate({ "top": "+=70px" }, 0 );
    setTimeout(function (){
        if (but != null){
            but.setAttribute('onclick',func)
            but.removeAttribute('disabled')
        }
    },2000)
}
function delete_message(){
    $( "#delete-message" )
        .animate({ "right": "+=230px" }, 300 )
        .animate({ "right": "-=15px" }, 200 )
        .animate({ "right": "+=5px" }, 200)
        .animate({ "right": "-=0px" }, 1000 )
        .animate({ "top": "-=70px" }, 200 )
        .animate({ "right": "-=220px" }, 0 )
        .animate({ "top": "+=70px" }, 0 );
}
function error_message(error,but,func){
    $( "#error-message" ).html(error)
    $( "#error-message" )
        .animate({ "right": "+=330px" }, 300 )
        .animate({ "right": "-=15px" }, 200 )
        .animate({ "right": "+=5px" }, 200)
        .animate({ "right": "-=0px" }, 1000 )
        .animate({ "top": "-=70px" }, 200 )
        .animate({ "right": "-=320px" }, 0 )
        .animate({ "top": "+=70px" }, 0 );
    setTimeout(function (){
        if (but != null){
            but.setAttribute('onclick',func)
            but.removeAttribute('disabled')
        }

    },2000)
}
function process_message_start(){
    $( "#process-message" )
        .animate({ "right": "+=230px" }, 300 )
        .animate({ "right": "-=15px" }, 200 )
        .animate({ "right": "+=5px" }, 200)
        .animate({ "right": "-=0px" }, 1000 )
}
function process_message_end(){
    $( "#process-message" )
        .animate({ "top": "-=70px" }, 50 )
        .animate({ "right": "-=220px" }, 0 )
        .animate({ "top": "+=70px" }, 0 );
}
function addStaffProject(el){
    $.ajax({
        type: "GET",
        url: "/projects/add_staff",
        data: {
            id:$('#projectStaff').val(),
            project_id:el.dataset.id
        },
        success: function (result) {
            $('#staff').append(result)
            // save_message()

        }
    })
}

function createProfession(){
    let name = $('#create-profession-name').val()
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('name', name)
    let input_file = document.querySelector('#create-profession-icon');
    let file = input_file.files
    $(file).each(function(index, file) {
        // if ((file.size <= maxFileSize) && ((file.type === 'image/png') || (file.type === 'image/jpeg') || (file.type === 'image/gif') || (file.type === 'image/svg+xml'))) {
        Data.append('photo',file)
        // }
    })
    if (name != ''){
        $.ajax({
            type: "POST",
            url: "/staff/create_profession",
            data: Data,
            processData: false,
            contentType: false,
            success: function (result) {
                $('.professions').prepend(result)
            }
        })
    }
}

function professionInfo(id){
    $.ajax({
        type: "GET",
        url: "/staff/profession_info",
        data: {
            id:id
        },
        success: function (result) {
            $('.profession-info').html(result)
            // save_message()
        }
    })
}

function editStaffContent(el){
    $.ajax({
        type: "GET",
        url: "/staff/edit_staff_content",
        data: {
            id:el.dataset.id
        },
        success: function (result) {
            $('.staff-edit-body').html(result)
            // save_message()
        }
    })
}
function editProjectContent(el){
    $.ajax({
        type: "GET",
        url: "/projects/edit_project_content",
        data: {
            id:el.dataset.id
        },
        success: function (result) {
            $('.project-edit-body').html(result)
            // save_message()
        }
    })
}
function editProjectSave(el){
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('id', el.dataset.id)
    Data.append('name', $('#project-name').val())
    Data.append('status', $('#project-status').val())
    Data.append('responsible', $('#project-responsible').val())
    Data.append('client', $('#project-client').val())
    Data.append('startDate', $('#project-startDate').val())
    Data.append('endDate', $('#project-endDate').val())
    Data.append('address', $('#project-address').val())
    Data.append('contact', $('#project-contact').val())
    // if (name != ''){
        $.ajax({
            type: "POST",
            url: "/projects/save_project_content",
            data: Data,
            processData: false,
            contentType: false,
            success: function (result) {
                $('.project-edit-body').html(result)
            }
        })
    // }
}
function editStaffSave(id){
    let name = $('#staff-name').val()
    let surname = $('#staff-surname').val()
    let patronymic = $('#staff-patronymic').val()
    let birth_date = $('#staff-birth_date').val()
    let phone = $('#staff-phone').val()
    let email = $('#staff-email').val()
    let status = $('#staff-status').val()
    let profession = $('#staff-profession').val()
    let rate = $('#staff-rate').val()
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('id', id)
    Data.append('name', name)
    Data.append('surname', surname)
    Data.append('patronymic', patronymic)
    Data.append('birth_date', birth_date)
    Data.append('phone', phone)
    Data.append('email', email)
    Data.append('status', status)
    Data.append('profession', profession)
    Data.append('rate', rate)
    if (name != ''){
        $.ajax({
            type: "POST",
            url: "/staff/edit_staff_save",
            data: Data,
            processData: false,
            contentType: false,
            success: function (result) {
                $('.staff-edit-body').html(result)
            }
        })
    }
}
function editClientSave(id){
    let name = $('#client-name').val()
    let surname = $('#client-surname').val()
    let patronymic = $('#client-patronymic').val()
    let birthdate = $('#client-birthdate').val()
    let phone = $('#client-phone').val()
    let email = $('#client-email').val()
    let status = $('#client-status').val()
    let country = $('#client-country').val()
    let city = $('#client-city').val()
    let address = $('#client-address').val()
    let company = $('#client-company').val()
    let contractSum = $('#client-contractSum').val()
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('id', id)
    Data.append('name', name)
    Data.append('surname', surname)
    Data.append('patronymic', patronymic)
    Data.append('birthdate', birthdate)
    Data.append('phone', phone)
    Data.append('email', email)
    Data.append('status', status)
    Data.append('country', country)
    Data.append('city', city)
    Data.append('address', address)
    Data.append('company', company)
    Data.append('contractSum', contractSum)
    if (name != ''){
        $.ajax({
            type: "POST",
            url: "/clients/edit_client_save",
            data: Data,
            processData: false,
            contentType: false,
            success: function (result) {
                $('.client-edit-body').html(result)
            }
        })
    }
}

function editClientContent(el){
    $.ajax({
        type: "GET",
        url: "/clients/edit_client_content",
        data: {
            id:el.dataset.id
        },
        success: function (result) {
            $('.client-edit-body').html(result)
            // save_message()
        }
    })
}
function editClientComment(el){
    $.ajax({
        type: "GET",
        url: "/clients/edit_client_comment",
        data: {
            id:el.dataset.id
        },
        success: function (result) {
            $('.client-comment-body').html(result)
            // save_message()
        }
    })
}
function saveClientComment(el){
    let comment = $('#client-comment').val()
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('id', el.dataset.id)
    Data.append('comment', comment)
    // if (comment != ''){
        $.ajax({
            type: "POST",
            url: "/clients/save_client_comment",
            data: Data,
            processData: false,
            contentType: false,
            success: function (result) {
                $('.client-comment-body').html(result)
            }
        })
    // }
}
function editProjectComment(el){
    $.ajax({
        type: "GET",
        url: "/projects/edit_project_comment",
        data: {
            id:el.dataset.id
        },
        success: function (result) {
            $('.project-comment-body').html(result)
            // save_message()
        }
    })
}
function editProjectLink(el){
    $.ajax({
        type: "GET",
        url: "/projects/edit_project_link",
        data: {
            id:el.dataset.id
        },
        success: function (result) {
            $('.project-link-body').html(result)
            // save_message()
        }
    })
}
function saveProjectComment(el){
    let comment = $('#project-comment').val()
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('id', el.dataset.id)
    Data.append('comment', comment)
    // if (comment != ''){
        $.ajax({
            type: "POST",
            url: "/projects/save_project_comment",
            data: Data,
            processData: false,
            contentType: false,
            success: function (result) {
                $('.project-comment-body').html(result)
            }
        })
    // }
}
function saveProjectLink(el){
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('id', el.dataset.id)
    Data.append('figma', $('#project-figma').val())
    Data.append('projectUrl', $('#project-projectUrl').val())
    // if (comment != ''){
        $.ajax({
            type: "POST",
            url: "/projects/save_project_link",
            data: Data,
            processData: false,
            contentType: false,
            success: function (result) {
                $('.project-link-body').html(result)
            }
        })
    // }
}
function addStageProject(el){
    let name = $('#stageName').val()
    if (name != ''){
        $.ajax({
            type: "GET",
            url: "/projects/add_stage",
            data: {
                name:name,
                project_id:el.dataset.id
            },
            success: function (result) {
                $('.left-stage-menu').append(result)
                // save_message()

            }
        })
    }
}

function addCsvProject(el){
    let input_file = document.querySelector('#stageCsv');
    let file = input_file.files
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('project_id', el.dataset.id)
    $(file).each(function(index, file) {
        Data.append('file',file)
    })
    if (file != ''){
        process_message_start()
        $.ajax({
            type: "POST",
            url: "/projects/add_stage_csv",
            data: Data,
            processData: false,
            contentType: false,
            success: function (result) {
                load_stage_left_bar(el.dataset.id)
                process_message_end()
                save_message()
                console.log(result)
            }
        })
    }
}

function addCsvTask(el){
    let input_file = document.querySelector('#taskCsv');
    let file = input_file.files
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('project_id', el.dataset.id)
    Data.append('stage_id', $('#stageCsvId').val())
    $(file).each(function(index, file) {
        Data.append('file',file)
    })
    if (file != ''){
        process_message_start()
        $.ajax({
            type: "POST",
            url: "/projects/add_task_csv",
            data: Data,
            processData: false,
            contentType: false,
            success: function (result) {
                stepTableContent(el.dataset.id)
                process_message_end()
                save_message()
                console.log(result)
            }
        })
    }
}

function load_stage_left_bar(id){
    $.ajax({
        type: "GET",
        url: "/projects/load_stage_left_bar",
        data: {
            id:id,
        },
        success: function (result) {
            $('.left-stage-menu').html(result)

        }
    })
}

function addStepProject(el){
    let name = $('#stepName').val()
    let stage = $('#stageId').val()
    if (name != '' && stage != 0){
        $.ajax({
            type: "GET",
            url: "/projects/add_step",
            data: {
                name:name,
                stage_id:stage,
                stepComment: $('#stepComment').val(),
                project_id:el.dataset.id
            },
            success: function (result) {
                $('.step-table').html(result)
                // save_message()

            }
        })
    }
}

function addTaskProject(el){
    // console.log($('#taskParticipants').val())
    let name = $('#taskName').val()
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('project_id', el.dataset.id)
    Data.append('name', name)
    Data.append('priority', $('#taskPriority').val())
    Data.append('stageId', document.querySelector('input[name=stage]:checked').dataset.value)
    Data.append('dateStart', $('#tasDateStart').val())
    Data.append('dateEnd', $('#tasDateEnd').val())
    Data.append('time', $('#taskTime').val())
    Data.append('participants', $('#taskParticipants').val())
    Data.append('text', $('#taskText').val())
    Data.append('type', 'task')
    Data.append('return', 'project')
    if (name != ''){
        $.ajax({
            type: "POST",
            url: "/projects/create_element",
            data: Data,
            processData: false,
            contentType: false,
            success: function (result) {
                $('.step-table').html(result)
                console.log('ok')
            }
        })
    }
}
function taskView(el){
    let id = el.dataset.id
    $.ajax({
        type: "GET",
        url: "/projects/task_view",
        data: {
            id:id,
            project_id:el.dataset.pr,
        },
        success: function (result) {
            $('.task-body').html(result)
        }
    })
}
$(document).ready(function() {
    $('.task').click(function (){
        // console.log(this.dataset.id)
        let id = this.dataset.id
        $.ajax({
            type: "GET",
            url: "/projects/task_view",
            data: {
                id:id,
                project_id:this.dataset.pr
            },
            success: function (result) {
                $('.task-body').html(result)
            }
        })
    });
})

function taskView(el){
    let id = el.dataset.id
    $.ajax({
        type: "GET",
        url: "/projects/task_view",
        data: {
            id:id,
            project_id:el.dataset.pr
        },
        success: function (result) {
            $('.task-body').html(result)
        }
    })
}

function markText(el){
    el.setAttribute('class','mark-text d-none bg-light p-2 w-100');
    document.querySelector('.mark-textarea').setAttribute('class','mark-textarea form-control border-0 p-2 bg-grey w-100 mt-2');
    $('.mark-textarea').focus();
}
function markTextarea(el){
    el.setAttribute('class','mark-textarea d-none form-control border-0 p-2 bg-grey w-100 mt-2');
    document.querySelector('.mark-text').setAttribute('class','mark-text bg-light p-2 w-100');
    // $('.mark-textarea').focus;
}

function  taskAddStaffMenu(el){
    taskStaffMenu(el.dataset.id,el.dataset.pr,el.dataset.type)
    console.log(this.value = event.clientX+':'+event.clientY)
    console.log(document.documentElement.clientWidth)
    let windowWidth = document.documentElement.clientWidth;
    let posX = this.value = event.clientX;
    if (windowWidth - posX <= 300){
        posX = posX - 300
    }
    $('.task-add-staff-menu')
        .css('top',this.value = event.clientY)
        .css('left',posX);

    $('.task-add-staff-menu').show()
}

$(document).mouseup(function (e) {
    var container = $(".task-add-staff-menu");
    if (container.has(e.target).length === 0){
        container.hide();
    }
});

function prStepFilter(el){
    // console.log(document.querySelector('input[name=taskview]:checked').value)
    let stage = el.dataset.value
        $.ajax({
            type: "GET",
            url: "/projects/step_table_content",
            data: {
                stage_id:stage,
                type:document.querySelector('input[name=taskview]:checked').value,
                project_id:el.dataset.id
            },
            success: function (result) {
                $('.step-table').html(result)
                // save_message()

            }
        })
}

function delElem(el){
    document.querySelector('#deletePrElement').dataset.type = el.dataset.type;
    document.querySelector('#deletePrElement').dataset.elemid = el.dataset.id;
}

function  stepTableContent(id){
    // console.log(document.querySelector('input[name=stage]:checked').dataset.type)
    document.querySelector('.add-st-tsk').dataset.bsTarget='#addTask'
    $.ajax({
        type: "GET",
        url: "/projects/step_table_content",
        data: {
            stage_id:document.querySelector('input[name=stage]:checked').dataset.value,
            project_id:id
        },
        success: function (result) {
            $('.step-table').html(result)
        }
    });
}

function loadTaskStep(el){
    // console.log(el.value)
    if (el.value > 0){
        $.ajax({
            type: "GET",
            url: "/projects/load_task_step",
            data: {
                id:el.value,
            },
            success: function (result) {
                $('#taskStepId').html(result)
            }
        });
    }

}

function deletePrElement(el){
    // console.log(el.dataset.type)
    // console.log(el.dataset.elemid)
    $.ajax({
        type: "GET",
        url: "/projects/delete_pr_element",
        data: {
            type:el.dataset.type,
            elemid:el.dataset.elemid,
            // project_id:el.dataset.id
        },
        success: function (result) {
            if (el.dataset.pg == 'task'){
                $('.task-'+el.dataset.elemid).remove()
            }else{
                let elements = document.querySelectorAll('.'+el.dataset.type+'-'+el.dataset.elemid)
                elements.forEach(function(element) {
                    element.remove();
                });
            }

        }
    })
}


function loadTask(){
    $.ajax({
        type: "GET",
        url: "/tasks/load_task",
        data: {
            id: $('#project-id').val()
        },
        success: function (result) {
            $('.staff-kanban').html(result)
            console.log($('#project-id').val())
            draglist()
        }
    })
}
function draglist(){
    $(document).ready(function() {
        const tasksListElements = document.querySelectorAll(`.tasks__list`);
        const taskElements = document.querySelectorAll(`.tasks__item`);

        for (const task of taskElements) {
            task.draggable = true;
        }
        for (const tasksListElement of tasksListElements) {
            tasksListElement.addEventListener(`dragstart`, (evt) => {
                evt.target.classList.add(`selected`);
            });

            tasksListElement.addEventListener(`dragend`, (evt) => {
                evt.target.classList.remove(`selected`);
                numers()
            });

            const getNextElement = (cursorPosition, currentElement) => {
                const currentElementCoord = currentElement.getBoundingClientRect();
                const currentElementCenter = currentElementCoord.y + currentElementCoord.height / 2;

                const nextElement = (cursorPosition < currentElementCenter) ?
                    currentElement :
                    currentElement.nextElementSibling;

                return nextElement;
            };

            tasksListElement.addEventListener(`dragover`, (evt) => {
                evt.preventDefault();

                const activeElement = document.querySelector(`.selected`);
                const currentElement = evt.target;
                const isMoveable = activeElement !== currentElement &&
                    currentElement.classList.contains(`tasks__item`);

                if (!isMoveable) {
                    return;
                }

                const nextElement = getNextElement(evt.clientY, currentElement);

                if (
                    nextElement &&
                    activeElement === nextElement.previousElementSibling ||
                    activeElement === nextElement
                ) {
                    return;
                }

                console.log(tasksListElement)
                console.log(activeElement)
                console.log(nextElement)
                tasksListElement.insertBefore(activeElement, nextElement);
            });
        }
    })
}
function numers(){
    let columns = document.querySelectorAll('.column');

    // let Data = {}
    let column_arr = []
    columns.forEach(function(column, i, arr) {
        let tasks = column.querySelectorAll('.task')

        let column_obj = {}
        column_obj.id = column.dataset.id
        column_obj.number = i+1

        let tasks_arr = []
        tasks.forEach(function(task, k, arr) {
            task.dataset.number = k+1
            let tasks_obj = {}
            tasks_obj.id = task.dataset.id
            tasks_obj.number = k+1

            tasks_arr.push(tasks_obj)
        })
        column_obj.tasks = tasks_arr

        column_arr.push(column_obj)
    })

    // Data = column_arr
    console.log(column_arr)
    $.ajax({
        type: "GET",
        url: "/tasks/task_num",
        data: {
            column_data:column_arr
        },
        success: function (result) {
            console.log(result)

        }
    })
}
function kanbanCreateElem(el){
    console.log(el.dataset.type)
    console.log(el.dataset.column)

    let Data = new FormData;
    Data.append('_token', CSRF_TOKEN)
    Data.append('project_id', el.dataset.pr)
    Data.append('column', el.dataset.column)
    Data.append('type', el.dataset.type)
    Data.append('return', 'task')
    if (el.dataset.type === 'column'){
        Data.append('name', $('#column-name').val())
    }
    if (el.dataset.type === 'task'){
        Data.append('name', $('#task-name-'+el.dataset.column).val())
    }
    $.ajax({
        type: "POST",
        url: "/projects/create_element",
        data: Data,
        processData: false,
        contentType: false,
        success: function (result) {
            if (el.dataset.type == 'column'){
                $('.column-create').before(result)
            }
            if (el.dataset.type == 'task'){
                $('.task-hr-'+el.dataset.column).before(result)
            }
            draglist()
        }
    })
}

function saveTaskElem(el){
    console.log(el.value)
    $.ajax({
        type: "GET",
        url: "/tasks/save_elem",
        data: {
            id:el.dataset.id,
            type:el.dataset.type,
            value:el.value,
        },
        success: function (result) {
            if (el.dataset.type == 'name'){
                $('.task-name-'+el.dataset.id).html(el.value)
                console.log(el.value)
                // document.querySelector('task-'+el.dataset.id+' p').innerText = el.value
            }
            console.log(result)
        }
    })
}

function taskStaffMenu(el,pr,type){
    $.ajax({
        type: "GET",
        url: "/tasks/add_task_staff_body",
        data: {
            id:el,
            project_id:pr,
            type:type,
        },
        success: function (result) {
            $('.task-add-staff-body').html(result)
        }
    })
}

function addStaffTask(el){
    $.ajax({
        type: "GET",
        url: "/tasks/add_task_staff",
        data: {
            id:el.dataset.id,
            task_id:el.dataset.task,
            project_id:el.dataset.pr,
        },
        success: function (result) {
            el.remove()
            $('.staff-section').html(result)
            console.log(result)
        }
    })
}

function addFileTask(el){
    let input_file = document.querySelector('#task_file');
    let file = input_file.files
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('id', el.dataset.id)
    // let maxFileSize = 5242880;
    $(file).each(function(index, file) {
        // if ((file.size <= maxFileSize) && ((file.type === 'image/png') || (file.type === 'image/jpeg') || (file.type === 'image/gif') || (file.type === 'image/svg+xml'))) {
            Data.append('file',file)
        // }
    })

    $.ajax({
        type: "POST",
        url: "/tasks/add_task_file",
        data: Data,
        processData: false,
        contentType: false,
        success: function (result) {
            // $('.staff-section').html(result)
            // console.log(result)
            $('.task-files').append(result)
        }
    })
}

function createChecklist(el){
    let name = $('#checklist-name').val()
    console.log(name)
    if (name != ''){
        $.ajax({
            type: "GET",
            url: "/tasks/add_task_checklist",
            data: {
                id:el.dataset.id,
                name:name,
            },
            success: function (result) {
                // $('.staff-section').html(result)
                // console.log(result)
                $('.checklists').append(result)
            }
        })
    }
}
function createCheckbox(el){
    let name = $('#checkbox-name-'+el.dataset.id).val()
    console.log(name)
    if (name != ''){
        $.ajax({
            type: "GET",
            url: "/tasks/add_task_checkbox",
            data: {
                id:el.dataset.id,
                name:name,
            },
            success: function (result) {
                $('.checklist-body-'+el.dataset.id).append(result)
                checklistProgressbar(el.dataset.id)
            }
        })
    }
}
function checkedTaskCheckbox(el){
    // let name = $('#checkbox-name-'+el.dataset.id).val()
    console.log(el.checked)
    $.ajax({
        type: "GET",
        url: "/tasks/checked_task_checkbox",
        data: {
            id:el.dataset.id,
            status:el.checked,
        },
        success: function (result) {
            checklistProgressbar(el.dataset.list)
        }
    })
}
function checklistProgressbar(id){
    let allCheckboxes = document.querySelector('.checklist-body-'+id).querySelectorAll('input[type="checkbox"]')
    let checkboxes = document.querySelector('.checklist-body-'+id).querySelectorAll('input[type="checkbox"]:checked')
    let proc = Math.round((checkboxes.length/allCheckboxes.length)*100)
    document.querySelector('.checklist-progress-'+id).animate([
        // keyframes
        { width: proc+'%' },
    ], {
        // timing options
        duration: 500,
        fill: "forwards"
    });
    // $('.checklist-progress-'+id).css('width',proc+'%');
    $('.checklist-span-'+id).html(proc+'%');
    console.log(allCheckboxes.length)
    console.log(checkboxes.length)
}

function createComments(el){
    let text = $('#comment-input').val()
    console.log(text)
    let Data = new FormData;
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content')
    Data.append('_token', CSRF_TOKEN)
    Data.append('id', el.dataset.id)
    Data.append('text', text)
    Data.append('type', 'comment')
    if (text != ''){
        $.ajax({
            type: "POST",
            url: "/tasks/add_task_comment",
            data: Data,
            processData: false,
            contentType: false,
            success: function (result) {
                $('.task-comments').prepend(result)
                console.log(result)
            }
        })
    }
}

function report_costsStages(){
    $.ajax({
        type: "GET",
        url: "/reports/report_costsStages",
        data: {
            id:$('#report_costsStagePr').val()
        },
        success: function (result) {
            $('.report-content').html(result)
        }
    })
}

function table_data(){
    $.ajax({
        type: "GET",
        url: "/tasks/data/2",
        success: function (result) {
            console.log(result)
        }
    })
}
