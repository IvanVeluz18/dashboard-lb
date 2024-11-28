function postform($form){
 $frm = $($form);
 $btn = $($form).find("[type='submit']");

 $label = $btn.html();
 
 $btn.html('<i class="spinner-border spinner-border-sm"></i>').attr('disabled','disabled');

 $.post($frm.attr('action'), $frm.serialize(), ($resp)=>{
  $json = parseJson($resp);
  switch($json.type){
   case "msg": msgbox($json.data); $btn.removeAttr('disabled').html($label); break;
   case "url": location=$json.data; break;
   case "modalpage": modalpage($json.data); break;
  }
 });

 return false;
}

function parseJson($data){
 try {
  return JSON.parse($data);
 } catch(e) {
  return [];
 }
}

function msgbox($msg){
 $('#modalpage').modal('hide');
 $('#msgbox').modal('show');
 $('.msgbody').html($msg);
}

function confirmbox($msg, $callback){
 $('#confirmbox').modal('show');
 $('.confirmbody').html($msg);
 $('.confirmOK').off('click');
 $('.confirmOK').click($callback);
}

function modalpage($url, size = 'lg'){
 $('.modalpagebody').html("<div class='text-center p-5'><div class='m-5 spinner-border'></div></div>");
 $('.modal-dialog').removeClass('modal-sm').removeClass('modal-md').removeClass('modal-lg').addClass('modal-'+size);
 $('#modalpage').modal('show');
 $.get($url, function($html){
  $('.modalpagebody').html($html);
 });
}


var btnLabel;
function loading(btn, load = 1){
 if (load == 1){
  btnLabel = $(btn).html();
  $(btn).html('<div class="spinner-border spinner-border-sm"></div>').attr('disabled',1);
 } else {
  $(btn).html(btnLabel).removeAttr('disabled');
 }
}


function addCommas(box) {
 $(box).attr('type','text');
 nStr = $(box).val();
 if (nStr == '') return;
 nStr += '';
 var x = nStr.split('.');
 var x1 = x[0];
 var x2 = x.length > 1 ? ('.' + x[1] + '0').substr(0,3) : '.00';
 var rgx = /(\d+)(\d{3})/;
 while (rgx.test(x1)) {
  x1 = x1.replace(rgx, '$1' + ',' + '$2');
 }
 $(box).val(x1 + x2);
}

function removeCommas(box) {
 nStr = $(box).val();
 nStr = nStr.replace(/,/g , '');
 $(box).val(nStr);
 $(box).attr('type','number');
}