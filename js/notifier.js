$(function(){
    function applyResponse(response){
        var labels = {a:'label-info',c:'label-success',i:'label-warning'};
        for(var i in response){
            for(var j in response[i]){
                if(response[i][j] <= 0){continue;}
                var label = (typeof labels[j] === 'undefined')?'label-success':labels[j];
                var temp = $('#a_'+i).children('.'+label);
                if(temp.length === 0){
                    var txt = $('#a_'+i).html() + " <span class='badge "+label+"'>"+response[i][j]+"</span>";
                    $('#a_'+i).html(txt);
                }else{temp.html(response[i][j]);}
            }

       }
    }
    
    function verifyNotifications(){
        $.ajax({
            url:getBaseURL() + 'notificacao/notifycount/load',
            type: 'GET',
            dataType: 'json',
            success: applyResponse
       });
    }
    verifyNotifications();
});