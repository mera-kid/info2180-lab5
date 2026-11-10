window.onload = function(){
    var btn = document.getElementById('lookup')
    var btnCities = document.getElementById('lookup-cities')
    var rslt = document.getElementById('result')
    var inpt = document.getElementById('country')

    btn.addEventListener('click', function(event){
        var input = inpt.value.trim();

        var url = "world.php";
        if (input != ""){
            url += "?country=" + (input);
        }
        
        $.ajax(url)
            .done(function (result){
                rslt.innerHTML = result;
            })
    })

    btnCities.addEventListener('click', function(event){
        var input = inpt.value.trim();

        var url = "world.php";
        if (input != ""){
            url += "?country=" + (input) + "&lookup=cities";
        }
        
        $.ajax(url)
            .done(function (result){
                rslt.innerHTML = result;
            })
    })
}