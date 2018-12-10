$(function() {
     $.RenderTournament = function (divClass,config) {
         this.container;
         this.ajaxGet;
         this.ajaxPost;
         this.data;
         
         this.getData = function(){
            var self = this;
            $.ajax({
                url: self.ajaxGet,
                method: 'GET',
                success: function (response, textStatus, xhr) {
                    self.renderBracket(response);
                },
                error: function (xhr, textStatus, error) {
                    console.log(JSON.parse(xhr.responseText) );
                }
             });
            
        };

        this.renderBracket = function (data) {
            var self = this;
            self.data = data;
            
            self.container.bracket({
                init: self.data,
//                save: function(){}, /* without save() labels are disabled */
//                disableToolbar: false,
//                disableTeamEdit: true,
              });
            
        };
        
        
        
        this.saveData = function(updatedData,userData){
            console.log(updatedData);
//            $.ajax({
//                url: userData.ajaxPost,
//                method: 'POST',
//                data:updatedData,
//                beforeSend: function(request) {
//                    request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
//                },
//                success: function (response, textStatus, xhr) {
//                    console.log(response);
//                },
//                error: function (xhr, textStatus, error) {
//                    console.log(JSON.parse(xhr.responseText) );
//                }
//             });
        };

        this.init = function () {
            if (typeof divClass !== 'undefined' && typeof config !== 'undefined') {
                this.container = $('.'+divClass);
                this.ajaxGet = config.ajaxGet;
                this.getData();
            }
        };

    };
    
    var tournament = new $.RenderTournament('tournament',config);
    tournament.init();
    
  });