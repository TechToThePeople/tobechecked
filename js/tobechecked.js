cj(document).ready(function($){
  $("#actions").append('<li><a href="#" id="tobechecked" class="button" title="If the contact details need to be updated"><span>To be checked</span></a></li>');
   $("#tobechecked").click(function(){
     $().crmAPI ('entity_tag','create',{
                  tag_id       : tag_id
                 ,entity_table : 'civicrm_contact'
                 ,entity_id    : contact_id
                 },{
                 success:function (){
                   $("#tobecheked").fadeOut('slow');
                 }
                 });
     return false;
   });

});
