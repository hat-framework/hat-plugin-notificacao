$(function(){
    function verifyNotifications(){
        $.ajax({
           url:getBaseURL() + 'notificacao/notifycount/load',
           type: 'GET',
           dataType: 'json',
           success: function(response) {
               for(var i in response){
                   if(response[i] < 0){continue;}
                   var temp = $('#a_'+i).children('.label_count');
                   if(temp.length === 0){
                       var txt = $('#a_'+i).html() + " <span class='label_count label label-success'>"+response[i]+"</span>";
                       $('#a_'+i).html(txt);
                   }else{
                       temp.html(response[i]);
                   }
               }
               setTimeout(verifyNotifications, 60000);
           }
       });
    }
    verifyNotifications();
});