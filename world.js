window.onload = function(){
    var btn = document.getElementById('lookup')
    var rslt = document.getElementById('result')
    var inpt = document.getElementById('country')

    btn.addEventListener('click', function(event){
        var input = inpt.value.trim();

        var url = "world.php";
        if (input != ""){
            url = url + "?country=" + (input);
        }
        
        $.ajax(url)
            .done(function (result){
                rslt.innerHTML = result;
            })
    })
}