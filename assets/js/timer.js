   
    var t, count;
    
    function cddisplay() {
        // displays time in span
        document.getElementById('timespan').innerHTML = count;
    };
    
    function countdown() {
        // starts countdown
        cddisplay();
        if (count == 0) {
            // time is up
        } else {
            count--;
            t = setTimeout("countdown()", 1000);
        }
    };
    
    function cdpause() {
        // pauses countdown
        clearTimeout(t);
    };
    
    function cdreset(CCOUNT) {
        // resets countdown
        cdpause();
        count = CCOUNT;
        cddisplay();
    };
    