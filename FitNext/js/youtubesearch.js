

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
        
        if (age > 17 && age < 30){
            heartRate = 170;   
        } else if (age > 29 && age < 40){
            heartRate = 162; 
        } else if (age > 39 && age < 50){
            heartRate = 153; 
        } else if (age > 49 && age < 60){
            heartRate = 145; 
        } else if (age > 59 && age < 70){
            heartRate = 136; 
        } else if (age > 69){
            heartRate = 128; 
        } else {
            heartRate = 100;
        }
        
        var heartRate = 150;
        var duration = 0;
        
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
                        var durationHours = Math.floor(duration / 3600);
                        var durationMinutes = Math.floor((duration - (durationHours * 3600)) / 60);
                        var timeString;
                        
                        ("0" + durationHours).slice(-2);
                        ("0" + durationMinutes).slice(-2);
                        ("0" + duration).slice(-2);
                        
                        console.log(duration);
                        if (duration > 3599){
                            timeString = durationHours + ":" + durationMinutes + ":" + duration%60;
                        } else {
                            timeString = durationMinutes + ":" + duration%60;
                        }
                        
                        if (sex == 'Male'){
                        var caloriesBurned= Math.floor((((age * 0.2017) - (weight * 0.09036) + (heartRate * 0.6309) - 55.0969) * (duration/60) / 4.184))
                    } else {
                           var caloriesBurned= Math.floor((((age * 0.074) - (weight * 0.05741) + (heartRate * 0.4472) - 20.4022) * (duration/60) / 4.184))
                           }

                        var video_frame="<iframe width='400' height='350' class='image fit' src='http://www.youtube.com/embed/"+video_id+"' frameborder='0' type='text/html'></iframe>";
                        
                        var calBurnedText = "Click here to log " + caloriesBurned + " calories burned!"
                        var calBurnedLink = 'http://www.aarontharpe.com/FinalProject/updateCal.php?bCal=' + caloriesBurned;
                        var calBurnedFinal = calBurnedText.link(calBurnedLink);
                        
                        
                        var final="<div class='6u 12u(mobilep)'>"
                        +video_frame
                        +"<p>"
                        +" Views: <strong>" 
                        +video_viewCount
                        +"</strong><br/>Duration: <strong>"
                        +timeString
                        +"</strong><br/>Estimated Calories Burned:<strong> "
                        +Math.ceil(caloriesBurned)+"</strong><br/>"
                        +calBurnedFinal
                        +"</p><hr/></div>";
                        
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
        
        if (age > 17 && age < 30){
            heartRate = 170;   
        } else if (age > 29 && age < 40){
            heartRate = 162; 
        } else if (age > 39 && age < 50){
            heartRate = 153; 
        } else if (age > 49 && age < 60){
            heartRate = 145; 
        } else if (age > 59 && age < 70){
            heartRate = 136; 
        } else if (age > 69){
            heartRate = 128; 
        } else {
            heartRate = 100;
        }
        
        var heartRate = 150;
        var duration = 0;
        
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
                        var durationHours = Math.floor(duration / 3600);
                        var durationMinutes = Math.floor((duration - (durationHours * 3600)) / 60);
                        var timeString;
                        
                        ("0" + durationHours).slice(-2);
                        ("0" + durationMinutes).slice(-2);
                        ("0" + duration).slice(-2);
                        
                        console.log(duration);
                        if (duration > 3599){
                            timeString = durationHours + ":" + durationMinutes + ":" + duration%60;
                        } else {
                            timeString = durationMinutes + ":" + duration%60;
                        }
                        
                        if (sex == 'Male'){
                        var caloriesBurned= Math.floor((((age * 0.2017) - (weight * 0.09036) + (heartRate * 0.6309) - 55.0969) * (duration/60) / 4.184))
                    } else {
                           var caloriesBurned= Math.floor((((age * 0.074) - (weight * 0.05741) + (heartRate * 0.4472) - 20.4022) * (duration/60) / 4.184))
                           }

                        var video_frame="<iframe width='400' height='350' class='image fit' src='http://www.youtube.com/embed/"+video_id+"' frameborder='0' type='text/html'></iframe>";
                        
                        var calBurnedText = "Click here to log " + caloriesBurned + " calories burned!"
                        var calBurnedLink = 'http://www.aarontharpe.com/FinalProject/updateCal.php?bCal=' + caloriesBurned;
                        var calBurnedFinal = calBurnedText.link(calBurnedLink);
                        
                        
                        var final="<div class='6u 12u(mobilep)'>"
                        +video_frame
                        +"<p>"
                        +" Views: <strong>" 
                        +video_viewCount
                        +"</strong><br/>Duration: <strong>"
                        +timeString
                        +"</strong><br/>Estimated Calories Burned:<strong> "
                        +Math.ceil(caloriesBurned)+"</strong><br/>"
                        +calBurnedFinal
                        +"</p><hr/></div>";
                        
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
});
