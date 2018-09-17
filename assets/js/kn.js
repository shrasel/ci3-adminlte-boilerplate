    $(document).ready(function(){

      $('form .select2').select2();

      $('.js-search-customer-ajax').select2({
        ajax: {
          url: base_url+'customers/ajaxSearchCustomer',
          dataType: 'json',
          delay: 750,
          minimumInputLength: 3,
          placeholder: 'Search for a customer',
          data: function (params) {
            var query = {
              q: params.term
            }
            return query;
          },  
          processResults: function (data) {
            return {
              results: data
            };
          }
        }
      });

      $('.js-search-product-ajax').select2({
        ajax: {
          url: base_url+'products/ajaxSearchProduct',
          dataType: 'json',
          quietMillis: 2000,
          placeholder: 'Search for a product',
          minimumInputLength: 3,
          data: function (params) {
            var query = {
              q: params.term
            }
            return query;
          },  
          processResults: function (data) {
            return {
              results: data
            };
          }
        }
      });

    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      orientation: 'top',
      todayHighlight: true
    });

    $("#add_address").on("click",function(e){
      e.preventDefault();
      var content = $('.add_address_content').html();
      modal('Add Address',content,1);
    });
    $( ".add_product" ).on( "click", function(e) {     
      e.preventDefault();
      var content = '<span style="height:5px;display:block"></span><div class="col-sm-4"><input class="form-control" type="text" name="order_product[product_code][]" required placeholder="Product Code"></div><div class="col-sm-2"><input class="form-control" type="text" required="required" name="order_product[quantity][]" placeholder="Quantity" value="1" required></div><div class="col-sm-2"><input class="form-control" type="text" name="order_product[size][]" placeholder="Size/Color"></div><div class="col-sm-2"><input class="form-control product_price" type="text" name="order_product[price][]" placeholder="Price(TK)" required></div><div class="col-sm-2"><a class="btn btn-danger rm_product" href="#"> X </a></div>';
      $('.o_p').append("<div class='row product_row'>"+content+"</div>");
    });

    $("form").on('click','.rm_product',function(e){
      var result = confirm("Do you really want to delete this item?");
      if (result) {
        e.preventDefault();
        var that = this;
        if ($(that).attr('data-id')) {
          var order_item_id = $(that).data('id');
          $.ajax({
            url: base_url+"orders/remove_order_item",
            method: 'POST',
            data:{ id: order_item_id }
          }).done(function(result){
           if(result== 'success'){
            $(that).closest('.row').remove();
            calculateTotal();
          }
        });
        }else{
          $(that).closest('.row').remove();
          calculateTotal();
        }
      }
    });

    var selectValues = ['Rows','Columns'];
    
    $('#display_setting').change(function(){
      if($(this).val()==1){
        $("#restriction_type option").remove();
      }else{
        $.each(selectValues, function(key, value) {
          $('#restriction_type')
          .append($("<option></option>")
            .attr("value",value)
            .text(value));
        });
      }
    });

    $('#customer_id').change(function(){
      var customer_id = $(this).val();
      $.ajax({
        url: base_url+"customers/ajaxGetCustomer/"+customer_id, 
        dataType: 'json'
      }).done(function(result){
        var address = result.address;
        if(result.city!='')
          address = address + ', '+result.city;
        $("#shipping_address").val(address);
      });
    });

    var payment_method_val = $("select#payment_method option").filter(":selected").val();

    if(payment_method_val=='bKash') toggleBkashElement(1); else toggleBkashElement(0);

    $('#payment_method').change(function() {
        //Use $option (with the "$") to see that the variable is a jQuery object
        var option = $(this).val();
        if(option == 'bKash' ) 
          toggleBkashElement(1);
        else 
          toggleBkashElement(0);
        
      });

    $('form').on('keyup','.product_price, [name="order_product[quantity][]"]',function(e){
      calculateTotal();
    });

    $('form').on('keyup','#delivery_cost',function(e){
      calculateTotal();
    });

    $('table').on('click','.add-query',function(e){
      e.preventDefault();
      var notify = $.notify('<strong>Loading.....</strong>', {
        allow_dismiss: false,
        showProgressbar: true,
        placement: {
          align: 'center'
        }
      });
      $.ajax({
        url: base_url+'customers/ajaxGetCustomerQuery/'+query_id, 
        dataType: 'html'
      }).done(function(result){
        notify.close();
        modal('Update Customer Query',result,1);
            // console.log(result);
          });
    });

    $('table').on('click','.edit-query',function(e){
      e.preventDefault();
      var query_id = $(this).data('id');
      var notify = $.notify('<strong>Loading.....</strong>', {
        allow_dismiss: false,
        showProgressbar: true,
        placement: {
          align: 'center'
        }
      });
      $.ajax({
        url: base_url+'customers/ajaxGetCustomerQuery/'+query_id, 
        dataType: 'html'
      }).done(function(result){
        notify.close();
        modal('Update Customer Query',result,1);
            // console.log(result);
          });
    });

    $('#submit_form').on('click',function(e){
        // e.preventDefault();
        // do your own request an handle the results
        $.ajax({
          url: base_url+'customers/saveQuery',
          type: 'post',
          dataType: 'json',
          data: $("#customer_query_form").serialize(),

        }).done(function(result){
          if(result.status=='ok'){
            var query_id = result.id;
            modal('','',0);
            notify('Field Added/updated successfully',"success");
            $.get(base_url+'customers/ajaxGetQuery/'+query_id,function(data){
              $('#c_qry_id_'+query_id).html(data);
            });

          }
        }).fail(function (error) {
          console.log(error);
        });

      });


    $('.table tr[data-href]').each(function(){
      $(this).css('cursor','pointer').hover(
        function(){ 
          $(this).addClass('active'); 
        },  
        function(){ 
          $(this).removeClass('active'); 
        }).click( function(){ 
          document.location = $(this).attr('data-href'); 
        }
        );
      });

    function modal(title, body, action){
      if(action==1) action = 'show'; else action='hide';
      $('#kn_modal .modal-title').text(title);
      $('#kn_modal .modal-body').html(body);
      $('#kn_modal').modal(action);
    }

    function toggleBkashElement(val){
      if(val==1){
        $("#bkash_number").closest('.form-group').show();
        $("#bkash_payment_status").closest('.form-group').show();
      }else{
        $("#bkash_number").closest('.form-group').hide();
        $("#bkash_payment_status").closest('.form-group').hide();
      }
    }

    function calculateTotal(){

      var price = 0;
      $(".product_row").each(function(key,val){
        qty = $(val).find('[name="order_product[quantity][]"]').val();
        p_price = $(val).find('[name="order_product[price][]"]').val();

        var valid_qty = parseInt(qty);
        var valid_p_price = parseFloat(p_price);

        if(!isNaN(valid_qty) && !isNaN(valid_p_price)) 
          price += valid_qty*valid_p_price;
        
      });

      var delivery_cost = parseInt($("#delivery_cost").val());
      if(!isNaN(delivery_cost)) price=price+delivery_cost;
      $("#order_total_price").val(price);

    }

    $("#checkAll").click(function(){
      $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $("#table_name").change(function(){
      // console.log($(this).val());
      // 
      var form = $(this).closest('form');
      var id = $(form).find(':input[name="id"]').val();
      var table_name = $(this).val();
      $("#field_map").find('tbody').empty();
      var notify = $.notify('<strong>Loading.....</strong>', {
        allow_dismiss: false,
        showProgressbar: true,
        placement: {
          align: 'center'
        }
      });

      $.post(base_url+'rets/ajax_map_fields', 'table='+table_name+'&id='+id)
      .done(function( d ) {
        notify.close();
        $("#field_map").find('tbody').html(d);
      });
      
    });

    $("#field_map").on('click',"input:checkbox",function(){

      var form = $(this).closest('form');   
      var data = $(form).serialize();
      
      if($(this).is(":checked")) {

        var table_name = $(form).find(':input[name="table"]').val();
        
        $.post(base_url+'rets/update_field', data)
        .done(function( d ) {
          notify('Field Added/updated in '+table_name,"info");
        });

      }else{
        var table_name = $(form).find(':input[name="table"]').val();
        var id = $(form).find(':input[name="id"]').val();
        
        var tr = $(this).closest('tr');
        var field_name = $(tr).attr('id');

        $.post(base_url+'rets/delete_field', 'field_name='+field_name+'&table='+table_name+'&id='+id)
        .done(function( d ) {
          notify(field_name+' Field removed from '+table_name,"danger");
        });
      }
    });

  });

function notify(msg,class_name='success'){
  $.notify(msg, {
    type: class_name,
    animate: {
      enter: 'animated fadeInRight',
      exit: 'animated fadeOutRight'
    }
  });
}