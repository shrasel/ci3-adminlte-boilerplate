var customization_errors = false;

$('#search-product-ajax').typeWatch({
  captureLength: 3,
  highlight: true,
  wait: 750,
  callback: function(){ searchProducts(); }
});


function searchProducts()
  {
    customization_errors = false;
    var prod = $('#search-product-ajax').val();

    $('#products_part').show();
    $.ajax({
      type:"POST",
      url: base_url+'products/ajaxSearchProduct',
      async: true,
      dataType: "json",
      data:{ q: prod },
      success : function(res)
      {
        console.log(res);
        var products_found = '';
        var attributes_html = '';
        var customization_html = '';
        stock = {};

        if(res.found)
        {
          if (!customization_errors)
            $('#products_err').addClass('hide');
          else
            customization_errors = false;
          $('#products_found').removeClass('hide').show();
          products_found += '<label class="control-label col-lg-4">Product</label><div class="col-lg-8"><select class="form-control" id="id_product" onchange="display_product_attributes();display_product_customizations();"></div>';
          attributes_html += '<label class="control-label col-lg-4">Combination</label><div class="col-lg-8">';
          $.each(res.products, function() {
            products_found += '<option '+(this.combinations.length > 0 ? 'rel="'+this.qty_in_stock+'"' : '')+' value="'+this.id_product+'">'+this.name+(this.combinations.length == 0 ? ' - '+this.price_final : '')+'</option>';
            attributes_html += '<select class="form-control id_product_attribute" id="ipa_'+this.id_product+'" style="display:none;">';
            var id_product = this.id_product;
            stock[id_product] = new Array();
            if (this.customizable == '1' || this.customizable == '2')
            {
              customization_html += '<div class="bootstrap"><div class="panel"><div class="panel-heading">Customization</div><form id="customization_'+id_product+'" class="id_customization" method="post" enctype="multipart/form-data" action="'+admin_cart_link+'" style="display:none;">';
              customization_html += '<input type="hidden" name="id_product" value="'+id_product+'" />';
              customization_html += '<input type="hidden" name="id_cart" value="'+id_cart+'" />';
              customization_html += '<input type="hidden" name="action" value="updateCustomizationFields" />';
              customization_html += '<input type="hidden" name="id_customer" value="'+id_customer+'" />';
              customization_html += '<input type="hidden" name="ajax" value="1" />';
              $.each(this.customization_fields, function() {
                class_customization_field = "";
                if (this.required == 1){ class_customization_field = 'required' };
                customization_html += '<div class="form-group"><label class="control-label col-lg-3 ' + class_customization_field + '" for="customization_'+id_product+'_'+this.id_customization_field+'">';
                customization_html += this.name+'</label><div class="col-lg-9">';
                if (this.type == 0)
                  customization_html += '<input class="form-control customization_field" type="file" name="customization_'+id_product+'_'+this.id_customization_field+'" id="customization_'+id_product+'_'+this.id_customization_field+'">';
                else if (this.type == 1)
                  customization_html += '<input class="form-control customization_field" type="text" name="customization_'+id_product+'_'+this.id_customization_field+'" id="customization_'+id_product+'_'+this.id_customization_field+'">';
                customization_html += '</div></div>';
              });
              customization_html += '</form></div></div>';
            }

            $.each(this.combinations, function() {
              attributes_html += '<option rel="'+this.qty_in_stock+'" '+(this.default_on == 1 ? 'selected="selected"' : '')+' value="'+this.id_product_attribute+'">'+this.attributes+' - '+this.formatted_price+'</option>';
              stock[id_product][this.id_product_attribute] = this.qty_in_stock;
            });

            stock[this.id_product][0] = this.stock[0];
            attributes_html += '</select>';
          });
          products_found += '</select></div>';
          $('#products_found #product_list').html(products_found);
          $('#products_found #attributes_list').html(attributes_html);
          $('link[rel="stylesheet"]').each(function (i, element) {
            sheet = $(element).clone();
            $('#products_found #customization_list').contents().find('head').append(sheet);
          });
          $('#products_found #customization_list').contents().find('body').html(customization_html);
          display_product_attributes();
          display_product_customizations();
          $('#id_product').change();
        }
        else
        {
          $('#products_found').hide();
          $('#products_err').html('No products found');
          $('#products_err').removeClass('hide');
        }
      }
    });
  }

  $('#submitAddProduct').on('click',function(){
      addProduct();
  });

  $('#products_found').on('keydown','#id_product', function(e) {
      $(this).click();
      return true;
  });
  
  $('#products_found').on('change','#id_product, .id_product_attribute', function(e) {
      e.preventDefault();
      displayQtyInStock(this.id);
  });
  
  $('#products_found').on('keydown','#id_product, .id_product_attribute', function(e) {
    $(this).change();
      return true;
  });

  function display_product_customizations()
  {
    if ($('#products_found #customization_list').contents().find('#customization_'+$('#id_product option:selected').val()).children().length === 0)
      $('#customization_list').hide();
    else
    {
      $('#customization_list').show();
      $('#products_found #customization_list').contents().find('.id_customization').hide();
      $('#products_found #customization_list').contents().find('#customization_'+$('#id_product option:selected').val()).show();
      $('#products_found #customization_list').css('height',$('#products_found #customization_list').contents().find('#customization_'+$('#id_product option:selected').val()).height()+95+'px');
    }
  }

  function display_product_attributes()
  {
    if ($('#ipa_'+$('#id_product option:selected').val()+' option').length === 0)
      $('#attributes_list').hide();
    else
    {
      $('#attributes_list').show();
      $('.id_product_attribute').hide();
      $('#ipa_'+$('#id_product option:selected').val()).show();
    }
  }

  function addProduct()
  {
    var id_product = $('#id_product option:selected').val();
    $('#products_found #customization_list').contents().find('#customization_'+id_product).submit();

    addProductProcess();
  }

  //Called from form_customization_feedback.tpl
  function customizationProductListener()
  {
    //refresh form customization
    searchProducts();

  }

  function addProductProcess()
  {
    if (customization_errors) {
      $('#products_err').removeClass('hide');
    } else {
      $('#products_err').addClass('hide');
      product_id = $('#id_product').val();
      attribute_id = $('#ipa_'+$('#id_product').val()+' option:selected').val();
      qty = $('#qty').val();

      console.log('PID: '+ product_id);
      console.log('attribute_id: '+ attribute_id);
      console.log('qty: '+ qty);
    }
  }

  function updateCartProducts(products, gifts, id_address_delivery)
  {
    
    var cart_content = '';
    
    $.each(products, function() {
      var id_product = Number(this.id_product);
      var id_product_attribute = Number(this.id_product_attribute);
      cart_quantity[Number(this.id_product)+'_'+Number(this.id_product_attribute)+'_'+Number(this.id_customization)] = this.cart_quantity;
      cart_content += '<tr><td><img src="'+this.image_link+'" title="'+this.name+'" /></td><td>'+this.name+'<br />'+this.attributes_small+'</td><td>'+this.reference+'</td><td><input type="text" rel="'+this.id_product+'_'+this.id_product_attribute+'" class="product_unit_price" value="' + this.numeric_price + '" /></td><td>';
      cart_content += (!this.id_customization ? '<div class="input-group fixed-width-md"><div class="input-group-btn"><a href="#" class="btn btn-default increaseqty_product" rel="'+this.id_product+'_'+this.id_product_attribute+'_'+(this.id_customization ? this.id_customization : 0)+'" ><i class="icon-caret-up"></i></a><a href="#" class="btn btn-default decreaseqty_product" rel="'+this.id_product+'_'+this.id_product_attribute+'_'+(this.id_customization ? this.id_customization : 0)+'"><i class="icon-caret-down"></i></a></div>' : '');
      cart_content += (!this.id_customization ? '<input type="text" rel="'+this.id_product+'_'+this.id_product_attribute+'_'+(this.id_customization ? this.id_customization : 0)+'" class="cart_quantity" value="'+this.cart_quantity+'" />' : '');
      cart_content += (!this.id_customization ? '<div class="input-group-btn"><a href="#" class="delete_product btn btn-default" rel="delete_'+this.id_product+'_'+this.id_product_attribute+'_'+(this.id_customization ? this.id_customization : 0)+'" ><i class="icon-remove text-danger"></i></a></div></div>' : '');
      cart_content += '</td><td>' + formatCurrency(this.numeric_total, currency_format, currency_sign, currency_blank) + '</td></tr>';

      if (this.id_customization && this.id_customization != 0)
      {
        $.each(this.customized_datas[this.id_product][this.id_product_attribute][id_address_delivery], function() {
          var customized_desc = '';
          if (typeof this.datas[1] !== 'undefined' && this.datas[1].length)
          {
            $.each(this.datas[1],function() {
              customized_desc += this.name + ': ' + this.value + '<br />';
              id_customization = this.id_customization;
            });
          }
          if (typeof this.datas[0] !== 'undefined' && this.datas[0].length)
          {
            $.each(this.datas[0],function() {
              customized_desc += this.name + ': <img src="' + pic_dir + this.value + '_small" /><br />';
              id_customization = this.id_customization;
            });
          }
          cart_content += '<tr><td></td><td>'+customized_desc+'</td><td></td><td></td><td>';
          cart_content += '<div class="input-group fixed-width-md"><div class="input-group-btn"><a href="#" class="btn btn-default increaseqty_product" rel="'+id_product+'_'+id_product_attribute+'_'+id_customization+'" ><i class="icon-caret-up"></i></a><a href="#" class="btn btn-default decreaseqty_product" rel="'+id_product+'_'+id_product_attribute+'_'+id_customization+'"><i class="icon-caret-down"></i></a></div>';
          cart_content += '<input type="text" rel="'+id_product+'_'+id_product_attribute+'_'+id_customization +'" class="cart_quantity" value="'+this.quantity+'" />';
          cart_content += '<div class="input-group-btn"><a href="#" class="delete_product btn btn-default" rel="delete_'+id_product+'_'+id_product_attribute+'_'+id_customization+'" ><i class="icon-remove"></i></a></div></div>';
          cart_content += '</td><td></td></tr>';
        });
      }
    });

    $.each(gifts, function() {
      cart_content += '<tr><td><img src="'+this.image_link+'" title="'+this.name+'" /></td><td>'+this.name+'<br />'+this.attributes_small+'</td><td>'+this.reference+'</td>';
      cart_content += '<td>Gift</td><td>'+this.cart_quantity+'</td><td>Gift</td></tr>';
    });
    $('#customer_cart tbody').html(cart_content);
  }

  function updateCartVouchers(vouchers)
  {
    var vouchers_html = '';
    if (typeof(vouchers) == 'object')
      $.each(vouchers, function(){
        if (parseFloat(this.value_real) === 0 && parseInt(this.free_shipping) === 1)
          var value = 'Free shipping';
        else
          var value = this.value_real;

        vouchers_html += '<tr><td>'+this.name+'</td><td>'+this.description+'</td><td>'+value+'</td><td class="text-right"><a href="#" class="btn btn-default delete_discount" rel="'+this.id_discount+'"><i class="icon-remove text-danger"></i>&nbsp;Delete</a></td></tr>';
      });
    $('#voucher_list tbody').html($.trim(vouchers_html));
    if ($('#voucher_list tbody').html().length == 0)
      $('#voucher_list').hide();
    else
      $('#voucher_list').show();
  }

  function updateCartPaymentList(payment_list)
  {
    $('#payment_list').html(payment_list);
  }

  function fixPriceFormat(price)
  {
    if(price.indexOf(',') > 0 && price.indexOf('.') > 0) // if contains , and .
      if(price.indexOf(',') < price.indexOf('.')) // if , is before .
        price = price.replace(',','');  // remove ,
    price = price.replace(' ',''); // remove any spaces
    price = price.replace(',','.'); // remove , if price did not cotain both , and .
    return price;
  }

  function displaySummary(jsonSummary)
  {
    currency_format = jsonSummary.currency.format;
    currency_sign = jsonSummary.currency.sign;
    currency_blank = jsonSummary.currency.blank;
    priceDisplayPrecision = jsonSummary.currency.decimals ? 2 : 0;

    updateCartProducts(jsonSummary.summary.products, jsonSummary.summary.gift_products, jsonSummary.cart.id_address_delivery);
    updateCartVouchers(jsonSummary.summary.discounts);
    updateAddressesList(jsonSummary.addresses, jsonSummary.cart.id_address_delivery, jsonSummary.cart.id_address_invoice);

    if (!jsonSummary.summary.products.length || !jsonSummary.addresses.length || !jsonSummary.delivery_option_list)
      $('#carriers_part,#summary_part').hide();
    else
      $('#carriers_part,#summary_part').show();

    updateDeliveryOptionList(jsonSummary.delivery_option_list);
    checkVirtualProduct(jsonSummary.summary.products,jsonSummary.delivery_option_list);

    if (jsonSummary.cart.gift == 1)
      $('#order_gift').attr('checked', true);
    else
      $('#carrier_gift').removeAttr('checked');
    if (jsonSummary.cart.recyclable == 1)
      $('#carrier_recycled_package').attr('checked', true);
    else
      $('#carrier_recycled_package').removeAttr('checked');
    if (jsonSummary.free_shipping == 1)
      $('#free_shipping').attr('checked', true);
    else
      $('#free_shipping_off').attr('checked', true);

    $('#gift_message').html(jsonSummary.cart.gift_message);
    if (!changed_shipping_price)
      $('#shipping_price').html('<b>' + formatCurrency(parseFloat(jsonSummary.summary.total_shipping), currency_format, currency_sign, currency_blank) + '</b>');
    shipping_price_selected_carrier = jsonSummary.summary.total_shipping;

    $('#total_vouchers').html(formatCurrency(parseFloat(jsonSummary.summary.total_discounts_tax_exc), currency_format, currency_sign, currency_blank));
    $('#total_shipping').html(formatCurrency(parseFloat(jsonSummary.summary.total_shipping_tax_exc), currency_format, currency_sign, currency_blank));
    $('#total_taxes').html(formatCurrency(parseFloat(jsonSummary.summary.total_tax), currency_format, currency_sign, currency_blank));
    $('#total_without_taxes').html(formatCurrency(parseFloat(jsonSummary.summary.total_price_without_tax), currency_format, currency_sign, currency_blank));
    $('#total_with_taxes').html(formatCurrency(parseFloat(jsonSummary.summary.total_price), currency_format, currency_sign, currency_blank));
    $('#total_products').html(formatCurrency(parseFloat(jsonSummary.summary.total_products), currency_format, currency_sign, currency_blank));
    id_currency = jsonSummary.cart.id_currency;
    $('#id_currency option').removeAttr('selected');
    $('#id_currency option[value="'+id_currency+'"]').attr('selected', true);
    id_lang = jsonSummary.cart.id_lang;
    $('#id_lang option').removeAttr('selected');
    $('#id_lang option[value="'+id_lang+'"]').attr('selected', true);
    $('#send_email_to_customer').attr('rel', jsonSummary.link_order);
    $('#go_order_process').attr('href', jsonSummary.link_order);
    $('#order_message').val(jsonSummary.order_message);
    
  }

  function displayQtyInStock(id)
  {
    var id_product = $('#id_product').val();
    if ($('#ipa_' + id_product + ' option').length)
      var id_product_attribute = $('#ipa_' + id_product).val();
    else
      var id_product_attribute = 0;

    $('#qty_in_stock').html(stock[id_product][id_product_attribute]);
  }

