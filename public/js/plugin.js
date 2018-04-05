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
});