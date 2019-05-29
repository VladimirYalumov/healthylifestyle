window.onload = firstRun();

function limitEx(id, divID) {
    var number_value = document.getElementById(id).value;

    if (number_value < 1)
    {
        document.getElementById(id).value = 1
        number_value = 1;
    }
    if (number_value > 100)
    {
        document.getElementById(id).value = 100
        number_value = 100;
    }

    var exerciseID = 'exercise' + divID;
    exercisesWrite(number_value, exerciseID, divID);
}

function daysWrite(number) {
    var days = document.getElementById('days');
    var part ="";
    var divID;
    var i;
    for (i = 1; i <= number; i++)
    {
        part += '<div id="day' + i + '" class="col-12 border border-secondary rounded p-3" style="margin-top: 15px;">';
        part += '<h3>День ' + i + '</h3>';
        part += '<label for="number' + i + '" class="col-form-label">Количество упражнений</label>';
        part += '<input class="form-control col-md-5 col-xs-12" type="number" value="1" id="number' + i + '" min="1" max="100" onchange="limitEx(this.id, this.parentNode.id);" name = "day' + i + '">';
        part += '<div id ="exerciseday' + i + '" class = "p-3 col-md-8 col-xs-12">';
        part += '</div>';
        part += '</div>';
    }
    days.innerHTML = part;
}

function exercisesWrite(number, divID, dayID) {
    var exercises = document.getElementById(divID);
    var part ="";
    var i;
    for (i = 1; i <= number; i++) {
        part += '<div id="exercise' + i + dayID + '" class="form-group row rounded p-3 mb-2 gradient" style="margin-top: 15px; margin-bottom: 15px;">';

            part += '<h4 class="text-white col-12 text-right" style="margin-bottom: 15px;">Упражнение ' + i + '</h4>';

            part += '<label for="nameexercise' + i + dayID + '" class="col-form-label col-md-7 col-xs-12 text-white">Название упражнения</label>';
            part += '<div class="col-md-5 col-xs-12">';
                part += '<input id="nameexercise' + i + dayID + '" type="text" class="form-control" name="name' + i + dayID + '">';
            part += '</div>';

            part += '<label for="numberexercise' + i + dayID + '" class="col-form-label col-md-7 col-xs-12 text-white" style="margin-top: 15px;">Количество раз за один подход</label>';
            part += '<div class="col-md-5 col-xs-12" style="margin-top: 15px;">';
                part += '<input id="numberexercise' + i + dayID + '" type="number" class="form-control" name="number' + i + dayID + '">';
            part += '</div>';

            part += '<label for="appreachesexercise' + i + dayID + '" class="col-form-label col-md-7 col-xs-12 text-white" style="margin-top: 15px;">Количество подходов</label>';
            part += '<div class="col-md-5 col-xs-12" style="margin-top: 15px;">';
                part += '<input id="appreachesexercise' + i + dayID + '" type="number" class="form-control" name="appreaches' + i + dayID + '">';
            part += '</div>';

            part += '<label for="timeexercise' + i + dayID + '" class="col-form-label col-md-7 col-xs-12 text-white" style="margin-top: 15px;">Время на выполнение всех подходов</label>';
            part += '<div class="col-md-5 col-xs-12" style="margin-top: 15px;">';
                part += '<input id="timeexercise' + i + dayID + '" type="time" class="form-control" name="time' + i + dayID + '" step="2" value="00:05:00">';
            part += '</div>';
        part += '</div>';
    }
    exercises.innerHTML = part;
}

function firstRun(){
    daysWrite(1);
}








