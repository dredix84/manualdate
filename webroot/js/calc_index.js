
$(function () {
    /**
     * Used to validation the input fields in the form
     * @returns {Boolean}
     */
    function dataValid() {
        var outVal = true;
        var msg = "";
        var regp = new RegExp("(\d){4}-(\d){2}-(\d){2}");
        var startVal = $('#start-date').val().toString().trim();
        var endVal = $('#end-date').val().toString().trim();

        if (startVal == '' || endVal == '') {
            outVal = false;
            msg = "Please ensure you select a start and end date before attempting to calculate.";
        }

        var notify = $('#notify');
        if (outVal) {
            notify.hide('slow');
        } else {
            notify.html(msg).show('slow');
        }

        return outVal;
    }

    /**
     * Used to go an AJAX request foe the date difference calculation
     * @returns {undefined}
     */
    function requestCalculation() {
        if (dataValid()) {
            var url = WEBROOT + 'calcs/date-diff/' + $('#start-date').val() + '/' + $('#end-date').val() + '/1.json';
            $.get(url, function (data) {
                if (data !== undefined && data.result !== undefined) {
                    $('#result').val(Math.round(data.result));
                    addCalcHistory($('#start-date').val(), $('#end-date').val(), data.result, data.dateTime);
                } else if (data.message !== undefined) {
                    alert(data.message);
                }
            });
        }
    }

    /**
     * Used to add an entry to the history/previous entry table
     * @param {type} startDate  Start date
     * @param {type} endDate    End date
     * @param {type} result     Calculation result
     * @param {type} dateTime   Date calculation was done
     * @returns {undefined}
     */
    function addCalcHistory(startDate, endDate, result, dateTime) {
        var d = new Date();
        var rowId = d.getTime();

        var rowStr = '<tr id="' + rowId + '">';
        rowStr += "\n\t<td>" + startDate + "</td>";
        rowStr += "\n\t<td>" + endDate + "</td>";
        rowStr += "\n\t<td>" + Math.round(result) + "</td>";
        rowStr += "\n\t<td>" + dateTime + "</td>";
        rowStr += '</tr>';

        $('#tblResult tbody').prepend(rowStr);
        $('#' + rowId).effect("highlight", {}, 3000);
    }

    $('#frmCalc').submit(function (e) {
        e.preventDefault();
        requestCalculation();
        //alert('Calculating');
    });



    //intializing jQuery UI components
    $(".datepicker").datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $( 'input, button' ).tooltip();


});

