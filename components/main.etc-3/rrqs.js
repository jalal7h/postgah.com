
// rrqs : Round Ring Query String
// a: active, p: passive

jQuery(document).ready(function($) {
  
  $('[rrqs="a"]').not('input[type="text"]').on('change', function(){
      
      the_url = _URL + "/?page=" + _PAGE;
      if( typeof ccf_main_cat_id !== 'undefined' && ccf_main_cat_id ){
        the_url+= '&cat_id=' + ccf_main_cat_id; // what the hell is this!
      }

      $('[rrqs]').each(function(i){

        each_elem_name = $(this).attr('name');

        if( $(this).attr('type') == 'checkbox' ){
          each_elem_value = $(this).prop("checked") ? 1 : 0;

        } else {
          each_elem_value = $(this).val().trim();
        }

        if( each_elem_value ){
          the_url = the_url + '&' + each_elem_name + '=' + each_elem_value;
        }
        
      });

      location.href = the_url;

    });

});


