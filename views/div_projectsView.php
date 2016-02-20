<script src="js/handlers.js"></script>
<script src="js/constructors.js"></script>

<h1>Hi, <span class="user_login"></span>!!!</h1>
<a href="#" id="btn_logout" class="btn">Quit</a>

<div id="tmp" class="project" style="display: none" data-proj_id="">
    <!---------------------------------------------------------------------------------------->
    <!---------------------------------------------------------------------------------------->
    <!---------------------------------------------------------------------------------------->
    <div class="proj_caption">
        <div class="proj_ico"></div>
        <div class="proj_panels">
    <!---------------------------------------------------------------------------------------->
            <div class="proj_index">
                <div class="proj_btns">
                    <div class="btn_proj_edit"><i class="fa fa-pencil fa-lg"></i></div>
                    <div class="btn_proj_del"><i class="fa fa-trash-o fa-lg"></i></div>
                </div>
                <div class="proj_text">
                    <div class="proj_name">New TODO list</div>
                </div>
            </div>
    <!---------------------------------------------------------------------------------------->
            <div class="proj_edit"  style="display: none">
                <div class="proj_btns">
                    <div class="btn_ok"><i class="fa fa-check fa-lg"></i></div>
                    <div class="btn_cancel"><i class="fa fa-close fa-lg"></i></div>
                </div>
                <div class="proj_text">
                    <form class="proj_edit">
                        <input type="text" name="name" value=""/>
                        <input type="hidden" name="id" value=""/>
                    </form>
                </div>
            </div>
    <!---------------------------------------------------------------------------------------->
            <div class="proj_del" style="display: none">
                 <div class="proj_btns">
                    <div class="btn_ok"><i class="fa fa-check fa-lg"></i></div>
                    <div class="btn_cancel"><i class="fa fa-close fa-lg"></i></div>
                </div>
                <div class="proj_text">
                    <span class="delete_question"><strong>Delete? </strong></span>
                    <span class="proj_name">New TODO list</span>
                    <form class="proj_del">
                        <input type="hidden" name="id" value=""/>
                    </form>
                </div>
            </div>
    <!---------------------------------------------------------------------------------------->
        </div>
    </div>
    <!---------------------------------------------------------------------------------------->
    <!---------------------------------------------------------------------------------------->
    <!---------------------------------------------------------------------------------------->
    <div class="task_create">
        <div class="create_ico btn_cteate_task"></div>
        <form class="task_create" method="POST">
            <input type="text" name="name" placeholder="Start typing here to cteate a task..."/>
            <input type="hidden" name="proj_id" value=""/>
            <button type="submit">Add Task</button>
        </form>
    </div>
    <!---------------------------------------------------------------------------------------->
    <!---------------------------------------------------------------------------------------->
    <!---------------------------------------------------------------------------------------->
    <div class="tasks_list">
        <form class="tasks" method="POST">
            <input type="hidden" name="proj_id" value=""/>
        </form>
        <div class="task" data-task_id="" style="display: none">
    <!---------------------------------------------------------------------------------------->
            <div class="task_index">
                <div class="task_btns">
                    <div class="btns_priority">
                        <div class="btn_prior_up"><i class="fa fa-sort-up"></i></div>
                        <div class="btn_prior_down"><i class="fa fa-sort-down"></i></div>
                        <form class="task_prior_up" method="POST">
                            <input type="hidden" name="id_1" value=""/>
                            <input type="hidden" name="id_2" value=""/>
                        </form>
                        <form class="task_prior_down" method="POST">
                            <input type="hidden" name="id_1" value=""/>
                            <input type="hidden" name="id_2" value=""/>
                        </form>
                    </div>
                    <div class="btn_task_edit"><i class="fa fa-pencil"></i></div>
                    <div class="btn_task_del"><i class="fa fa-trash-o"></i></div>
                </div>
                <div class="task_status">
                    <form class="task_status" method="POST">
                        <input type="checkbox" name="status" value="1"/>
                        <input type="hidden" name="id" value=""/>
                    </form>
                </div>
                <div class="empty_div"></div>
                <div class="task_text">
                    <div class="task_name">New Task</div>
                </div>
            </div>
    <!---------------------------------------------------------------------------------------->
            <div class="task_edit" style="display: none">
                <div class="task_btns">
                    <div class="btn_ok"><i class="fa fa-check"></i></div>
                    <div class="btn_cancel"><i class="fa fa-close"></i></div>
                </div>
                <div class="task_status"></div>
                <div class="empty_div"></div>
                <div class="task_text">
                    <form class="task_edit">
                        <input type="text" name="name" value=""/>
                        <input type="hidden" name="id" value=""/>
                    </form>
                </div>
            </div>
    <!---------------------------------------------------------------------------------------->
            <div class="task_del" style="display: none">
                <div class="task_btns">
                    <div class="btn_ok"><i class="fa fa-check"></i></div>
                    <div class="btn_cancel"><i class="fa fa-close"></i></div>
                </div>
                <div class="task_status"></div>
                <div class="empty_div"></div>
                <div class="task_text">
                    <span class="delete_question">Delete? </span>
                    <span class="task_name">New Task</span>
                    <form class="task_del">
                        <input type="hidden" name="id" value=""/>
                    </form>
                </div>
            </div>
    <!---------------------------------------------------------------------------------------->
        </div>
    </div>
    <!---------------------------------------------------------------------------------------->
    <!---------------------------------------------------------------------------------------->
    <!---------------------------------------------------------------------------------------->
</div>

<div id="projects"></div>

<form class="proj_create" method="POST">
    <input type="hidden" name="name" value="New TODO List"/>
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-plus fa-2x"></i> 
        <span>Add TODO List</span>
    </button>
</form>