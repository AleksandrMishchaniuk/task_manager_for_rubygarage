function Project(id, name, proj_arr){
    this.id = id;
    this.name = name;
    this.projects = proj_arr;
    this.tasks = [];
    this.div = {};
    
    this.init = function(){
        var curent = this;
        this.div = $('#tmp').clone();
        this.div.removeAttr('id').appendTo('#projects');
        this.div.css({display: 'block'});
        this.div.attr('data-proj_id', this.id);
        
        $(".btn_proj_edit", this.div.get(0)).click(function(){
            $("div.proj_index", curent.div.get(0)).css({display: 'none'});
            $("div.proj_edit", curent.div.get(0)).css({display: 'block'});
        });
        $(".btn_proj_del", this.div.get(0)).click(function(){
            $("div.proj_index", curent.div.get(0)).css({display: 'none'});
            $("div.proj_del", curent.div.get(0)).css({display: 'block'});
        });
        $("form.proj_del", curent.div.get(0)).submit(function(){
            ajaxAction('projectDelete', '/projects/delete', this);
            return false;
        });
        $("form.proj_edit", curent.div.get(0)).submit(function(){
            ajaxAction('projectEdit', '/projects/update', this);
            return false;
        });
        $("div.proj_del .btn_ok", this.div.get(0)).click(function(){
            $("form.proj_del", curent.div.get(0)).submit();
        });
        $("div.proj_edit .btn_ok", this.div.get(0)).click(function(){
            $("form.proj_edit", curent.div.get(0)).submit();
        });
        $("div.proj_del .btn_cancel", this.div.get(0)).click(function(){
            $("div.proj_index", curent.div.get(0)).css({display: 'block'});
            $("div.proj_del", curent.div.get(0)).css({display: 'none'});
        });
        $("div.proj_edit .btn_cancel", this.div.get(0)).click(function(){
            $("div.proj_index", curent.div.get(0)).css({display: 'block'});
            $("div.proj_edit", curent.div.get(0)).css({display: 'none'});
            $("form.proj_edit [name='name']", curent.div.get(0)).val(curent.name);
        });
    };
    
    this.render = function(){
        $('.proj_name', this.div.get(0)).html(this.name);
        $("form.proj_edit [name='name']", this.div.get(0)).attr('value',this.name);
        $("form.proj_edit [name='id']", this.div.get(0)).val(this.id);
        $("form.proj_del [name='id']", this.div.get(0)).val(this.id);
        $("form.tasks [name='proj_id']", this.div.get(0)).val(this.id);
        $("form.task_create [name='proj_id']", this.div.get(0)).val(this.id);
    };
    
    this.getTasks = function(){
        $("form.tasks", this.div.get(0)).submit(function(){
            ajaxAction('showTasks', '/tasks', this);
            return false;
        });
        $("form.tasks", this.div.get(0)).submit();
    };
}

function Task(id, name, status, priority, deadline, project){
    this.id = id;
    this.name = name;
    this.status = status;
    this.priority = priority;
    this.deadline = deadline;
    this.project = project;
    this.div = {};
    
    this.init = function(){
        var curent = this;
        this.div = $('#tmp .task').clone();
        $('.tasks_list', this.project.div.get(0)).append(this.div);
        this.div.css({display: 'block'});
        this.div.attr('data-task_id', this.id);
        
        $("form.task_prior_up", this.div.get(0)).submit(function(){
            var index = getIndexById(curent.id, curent.project.tasks);
            try{
                $("[name='id_2']", this).val(curent.project.tasks[index-1].id);
            }catch(e){}
            return false;
        });
        $("form.task_prior_down", this.div.get(0)).submit(function(){
            var index = getIndexById(curent.id, curent.project.tasks);
            try{
                $("[name='id_2']", this).val(curent.project.tasks[index+1].id);
            }catch(e){}
            return false;
        });
        
        $(".btn_prior_up", this.div.get(0)).click(function(){
            $("form.task_prior_up", curent.div.get(0)).submit();
        });
        $(".btn_prior_down", this.div.get(0)).click(function(){
            $("form.task_prior_down", curent.div.get(0)).submit();
        });
    }
    
    this.render = function(){
        $('.task_name', this.div.get(0)).html(this.name);
        if(+this.status){
            $("form.task_status [name='status']", this.div.get(0)).attr('checked','checked');
        }
        $("form.task_status [name='id']", this.div.get(0)).val(this.id);
        $("form.task_edit [name='name']", this.div.get(0)).attr('value',this.name);
        $("form.task_edit [name='id']", this.div.get(0)).val(this.id);
        $("form.task_del [name='id']", this.div.get(0)).val(this.id);
        
        $("form.task_prior_up [name='id_1']", this.div.get(0)).val(this.id);
        $("form.task_prior_down [name='id_1']", this.div.get(0)).val(this.id);
    };
}