$('document').ready(function(){
/*initial BarCode Library*/
JsBarcode(".barcode").init();
var memberID = $('#barcode').text();
JsBarcode("#barcodeimg",memberID,{
  width: 4,
} );

$("#print").click(function(){
     $("#card").print();
});

/*Dealing with images */
 $('#postimg').click(function()
    {
        $img = document.createElement('input');
        $img.setAttribute('type', 'file');
        $img.setAttribute('name','imgFiles[]');
        $img.setAttribute('accept','image/*');
        $img.setAttribute('class','imgfiles');
        $img.addEventListener("change",function(){
        readURLImage(this ,$('#postreview')); 
        });
        $('#paths').append($img);
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
          $div = document.createElement("div");
          $div.setAttribute('class','col col-md-4 col-lg-4 col-sm-6 col-xs-6 elePost');
          $div.append($img);
          $container.append($div);
          $container.css('display','inline-block');
        };
        reader.readAsDataURL(input.files[0]);
    }
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
  /**End Function**/
  /*Display image when hovered*/
  $('.FileBox').hover(function (){
   $this.children('.backimg').FadeIn();
   console.log("over");
  });
  /*Branch */
  $('#logoPathTrigger').click(function(){
   $('#logoPathInput').trigger('click');
  });

  $('#logoPathInput').change(function(){
  if ($('#logoReview').has($('img'))){
    $('#logoReview').empty();
  }
  readURLImage(this,$('#logoReview'));
  
  });
  /*activity times */
  $('#dayCont').children('button').click(function(e){
    e.preventDefault();
   var txt =$(this).text();
   $("#daytxt").val( txt );
  });
});