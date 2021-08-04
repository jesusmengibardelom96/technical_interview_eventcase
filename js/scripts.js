$( document ).ready(function() {
    $("#liveToastBtn").click(function(){
        $(".toast").removeClass(".hide");
        setTimeout(
            function() 
            {
                $(".toast").addClass("hide");
            }, 2000);
    });
});