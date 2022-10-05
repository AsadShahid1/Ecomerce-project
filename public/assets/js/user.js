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


        } else if ($(this).data('type') == 'price') {

            if ($(this).is(":checked")) {
                prices.push(val);
            } else {
                const index = prices.indexOf(val);
                if (index > -1) {
                    prices.splice(index, 1);
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
                $("#result").load(data.products);
            },
            error : function(data) {   
              alert('error') ;
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
});

