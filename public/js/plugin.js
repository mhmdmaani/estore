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
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
              });
    $( '#newchatbtn').on( 'click', function(e){

      e.preventDefault();
      var token =$('meta[name="csrf-token"]').attr('content');
      var formData = new FormData($(this).parents('form')[0]);
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      $.ajax({
         url   : '/newchat',
         type  : 'POST',
         xhr   : function()
             {
             var myXhr = $.ajaxSettings.xhr();
             return myXhr;
             },
         success: function (data) {
           var chat = data['chat'];
           var sender = data['sender'];
           var product = data['product'];
            if(chat==null){
                  $('.chat').slideToggle(300, 'swing');
                  $('.chat-message-counter').fadeToggle(300, 'swing');
                  console.log('chat=null')
            }else{
                console.log('chat!=null')
                var messages = chat['messages'];

                 var chhtml = [
                             '<div id="live-chat">',
                                 '<header class="clearfix">',
                                       '<a href="#" class="chat-close">x</a>',
                                   '<h4>'+sender.name+'</h4>',
                                   '<span class="chat-message-counter">3</span>',
                                 '</header>',
                                 '<div class="chat" id="'+chat.id+'">',
                                   '<div class="chat-history">'
                               ];
           $.each(chat.messages,function(key,value ){
                 chhtml.push([
                             '<div class="chat-message clearfix">',
                             '<img src="'+value.sender.image+'" alt="" width="32" height="32">',
                             '<div class="chat-message-content clearfix">',
                               '<span class="chat-time">'+value.created_at+'</span>',
                               '<h5>'+value.sender.name+'</h5>',
                               '<p>'+value.body+'</p>',
                            ]);
           $.each(value.smsimages,function(key,img){
                 chhtml.push([
                             '<div class="smsImageCont">',
                                 '<img src="/storage/images/"'+img.path+'>',
                              '</div>'
                           ]);
           });

           chhtml.push([
              '</div>',
                   '</div>',
                    '<hr>',
                 '</div>',
               '</div>',
             '</div>',
             ]);
           });
           $chathtml = chhtml.join("\n");
           $("#chatsCont").append($chathtml);
            $sendform = $('#sendtemplate').find('form');
            console.log($sendform.attr('action'));
           $sendform.children('input[name=chatID]').val(chat.id);
           $sendform.children('input[name=senderID]').val(sender.id);
           $sendform.children('input[name=id]').val(product.id);
        $('#'+chat.id).append($sendform);
        $imagebtn = $('#sendtemplate').find('.postimg');
          $('#'+chat.id).append($imagebtn);
           }
    },
    data       : formData,
    cache      : false,
    contentType: false,
    processData: false
  });
});
        //.....
        //show some spinner etc to indicate operation in progress
        //.....

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
            });
$('.sendbtn').click(function(e)
    {
       e.preventDefault();
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
            });
      var proID = $('#proid').val();
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
        //   console.log(message);
          // console.log(message['created_at']);
            var sms=[
              '<input type="hidden" name="smsID" value="'+message.id+'">',
              '<div class="chat-message clearfix">',
                 '<img src="'+sender.image+'" alt="" width="32" height="32">',
                  '<div class="chat-message-content clearfix">',
            '<span class="chat-time">'+message.created_at+'</span>',
            '<h5>'+sender.name+'</h5>',
             '<p>'+message.body+'</p>'];
              $.each(smsimages, function(key,value)
                  {
                //    console.log(value['path']);

sms.push([
                    '<div class="row">'+'<a href="/storage/images/'+value['path']+'" target="#">'+'<img src="/storage/images/'+value['path']+'">'+'</a>'+'</div>'
                      ]);
                  });
 sms.push([
                    '</div></div><hr>'
                ]);

         var htmlsms = sms.join("\n");
          $('#'+chat.id).find('.chat-history').append(htmlsms);
          $('#'+chat.id).find('.chat-history').animate({ scrollTop:   $('#'+chat.id).find('.chat-history').prop("scrollHeight")}, 1000);
          $('#'+chat.id).find('.postreview').empty();
          $('#'+chat.id).find('input[name=smsBody]').val('');
              },
              data       : formData,
              cache      : false,
              contentType: false,
              processData: false
          });// end ajax function
        return false;
  });//end inserting message
/*Retrive latest sms*/

/*End retrive sms*/
/*start edit user image*/
$('.userImgCont img').click(function(){
  console.log('hej this is image');
  $('#fileInput').trigger('click');
});
$('#fileInput').change(function(){
    $div = $('.userImgCont');
    changeImg(this ,$div);
    });
