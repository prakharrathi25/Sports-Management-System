<?php
$(document).ready(function(){
    // Targetting the check box activity
    $(".product_check").click(function(){
        // First show a loader
        $('#loader').show();

        var action = 'data';
        var team = get_filter_text('team');
        var gender = get_filter_text('gender');
        var sport = get_filter_text('sport');
        var dept = get_filter_text('dept');
        var level = get_filter_text('level');

        // php page to handle the queries
        $.ajax({
            url: 'filter.php';
            method: 'POST';
            data: {action: action, team: team, gender: gender, sport: sport, dept: dept, level: level},
            success: function(response){

                // Changes that will take place once the query returns successfully.
                $("#result").html(response);
                $('#loader').hide() // Hide the loader
                $('#textChange').text("Filtered Products")
            }
        })
    });

    function get_filter_text(text_id){
        var filterData = [];
        $('#' + text_id + ':checked').each(function(){
            fiterData.push($(this).val());
        });
        return filterData;
    }
});

?>
