$('document').ready(function(){
$('.carousel').carousel();
/*Dealing with images */
 $('#postimg').click(function()
    {
        $img = document.createElement('input');
        $img.setAttribute('type', 'file');
        $img.setAttribute('name','imgFiles[]');
        $img.setAttribute('accept','image/*');
        $img.setAttribute('class','imgfiles hidden');
        $div = document.createElement("div");
        $contdiv = document.createElement("div");
        $contdiv.setAttribute('class','responsive');
        $div.setAttribute('class','gallery');
        $img.addEventListener("change",function(){
        readURLImage(this ,$div); 
        });
          $div.append($img);
          $contdiv.append($div);
          $('#postreview').append($contdiv);
        $('.imgfiles').last().trigger('click');
        

    });
 /*End Images*/
 /*Dealing with videos*/
  $('#postvideo').click(function () 
    {
        $vid = document.createElement('input');
        $vid.setAttribute('type', 'file');
        $vid.setAttribute('name','vidFiles[]');
        $vid.setAttribute('accept','video/*');
        $vid.setAttribute('class','vidfiles');
        $vid.addEventListener("change",function(){
             readURLVideo(this,$('#postreview')); 
        });
       
        $('#paths').append($vid);
        $('.vidfiles').last().trigger('click');
    });
 /*End dealing with videos*/

/*deleteimg*/


 /*helper functions*/
 /**Read Image and display it in the page**/
   function readURLImage(input , $container) 
    {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $img =document.createElement("img");
          $img.setAttribute('name','images[]');
          $img.setAttribute('src', e.target.result);
          $container.append($img);
            $desc = document.createElement("div");
        $desc.setAttribute('class','desc');
        $deletebtn = document.createElement("button");
        $deletebtn.setAttribute('class','btn btn-danger btn-xs delimg');
        $deletebtn.setAttribute('type','button');
        $deletebtn.addEventListener('click',function () {
          $(this).parent().parent().parent().remove();
        });
        $deletebtn.innerHTML='delete';
        $desc.append($deletebtn);
        $container.append($desc);
        };
        reader.readAsDataURL(input.files[0]);
    };
  };
  /**End Function**/
  /**Read Image and display it in the page**/
  function readURLVideo(input,$container) 
    {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $vid =document.createElement("video");
          $source = document.createElement('source');
          $vid.setAttribute('name','videos[]');
          $vid.setAttribute('controls','true');
          $source.setAttribute('src', e.target.result);
          $vid.append($source);
          $div = document.createElement("div");
          $div.setAttribute('class','col col-md-4 col-lg-4 col-sm-6 col-xs-6 elePost');
          $div.append($vid);
        $container.append($div);
        $container.css('display','inline-block');
        };

        reader.readAsDataURL(input.files[0]);
    }  
  };
/*******Slide chat box*******/
$('#live-chat header').on('click', function() {

    $('.chat').slideToggle(300, 'swing');
    $('.chat-message-counter').fadeToggle(300, 'swing');

  });

  $('.chat-close').on('click', function(e) {

    e.preventDefault();
    $('#live-chat').fadeOut(300);

  });

