$(function(){
    $(".search_keyword").keyup(function()
    {
        var search_keyword_value = $(this).val();
        var dataString = 'search_keyword='+ search_keyword_value;
        if(search_keyword_value!='')
        {
            $.ajax({
                type: "POST",
                url: "../EquidesWebSite/PHP/equide_functions/recherche/recherche_equide.php",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $("#result").html(html).show();
                }
            });
        }
        return false;
    });

    $("#result").live("click",function(e){
        var $clicked = $(e.target);
        if (e.target.nodeName == "STRONG")
            $clicked = $(e.target).parent().parent();
        else if (e.target.nodeName == "SPAN")
            $clicked = $(e.target).parent();
        var $name = $clicked.find('.name').html();
        var decoded = $("<div/>").html($name).text();
        $('#search_keyword_id').val(decoded);
    });

    $(document).live("click", function(e) {
        var $clicked = $(e.target);
        if (! $clicked.hasClass("search_keyword")){
            $("#result").fadeOut();
        }
    });
    $('#search_keyword_id').click(function(){
        $("#result").fadeIn();
    });
});