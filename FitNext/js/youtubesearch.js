$(document).ready(function () {
    "use strict";
    $(".search_input").click(function() {
        document.getElementById("youtube").innerHTML = "";
        
        var resultNum = 4; //Change how many results are displayed
        var index = Math.floor((Math.random() * 50) + 1); //random index
        
        //personal info to calculate calories
        var weightid = document.getElementById("user-weight");
        var weight = weightid.getAttribute("data-weight");
        
        var ageid = document.getElementById("user-age");
        var age = ageid.getAttribute("data-age");
        
        var heartRate = 130;
        var duration = 20;
        
        var sexid = document.getElementById("user-sex");
        var sex = sexid.getAttribute("data-sex");

        for (var i = 1; i < resultNum+1; i++){
        var search_input = $(this).val();
        var keyword= encodeURIComponent(search_input);
        var index = index+1;

        var yt_url='http://gdata.youtube.com/feeds/api/videos?q='+keyword+'&start-index=' + index + '&format=5&orderby=viewCount&category=health,fitness,workout&max-results=1&duration=long&v=2&alt=jsonc'; 


        $.ajax({
            type: "GET",
            url: yt_url,
            dataType:"jsonp",
            success: function(response)
            {
                if(response.data.items)
                {
                    $.each(response.data.items, function(i,data)
                           {
                        var video_id=data.id;
                        var video_title=data.title;
                        var video_viewCount=data.viewCount;
                        video_viewCount=video_viewCount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        var duration=data.duration;
                        
                        if (video_title.length > 34){
                            var video_title = video_title.substring(0,35) + "...";
                        }
                        
                        if (sex == 'male'){
                        var caloriesBurned=(((age * 0.2017) - (weight * 0.09036) + (heartRate * 0.6309) - 55.0969) * Math.floor(((duration/60)%60)) / 4.184)
                    } else {
                           var caloriesBurned=(((age * 0.074) - (weight * 0.05741) + (heartRate * 0.4472) - 20.4022) * Math.floor(((duration/60)%60)) / 4.184)
                           }

                        var video_frame="<iframe width='400' height='350' class='image fit' src='http://www.youtube.com/embed/"+video_id+"' frameborder='0' type='text/html'></iframe>";
                        
                        var final="<div class='6u 12u(mobilep)'>"
//                            +"<h3 id='title'>"
//                        +video_title
//                        +"</h3>"
                        +video_frame
                        +"<p>"
                        +" Views: <strong>" 
                        +video_viewCount
                        +"</strong><br/>Duration: <strong>"+
                        Math.floor(((duration/60)%60))+
                        ":"+
                        duration%60
                        +"</strong><br/>Estimated Calories Burned:<strong> "
                        +Math.ceil(caloriesBurned)+"</strong></p>"
                        +"<hr/></div>";
                        
                        $("#youtube").append(final);
                    });

                }
                else
                {
                    $("#youtube").html("<div id='no'>No Video</div>");
                }
                $("#moreButton").attr( "style", "" );
                $(".search_more").attr("data-keyword", search_input );
            }

        });
        }

    });
$(".search_more").click(function() {        
        var resultNum = 4; //Change how many results are displayed
        var index = Math.floor((Math.random() * 50) + 1); //random index
        
        //personal info to calculate calories
        var weightid = document.getElementById("user-weight");
        var weight = weightid.getAttribute("data-weight");
        
        var ageid = document.getElementById("user-age");
        var age = ageid.getAttribute("data-age");
        
        var heartRate = 130;
        var duration = 20;
        
        var sexid = document.getElementById("user-sex");
        var sex = sexid.getAttribute("data-sex");

        for (var i = 1; i < resultNum+1; i++){
        var search_input = $(this).attr("data-keyword");
        var keyword= encodeURIComponent(search_input);
        var index = index+1;

        var yt_url='http://gdata.youtube.com/feeds/api/videos?q='+keyword+'&start-index=' + index + '&format=5&orderby=viewCount&category=health,fitness,workout&max-results=1&duration=long&v=2&alt=jsonc'; 


        $.ajax({
            type: "GET",
            url: yt_url,
            dataType:"jsonp",
            success: function(response)
            {
                if(response.data.items)
                {
                    $.each(response.data.items, function(i,data)
                           {
                        var video_id=data.id;
                        var video_title=data.title;
                        var video_viewCount=data.viewCount;
                        video_viewCount=video_viewCount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        var duration=data.duration;
                        
                        if (video_title.length > 34){
                            var video_title = video_title.substring(0,35) + "...";
                        }
                        
                        if (sex == 'male'){
                        var caloriesBurned=(((age * 0.2017) - (weight * 0.09036) + (heartRate * 0.6309) - 55.0969) * Math.floor(((duration/60)%60)) / 4.184)
                    } else {
                           var caloriesBurned=(((age * 0.074) - (weight * 0.05741) + (heartRate * 0.4472) - 20.4022) * Math.floor(((duration/60)%60)) / 4.184)
                           }

                        var video_frame="<iframe width='400' height='350' class='image fit' src='http://www.youtube.com/embed/"+video_id+"' frameborder='0' type='text/html'></iframe>";
                        
                        var final="<div class='6u 12u(mobilep)'>"
//                            +"<h3 id='title'>"
//                        +video_title
//                        +"</h3>"
                        +video_frame
                        +"<p>"
                        +" Views: <strong>" 
                        +video_viewCount
                        +"</strong><br/>Duration: <strong>"+
                        Math.floor(((duration/60)%60))+
                        ":"+
                        duration%60
                        +"</strong><br/>Estimated Calories Burned:<strong> "
                        +Math.ceil(caloriesBurned)+"</strong></p>"
                        +"<hr/></div>";
                        
                        $("#youtube").append(final);
                    });
                }
                else
                {
                    $("#youtube").html("<div id='no'>No Video</div>");
                }
            }

        });
        }

    });
});