/*messsage area button click*/
$('.postimg').click(function()
    {
        $img = document.createElement('input');
        $img.setAttribute('type', 'file');
        $img.setAttribute('name','imgFiles[]');
        $img.setAttribute('accept','image/*');
        $img.setAttribute('class','imgfiles hidden');
        $div = document.createElement("div");
        $contdiv = document.createElement("div");
        $contdiv.setAttribute('class','responsive');
        $div.setAttribute('class','gallery');
        $img.addEventListener("change",function(){
        readURLImage(this ,$div); 
        });
          $div.append($img);
          $contdiv.append($div);
        $(this).parent().find('.postreview').append($contdiv);
        $(this).parent().find('.imgfiles').last().trigger('click');
    });
  /*
  create new chat
  */
  /*end*/
    $( '#newchatForm').on( 'submit', function() {
 
        //.....
        //show some spinner etc to indicate operation in progress
        //.....
 
        $.post(
            $( this ).prop( 'action' ),
            {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "productID": $('#proid').val()
            },
            function( data ) {
              //
              //When success do 
              //
              var chat = data['chat'];

               if(chat==null){
                     $('.chat').slideToggle(300, 'swing');
                     $('.chat-message-counter').fadeToggle(300, 'swing');
               }else{
                var messages = chat['messages'];
                    var html = [
                                '<div id="live-chat">',    
                                    '<header class="clearfix">',
                                          '<a href="#" class="chat-close">x</a>',
                                      '<h4>{{$product->user->name}}</h4>',
                                      '<span class="chat-message-counter">3</span>',
                                    '</header>',
                                    '<div class="chat">',
                                      '<div class="chat-history">'
                                  ];
        $.each(chat.messages,function(key,value ){
                    html.push([ 
                                '<div class="chat-message clearfix">',      
                                '<img src="'+value.sender.image+'" alt="" width="32" height="32">',
                                '<div class="chat-message-content clearfix">',        
                                  '<span class="chat-time">'+value.created_at+'</span>',
                                  '<h5>'+value.sender.name+'</h5>',
                                  '<p>'+value.body+'</p>',
                               ]);
          $.each(value.smsimages,function(key,img){
                    html.push([
                                '<div class="smsImageCont">',
                                    '<img src="/storage/images/"'+img.path+'>',
                                 '</div>'
                              ]);
          });

        html.push([
                 '</div>',
                      '</div>',
                       '<hr>',
                    '</div>'
                ]);
 });

        html.push([
         '<form action="#" method="post" class="sendmessage">',
                  '<fieldset>',   
                    '<input type="text" placeholder="Type your message…" autofocus>',
                    '<input type="hidden" name="chatID" value="'+chat.id+'">',
                  '</fieldset>',
                '</form>',
              '</div>',
            '</div>',
                    ]);
          var chathtml = html.join("\n");
          $('#chatsCont').append(chathtml);
      }
            },
            'json'
        );
 
        //.....
        //do anything else you might want to do
        //.....
 
        //prevent the form from actually submitting in browser
        return false;
    });
    /*End Create or appear exist chat*/
    /*Send message*/
    /* $('.sendmessage').on( 'submit', function(e) {
     e.preventDefault();
       var formData = new FormData($(this).parents('form')[0]);
      formData.append('chatID',$(this).children('.chatID').first().val());
      formData.append('_token',$(this).find('input[name=_token]').first().val());
      formData.append('smsBody',$(this).children('.smsBody').first().val());
     $.post(
            $( this ).prop( 'action' ),
            data:formData,
            function( data ) {
              //
                var message = data['message'];
              var sender = data['sender'];
              var chat = data['chat'];
             var sms=[
              '<div class="chat-message clearfix">',      
                 '<img src="'+sender.image+'" alt="" width="32" height="32">',
                  '<div class="chat-message-content clearfix">',         
            '<span class="chat-time">'+message.created_at+'</span>',
            '<h5>'+sender.name+'</h5>',
             '<p>'+message.body+'</p>',
          '</div>',
        '</div>',
         '<hr>'
         ];
           var htmlsms = sms.join("\n");
          $('#'+chat+'text').append(htmlsms);
              console.log(chat);
            },
            'json',
        );
      
    /*End send message*/
/*});*/
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
            });
$('.chat').on('click', '.sendbtn', function(e)
    {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
            });
      var proID = $('#proid').val();
     e.preventDefault();
     var formData = new FormData($(this).parents('form')[0]);
     $.ajax({
        url   : '/addmessage/'+proID,
        type  : 'POST',
        xhr   : function() 
            {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
            },
        success: function (data) {                 
        var message = data['message'];
           var sender  = data['sender'];
           var chat    = data['chat'];
           var smsimages=data['smsimages'];
           console.log(message);
           console.log(message['created_at']);
            var sms=[
              '<div class="chat-message clearfix">',      
                 '<img src="'+sender.image+'" alt="" width="32" height="32">',
                  '<div class="chat-message-content clearfix">',         
            '<span class="chat-time">'+message.created_at+'</span>',
            '<h5>'+sender.name+'</h5>',
             '<p>'+message.body+'</p>'];
              $.each(smsimages, function(key,value)
                  {
                    console.log(value['path']);

sms.push([
                    '<div class="row">'+'<a href="/storage/images/'+value['path']+'" target="#">'+'<img src="/storage/images/'+value['path']+'">'+'</a>'+'</div>'
                      ]);
                  });
 sms.push([
                    '</div></div><hr>'
                ]);  
 console.log($(this).attr('class'));
    
         var htmlsms = sms.join("\n");
          $('#'+chat['id']+'text').append(htmlsms);
          $('#'+chat['id']+'text').parents('.chat').find('.postreview').empty();
          $('#'+chat['id']+'text').parents('.chat').find('input[name=smsBody]').val('');
              },
              data       : formData,
              cache      : false,
              contentType: false,
              processData: false
          });// end ajax function
        return false;
  });//end inserting message
});

