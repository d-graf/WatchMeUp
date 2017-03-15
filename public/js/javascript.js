/**
 * Created by bgrafd on 15.03.2017.
 */

jQuery(document).ready(function($){

    $( ".toggle-posts" ).click(function() {
        $( ".posts" ).slideToggle( "slow", function() {
            if($('.posts').hasClass('toggled')){
                $( ".posts" ).removeClass('toggled');
                $( ".toggle-posts" ).html("Show all posts! <i class='fa fa-chevron-down'></i>");
            } else {
                $( ".posts" ).addClass('toggled');
                $( ".toggle-posts" ).html("Close all posts! <i class='fa fa-chevron-up'></i>");
            }
        });
    });
    $( ".toggle-user" ).click(function() {
        $( ".user" ).slideToggle( "slow", function() {
            if($('.user').hasClass('toggled')){
                $( ".user" ).removeClass('toggled');
                $( ".toggle-user" ).html("Show all users! <i class='fa fa-chevron-down'></i>");
            } else {
                $( ".user" ).addClass('toggled');
                $( ".toggle-user" ).html("Close all users! <i class='fa fa-chevron-up'></i>");
            }
        });
    });

});
