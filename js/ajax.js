
function divLoad(div_id){
    $(div_id).load('/template/'+div_id.replace('#',''), {}, function(){
        divShow(div_id);
    });
}

function ajaxAction(action_name, path, obj){
    var params = {};
    if(obj){
        var arr = $(obj).serializeArray();
        for(var i=0; i<arr.length; i++){
            params[arr[i].name] = arr[i].value;
        }
    }
    $.post(path, params, 
            function(data){
//                var first_later = action_name[0].toUpperCase();
//                action_name = first_later + action_name.slice(1);
                var action = 'action'+ucfirst(action_name);
                new Function(action+'(\''+data+'\')')();
            }); 
}