$(document).ready(function(){
    //banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({
        dots:true,
        items:1,
        loop:true,
        autoplayTimeout:2000, //2000 ms = 2 sec
        autoplayhoverpause:true

    });
    // Top Selling Owl Carousel
    $("#top-selling .owl-carousel").owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    // isotope 
    $(".grid").isotope({
        itemSelector:'.grid-item',
        layoutMode:'fitRows'       
    });

    // New Phones Owl Carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    //product quantity section
    let $qty_down = $(".qty .qty-down");
    let $qty_up = $(".qty .qty-up");
    // let $input = $(".qty .qty-input");
    
    //click on qty up button
    $qty_up.click(function(){
        let $input =$(`.qty-input[data-id='${$(this).data("id")}']`);
        if($input.val()>=1 && $input.val()<=9){
            $input.val(function(i,oldval){
                return ++oldval;
            });
        }
    });

    //click on qty down button
    $qty_down.click(function(){

        let $input =$(`.qty-input[data-id='${$(this).data("id")}']`);
        if($input.val()>1 && $input.val()<=10){
            $input.val(function(i,oldval){
                return --oldval;
            });
        }
    });

    
});