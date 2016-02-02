function initApp(data){
    if(data){
        divShow('#div_projects');
    }else{
        divShow('#div_login');
    }
}

function divShow(div_id){
    $(div_id).siblings().andSelf().hide(0);
    if(!$(div_id).html()){
        divLoad(div_id);
    }else{
        $(div_id).show(0);
    }
}

function msgShow(selector, msg, time){
    if(!time){
        time = 3000;
    }
    var msg_html = '';
    for(var i=0; i<msg.length; i++){
        msg_html += msg[i]+'<br/>';
    }
    $(selector).html(msg_html);
    setTimeout(function(){
        $(selector).fadeOut(1000, function(){
            $(selector).html('');
            $(selector).show();
        });
    }, time);
}