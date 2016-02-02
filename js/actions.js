
function actionRegistration(data){
    data = JSON.parse(data);
    
//    var msg = data['msg'];
//    var res = +data['ok'];
    
//    var msg_html = '';
//    for(var i=0; i<msg.length; i++){
//        msg_html += msg[i]+'<br/>';
//    }
    
    if(+data['ok']){
        $('#form_reg input').not("[type=submit]").each(function(){
           $(this).val('');
        });
        divShow('#div_login');
//        $('#div_login .msg').html(msg_html);
        msgShow('#div_login .msg', data['msg']);
    }else{
        $('#form_reg [type=password]').each(function(){
           $(this).val(''); 
        });
//        $('#div_reg .msg').html(msg_html);
        msgShow('#div_reg .msg', data['msg'], 10000);
    }
}

function actionLogin(data){
    data = JSON.parse(data);
    
//    var msg = data['msg'];
//    var res = +data['ok'];
    
//    var msg_html = '';
//    for(var i=0; i<msg.length; i++){
//        msg_html += msg[i]+'<br/>';
//    }
    
    if(+data['ok']){
        $('#form_login input').not("[type=submit]").each(function(){
           $(this).val('');
        });
    }else{
        $('#form_login [type=password]').each(function(){
           $(this).val(''); 
        });
    }
//    $('#div_login .msg').html(msg_html);
    msgShow('#div_login .msg', data['msg']);
}