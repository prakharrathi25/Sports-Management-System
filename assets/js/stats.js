$(document).ready(function(){
    $.ajax({
        url: "http://localhost/Sports-Management-System/stats.php",
        method: "GET",
        success: function(data){
            console.log(typeof(data));
            // Declare three arrays to Store data
            var gender = [];
            var gcounts = [];
            data = data.split(",");
            console.log(data); 

            // Loop through data to extract the data
            // for(var i in data){
            //     gender.push("Gender "+ data[i].Gender);
            // }
            // console.log(gender);


            // Making Chart data
            var genderchart = {
                // Add labels and data here
            }
        },
        error: function(gender_data){
            console.log(data);
        }
    })
});
