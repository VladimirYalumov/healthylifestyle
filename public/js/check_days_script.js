var check_day_number;

function daysWrite(day_number, id) {
    var days = document.getElementById('days');
    var part ="";
    check_day_number = day_number;
    var i, j;
    part += '<input type="hidden" name="programm_ID" value="' + id + '">';
    part += '<input type="hidden" name="programm_days" value="' + day_number + '">';
    for (i = 0; i <= day_number; i++){
        part += '<div class="container-fluid row border border-secondary" style="padding: 10px; margin-left: 0px;">';
            part += '<div class="col-md-3 col-xs-12 font-weight-bold" style="padding-top: 8px;">День ' + (i+1) + '</div>';
            part += '<div class="col-md-4 col-xs-12">';
            part += '<input id="timeId_' + i + '" type="time" class="form-control" name="time' + i + '" step="2" value="15:00:00">';
            part += '</div>';

            part += '<select class="form-control col-md-5 col-xs-12" name="day' + i + '" id="day' + i + '">';
            for (j = 0; j <= 7; j++)
            {
                switch(j) {
                    case 0:
                        part += '<option value=' + j + '>Понедельник</option>';
                    break;

                    case 1:
                        part += '<option value=' + j + '>Вторник</option>';
                    break;

                    case 2:
                        part += '<option value=' + j + '>Среда</option>';
                    break;

                    case 3:
                        part += '<option value=' + j + '>Четверг</option>';
                    break;

                    case 4:
                        part += '<option value=' + j + '>Пятница</option>';
                    break;

                    case 5:
                        part += '<option value=' + j + '>Суббота</option>';
                    break;

                    case 6:
                        part += '<option value=' + j + '>Воскресенье</option>';
                    break;
                }
            }
            part += '</select>';

        part += '</div>';
    }
    days.innerHTML = part;
}

function checkRepeats() {
    var days = [];
    var i;
    for (i = 0; i <= check_day_number; i++) {
        days[i] = document.getElementById('day' + i).value;
    }

    for (var i = 0; i < days.length - 1; i++){
        for (var j = i + 1; j < days.length; j++){
            if (days[i] === days[j]){
                alert ("Вы не можете использовать несколько тренировок в один день");
                return false;
            }
        }
    }

    document.forms["form"].submit();
}