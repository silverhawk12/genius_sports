$( function() {
    
        window.excluded = [];
        
       $(".team-select").on("change",function(e){
           var self = $(this);
          window.excluded.push(self.val());
          var token = $("input[name='_token']").val();
            
           var selfId = self.attr('id');
           var nextSelectId;
           if (selfId.match("-team_a$")) {
                   nextSelectId = selfId.substr(0, selfId.indexOf('-'));
                   nextSelectId = nextSelectId+'-team_b';
                   
            }
            
            if (selfId.match("-team_b$")) {
                   nextSelectId = selfId.substr(0, selfId.indexOf('-'));
                   var rowNum = parseInt(nextSelectId,10);
                   nextSelectId = (++rowNum)+'-team_a';
            }
           
          $.ajax({
                url: "/ajax/teams",
                method: 'POST',
                data: {excluded:window.excluded, _token:token},
                success: function (response, textStatus, xhr) {
                    $('#' + nextSelectId).html(selectOptions(response));
                    self.attr("disabled", "disabled");  
                },
                error: function (xhr, textStatus, error) {
                    console.log(JSON.parse(xhr.responseText) );
                }
         });
          
      
       });
       
        $('#addTeams').bind('submit', function () {
          $(this).find(':input').prop('disabled', false);
        });
       
       
       function selectOptions(data){
           var options = '<option value="">--chose-team--</option>';
           $.each(data, function( index,value ) {
               options+= '<option value="'+value.id+'">'+value.name+'</option>';
            });
            return options;
       }
       
});