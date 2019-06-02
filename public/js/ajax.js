function bestProgram(sex) {
        $.ajax({
        type: "GET",
        url: "http://healthylifestyle.local/api/best_program",
        data: {sex: sex},
        dataType: "json",
        async: false,
        success: function (data){program = data;},
        error: function(){alert('Problem');}
        });
    return program;
}

function showProgram(sex) {
    var best = document.getElementById('bestProgram');
    var part ="";

    var best_pogram_data = eval(bestProgram(sex));
    part += '<div>';
    part += '<p>Лучшая программа - ' + best_pogram_data.name + '</p>';
    part += '</div>';

    best.innerHTML = part;
}