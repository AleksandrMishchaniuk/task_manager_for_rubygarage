
function actionRegistration(data){
    data = JSON.parse(data);
    if(+data['ok']){
        $('#form_reg input').not("[type=submit]").each(function(){
           $(this).val('');
        });
        divShow('#div_login');
        msgShow('#div_login .msg', data['msg']);
    }else{
        $('#form_reg [type=password]').each(function(){
           $(this).val(''); 
        });
        msgShow('#div_reg .msg', data['msg'], 10000);
    }
}

function actionLogin(data){
    data = JSON.parse(data);
    if(+data['ok']){
        $('#form_login input').not("[type=submit]").each(function(){
           $(this).val('');
        });
        divShow('#div_projects');
    }else{
        $('#form_login [type=password]').each(function(){
           $(this).val(''); 
        });
        msgShow('#div_login .msg', data['msg']);
    }
}

function actionLogout(data){
    data = JSON.parse(data);
    if(+data){
        $('#div_projects').empty();
        divShow('#div_login');
    }
}

function actionInsertLogin(data){
    data = getData(data);
    if(+data['ok']){
        $('.user_login').html(data['data']['login']);
    }
}

function actionShowProjects(data){
    data = getData(data);
    if(+data['ok'] && data['data'].length>0){
        for(var i=0; i<data['data'].length; i++){
            projects[i]=new Project(data['data'][i]['id'], data['data'][i]['name'], projects);
            projects[i].init();
            projects[i].render();
            projects[i].getTasks();
        }
    }
}

function actionProjectDelete(data){
    data = getData(data);
    if(+data['ok']){
        var index = getIndexById(data['data']['id'], projects);
        projects.splice(index,1);
        $("[data-proj_id='"+data['data']['id']+"']").remove();
    }
}

function actionProjectEdit(data){
    data = getData(data);
    if(+data['ok']){
        var index = getIndexById(data['data']['id'], projects);
        projects[index].name = data['data']['name'];
        projects[index].render();
        $("div.proj_index", projects[index].div.get(0)).css({display: 'block'});
        $("div.proj_edit", projects[index].div.get(0)).css({display: 'none'});
    }
}

function actionProjectCreate(data){
    data = getData(data);
    if(+data['ok']){
        var project = new Project(data['data']['id'], data['data']['name'], projects);
        projects.push(project);
        project.init();
        project.render();
    }
}

function actionShowTasks(data){
    data = getData(data);
    if(+data['ok'] && data['data'].length>0){
        var index = getIndexById(data['data'][0]['project_id'], projects);
        for(var i=0; i<data['data'].length; i++){
            var task = data['data'][i];
            projects[index].tasks[i]=new Task(task['id'], task['name'], task['status'], task['priority'], task['deadline'], projects[index]);
            projects[index].tasks[i].init();
            projects[index].tasks[i].render();
        }
    }
}