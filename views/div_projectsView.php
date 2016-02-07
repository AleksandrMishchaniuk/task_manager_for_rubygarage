<script src="js/handlers.js"></script>
<script src="js/constructors.js"></script>

<h1>Hi, <span class="user_login"></span>!!!</h1>
<a href="#" id="btn_logout">Quit</a>

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
                    <div class="btn_proj_edit">edit</div>
                    <div class="btn_proj_del">del</div>
                </div>
                <div class="proj_text">
                    <div class="proj_name">New TODO list</div>
                </div>
            </div>
    <!---------------------------------------------------------------------------------------->
            <div class="proj_edit"  style="display: none">
                <div class="proj_btns">
                    <div class="btn_ok">ok</div>
                    <div class="btn_cancel">cancel</div>
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
                    <div class="btn_ok">ok</div>
                    <div class="btn_cancel">cancel</div>
                </div>
                <div class="proj_text">
                    <span class="delete_question"><strong>Delete?</strong></span>
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
                        <div class="btn_prior_up">up</div>
                        <div class="btn_prior_down">down</div>
                        <form class="task_prior_up" method="POST">
                            <input type="hidden" name="id_1" value=""/>
                            <input type="hidden" name="id_2" value=""/>
                        </form>
                        <form class="task_prior_down" method="POST">
                            <input type="hidden" name="id_1" value=""/>
                            <input type="hidden" name="id_2" value=""/>
                        </form>
                    </div>
                    <div class="btn_task_edit">edit</div>
                    <div class="btn_task_del">del</div>
                </div>
                <div class="task_status">
                    <form class="task_status">
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
                    <div class="btn_ok">ok</div>
                    <div class="btn_cancel">cancel</div>
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
                    <div class="btn_ok">ok</div>
                    <div class="btn_cancel">cancel</div>
                </div>
                <div class="task_status"></div>
                <div class="empty_div"></div>
                <div class="task_text">
                    <div class="delete_question">Delete?</div>
                    <div class="task_name">New Task</div>
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
    <button type="submit">
        <span class="create_ico"></span>
        Add TODO List
    </button>
</form>