
function customerEmailCheck(email) {
    $.ajax({
        type: "GET",
        url: "http://localhost/advance-ecommerce/public/customer-email-check",
        data:{email: email},
        dataType: "JSON",
        success: function (response) {
            $('#emailError').text(response);
        }
    });
}

$(document).on('keyup',function(e){
    e.preventDefault();
    let search_string = $('#searchBar').val();
    // console.log(search_string);
    $.ajax({
        url:"/search",
        method:'get',
        data:{search_string:search_string},
        success:function(res)
        {
            // console.log(res);
            $('#form-data').val(''); 
            $('.search-bar').html(res);
            if (res.status === 'Nothing_Found') {
                $('.search-bar').html('<span class="text-danger">Nothing Found</span>');
            }
            
        }
    });
});
$(document).on('click', '.card-close', function() {
    $('#searchBar').val('');
    $('.search-bar').html('');
});

$(document).on('keyup', '#prodSearch', function () {
    var inputText = $(this).val();
    $.ajax({
        type: "GET",
        url: "http://localhost/advance-ecommerce/public/api/get-all-product",
        data:{text: inputText},
        dataType: "JSON",
        success: function (response) {
            console.log(response);
            var div = '';
            $.each(response, function (key, value) {
                div += '<div class="axil-product-list">';
                div += '<div class="thumbnail">';
                div += '<a href="">';
                div += '<img src="'+value.image+'" style="height: 60px;" alt="Yantiti Leather Bags"/>';
                div += '</a>';
                div += '</div>';
                div += '<div class="product-content">';
                div += '<h6 class="product-title"><a href="single-product.html"> '+value.name+' </a></h6>';
                div += '<div class="product-price-variant">';
                div += '<span class="price current-price">'+value.selling_price+'</span>';
                div += '<span class="price old-price">$49.99</span>';
                div += '</div>';
                div += '<div class="product-cart">';
                div += '<a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>';
                div += '<a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>';
                div += '</div>';
                div += '</div>';
                div += '</div>';
            });
            $('#searchResult').empty();
            $('#searchResult').append(div);
            $('#searchResultCount').text(response.length);
        }
    });
});

$(document).on('click','.addToCartBtn',function(e){
    e.preventDefault();
    let prod_id= $(this).closest('.product_data').find('.prod_id').val();
    let quantity= $(this).closest('.product_data').find('.quantity').val();

    // alert(prod_id+quantity);
    $.ajax({
        url:"/direct-add-to-cart",
        method:'post',
        data:{prod_id:prod_id,quantity:quantity},
        success:function(res)
        {
            console.log("ok");
            $('header').load(window.location.href + ' .header');
            $('.autoload').load(window.location.href + ' .autoload');
           if(res.status=='success')
           {
            Command: toastr["success"]("Product Added", "Successfully")

            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }

           }

        }
    });
});


$(document).on('click','.pro-qty',function(e){
    e.preventDefault();
    let prod_id= $(this).closest('.product_data').find('.prod_id').val();
    let id= $(this).closest('.product_data').find('.id').val();
    let quantity= $(this).closest('.product_data').find('.quantity-input').val();

    // alert(prod_id+quantity+id);

    $.ajax({
        url: "/update-shopping-cart",
        method: 'post',
        data: { prod_id: prod_id, quantity: quantity, id: id },
        success: function (res) {
            console.log("ok");
    
            if (res.update == "success") {
                // Show toastr notification first
                Command: toastr["success"]("Cart updated successfully!", "Success");
    
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "500",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
    
                // Reload after 2 seconds to allow notification to show
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
    
            } 
            
        }
    });
    

});
$("#slider-range").slider({
    range: true,           // optional: enables a range slider with two handles
    min: 0,
    max: 5000,
    values: [0, 3000],      // optional: default values for the range handles
    change: function(event, ui) {
        // console.log("Selected range: " + ui.values[0] + " - " + ui.values[1]);
        let minPrice = ui.values[0];
        let maxPrice = ui.values[1];
        // alert(minPrice);

        $.ajax({
            url:"/price-filter",
            method:"post",
            data:{minPrice:minPrice,maxPrice:maxPrice},
            success:function(res)
            {
                
                if(res.status=="success"){
                    $('.search-result').html(res.html);
                }
                if(res.status=="Not_found")
                {
                    $('.search-result').html('<p class="text-danger">'+res.message+'</p>');
                }
                
            }
        });
    }
});

$(document).on('change',function(e){
    e.preventDefault();
   
    let sortby=$('#sort-by').val();
    // alert(sortby);
    $.ajax({
        url:"/sort-by",
        method:'post',
        data:{sortby:sortby},
        success:function(res)
        {
            $('.search-result').html(res);
        }
    });
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});