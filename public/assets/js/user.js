// search script
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // price range 
    $(function () {
        $("#slider-range").slider({
            range: true,
            min: 1000,
            max: 200000,
            values: [0, 300000],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));
    });

    // search filter category,brand,price


    var cats = [];
    var brands = [];
    $(document).on("click", '.filter', function () {
        var val = $(this).val();
        if ($(this).data('type') == 'cat') {

            if ($(this).is(":checked")) {
                cats.push(val);
            } else {
                const index = cats.indexOf(val);
                if (index > -1) {
                    cats.splice(index, 1);
                }
            }


        } else if ($(this).data('type') == 'brand') {

            if ($(this).is(":checked")) {
                brands.push(val);
            } else {
                const index = brands.indexOf(val);
                if (index > -1) {
                    brands.splice(index, 1);
                }
            }


        }
        $.ajax({
            type: "GET",
            url: '/filter',
            data: {
                "cats": cats,
                "brands": brands,
            },
            success: function (data) {
                $("#result").html(data);
            },
            error: function (data) {
                alert('error');
            }
        });

        // if ($(this).is(":checked")) {
        //     cat.push($(this).val());
        // } else if{
        //     // $("#result").load("http://127.0.0.1:8001/");
        // }

        // console.log(prices);
    });


    // Add active class to the current button (highlight it)
    // var header = document.getElementById("myDIV");
    // var btns = header.getElementsByClassName("btn");
    // for (var i = 0; i < btns.length; i++) {
    //     btns[i].addEventListener("click", function () {
    //         var current = document.getElementsByClassName("active");
    //         current[0].className = current[0].className.replace(" active", "");
    //         this.className += " active";
    //     });
    // }


    // Add wishlist
    $(document).on("click", '.add-wishlist', function () {
        var route = $(this).data('route');
        $.get(route, function (response) {
            if (response == 1) {
                swal({
                    icon: "success",
                    title: "Success!",
                    text: "Product added in wishlist!",
                    type: "success",
                    timer: 2000,
                    });
                    
            }else{
                swal({
                    icon: "deleted",
                    title: "ooops!",
                    text: "something went wrong!",
                    type: "error",
                    timer: 2000
                    }); 
            }
        })

    })

    // Remove Wishlist
    $(document).on('click' , '.wishremove' , function(){
        item = $(this).data('item');
        $.get($(this).data('route') , function(res){
            $("#"+item).remove();
            setTimeout(function(){
                window.location.reload(true);
            },1000);
        })
    })

    // Add in cart
    $(document).on("click", '.add-to-cart', function () {
        var route = $(this).data('route');
        if($('.squantity').length){
            var quant = $(".squantity").val();
            route += "/"+quant;
        }
        $.get(route, function (response) {
            $(".cart-count").html(response.count);
            if (response.success) {
                swal({
                    icon: "success",
                    title: "Success!",
                    text: "Product added in cart!",
                    type: "success",
                    timer: 2000,
                    });
                    
            }else{
                swal({
                    icon: "error",
                    title: "Error",
                    text: "Product Already Added",
                    type: "error",
                    timer: 2000,
                    });
            }
        })

    })

    //remove from cart
    $(document).on('click' , '.remove-product' , function(){
        $("#"+$(this).data('remove')).remove();
        setTimeout(function(){
            window.location.reload(true);
        },1000);
        $.get($(this).data('route') , function(res){
            if (response.success) {
                swal({
                    icon: "success",
                    title: "Success!",
                    text: "Product remove from cart!",
                    type: "success",
                    timer: 2000,
                    });
                    
            }else{
                swal({
                    icon: "error",
                    title: "Error",
                    text: "Something went wrong",
                    type: "error",
                    timer: 2000,
                    });
            }
        })
    })

    // Change Quantity

    $(document).on('change' , '.quantity' , function(){
        var quantity = $(this).val();
        console.log(quantity);
        var url = $(this).data('route')+"/"+quantity;
        $.get(url , function(res){
            $('.total_price').html(res.totalPrice);
        })
    })
});

