'use strict';
var doc = document;
doc.qrySel = doc.querySelector;
doc.qrySelAll = doc.querySelectorAll;

document.addEventListener('DOMContentLoaded', function(event) {
    // doc.qrySel('#password').oninput = function() {
    //     var password = doc.qrySel('#password').value;
    //     var plaintxt = doc.qrySel('#plaintxt').value;
    //     var t1 = performance.now();
    //     var encrtext = AesCtr.encrypt(plaintxt, password, 256);
    //     var t2 = performance.now();
    //     doc.qrySel('#encrtext').value = encrtext;
    //     doc.qrySel('#time-encrypt').value = (t2 - t1).toFixed(3) + 'ms';
    //     doc.qrySel('#encrtext').oninput(); // trigger decrypt
    // };

    // doc.qrySel('#plaintxt').oninput = function() {
    //     var password = doc.qrySel('#password').value;
    //     var plaintxt = doc.qrySel('#plaintxt').value;
    //     var t1 = performance.now();
    //     var encrtext = AesCtr.encrypt(plaintxt, password, 256);
    //     var t2 = performance.now();
    //     doc.qrySel('#encrtext').value = encrtext;
    //     doc.qrySel('#time-encrypt').value = (t2 - t1).toFixed(3) + 'ms';
    //     doc.qrySel('#encrtext').oninput(); // trigger decrypt
    // };

    doc.qrySel('#encrtext').oninput = function() {
        try {
            var password = doc.qrySel('#password').value;
            var encrtext = doc.qrySel('#encrtext').value;
            var t1 = performance.now();
            var decrtext = AesCtr.decrypt(encrtext, password, 256);
            var t2 = performance.now();
            doc.qrySel('#decrtext').value = decrtext;
            doc.qrySel('#time-decrypt').value = (t2 - t1).toFixed(3) + 'ms';
        } catch (e) {
            doc.qrySel('#decrtext').value = '';
            doc.qrySel('#time-decrypt').value = e.message;
        }
    };

    doc.qrySel('#password').oninput = function() {
        try {
            var password = doc.qrySel('#password').value;
            var encrtext = doc.qrySel('#encrtext').value;
            var t1 = performance.now();
            var decrtext = AesCtr.decrypt(encrtext, password, 256);
            var t2 = performance.now();
            document.getElementById('decrtext').innerText = decrtext;
            doc.qrySel('#decrtext').value = decrtext;
            doc.qrySel('#time-decrypt').value = (t2 - t1).toFixed(3) + 'ms';
        } catch (e) {
            doc.qrySel('#decrtext').value = '';
            doc.qrySel('#time-decrypt').value = e.message;
        }
    }

    // doc.qrySel('#password').oninput(); // trigger initial hash

});