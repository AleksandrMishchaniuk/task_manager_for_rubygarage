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

function getData(data){
    if(data === 'false'){
        $('#div_projects').empty();
        divShow('#div_login');
    }
    return JSON.parse(data);
}

function getIndexById(id, arr){
    for(var i=0; i<arr.length; i++){
        if(arr[i]['id'] == id){
            return i;
        }
    }
}

function ucfirst(string){
    return string[0].toUpperCase() + string.slice(1);
}