/*change image*/
function changeImg(input , $container)
{
if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $img =("#userImg");
      console.log($img);
      $('#userImg').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
};
};
$('.addFav').click(function(e){
  e.preventDefault();
  var proID = $(this).prev().val();
  console.log(proID);
  var formData = new FormData($(this).parents('form')[0]);
  $.ajax({
     url   : '/addtowish/'+proID,
     type  : 'POST',
     xhr   : function()
         {
         var myXhr = $.ajaxSettings.xhr();
         return myXhr;
         },
     success: function (data) {
       if(data['state']=="add"){
         $inpt  = $('input[value='+proID+']');
         $inpt.next().children('.fa-star').attr('class','fa fa-check');
          $inpt.next().children('.btntxt').text('saved');
       }else{
         $inpt  = $('input[value='+proID+']');
         $inpt.next().children('.fa-check').attr('class','fa fa-star');
          $inpt.next().children('.btntxt').text('add to favorite');
       }
    }
  });
  });
/* Call siller*/
$("#callSiller").click(function(){
  $('.telCont').fadeIn(500);
   $('.overlay').fadeIn(500);
});
$("#mailSeller").click(function(){
  $('.mailCont').fadeIn(500);
   $('.overlay').fadeIn(500);
});
$("#reportbtn").click(function(){
  $('.reportCont').fadeIn(500);
   $('.overlay').fadeIn(500);
});
$("#mailClose").click(function(){
  $('.mailCont').fadeOut(500);
   $('.overlay').fadeOut(500);
});
$("#telClose").click(function(){
  $('.telCont').fadeOut(500);
   $('.overlay').fadeOut(500);
});
$("#reportclose").click(function(){
  $('.reportCont').fadeOut(500);
   $('.overlay').fadeOut(500);
});
/*sending report ajax*/
$('#sendreport').click(function(e){
  e.preventDefault();
  var formData = new FormData($(this).parents('form')[0]);
  $.ajax({
     url   : '/sendreport',
     type  : 'POST',
     xhr   : function()
         {
         var myXhr = $.ajaxSettings.xhr();
         return myXhr;
         },
     success: function (data) {
       $report = data['report'];
       if($report!=null){
         $('#success div').append("<div class='alert alert-success' style='font-size:18px'>Thank you we well check this item!!</div>");
         $('.reportCont').fadeOut(500);
          $('.overlay').fadeOut(500);
          $('#success').fadeIn(500);
       }else{
         $('#success h3').append("<div class='alert alert-success'>Sorry we can not recive your</div>");
         $('#success').fadeIn(500)
       }
    },
    data       : formData,
    cache      : false,
    contentType: false,
    processData: false
  });
  });
/*End sending report ajax*/
/*sending report ajax*/
$('#sendmail').click(function(e){
  e.preventDefault();
  var formData = new FormData($(this).parents('form')[0]);
  $.ajax({
     url   : '/sendmail',
     type  : 'POST',
     xhr   : function()
         {
         var myXhr = $.ajaxSettings.xhr();
         return myXhr;
         },
     success: function (data) {
       if(data['state'=='sent']){
    console.log('great');
       }else{
         console.log('not good');
       }
    },
    data       : formData,
    cache      : false,
    contentType: false,
    processData: false
  });
  });
  /*check new messages*/
  setInterval(function(){
  latestsms();
}, 1000);
  /*end check new Messages*/
/*End sending report ajax*/
$('#success button').click(function(){
  $('#success').fadeOut(500);
});

/*Helper functions*/
function latestsms(){
  var proID = $("#proid").val();
   // console.log(proID);
    $.ajax({
     url   :'/latestsms/'+proID,
     type  : 'POST',
     data  :{
       '_token': '{{csrf_token()}}',
       'productID': proID
     },
     success:function(data){
       var chats = data.chats;
       $.each(chats, function(key,chat){
     var lastsmsID =   $('#'+chat.id+'text').find($('input[name=smsID]')).last().val();
       //  console.log(lastsmsID);
         $.each(chat.messages, function(key,message)
         {
           if(message.id>lastsmsID){
             var x = document.getElementById("smssound");
                x.play();
             var sms=[
               '<input type="hidden" name="smsID" value="'+message.id+'">',
               '<div class="chat-message clearfix">',
                  '<img src="'+message.sender.image+'" alt="" width="32" height="32">',
                   '<div class="chat-message-content clearfix">',
             '<span class="chat-time">'+message.created_at+'</span>',
             '<h5>'+message.sender.name+'</h5>',
              '<p>'+message.body+'</p>'];
               $.each(message.smsimages, function(key,value)
                   {
                   //  console.log(value['path']);

 sms.push([
                     '<div class="row">'+'<a href="/storage/images/'+value['path']+'" target="#">'+'<img src="/storage/images/'+value['path']+'">'+'</a>'+'</div>'
                       ]);
                   });
  sms.push([
                     '</div></div><hr>'
                 ]);
 // console.log($(this).attr('class'));

          var htmlsms = sms.join("\n");
             $('#'+chat.id+'text').append(htmlsms);

           }

       });
       });
     },
             cache      : false,
             contentType: false,
             processData: false
    });
};
});
