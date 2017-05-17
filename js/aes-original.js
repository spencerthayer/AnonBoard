'use strict';
var doc = document;
doc.qrySel = doc.querySelector;
doc.qrySelAll = doc.querySelectorAll;

document.addEventListener('DOMContentLoaded', function(event) {
    doc.qrySel('#password').oninput = function() {
        var password = doc.qrySel('#password').value;
        var plaintxt = doc.qrySel('#plaintxt').value;
        var t1 = performance.now();
        var encrtext = AesCtr.encrypt(plaintxt, password, 256);
        var t2 = performance.now();
        doc.qrySel('#encrtext').value = encrtext;
        doc.qrySel('#time-encrypt').value = (t2 - t1).toFixed(3) + 'ms';
        doc.qrySel('#encrtext').oninput(); // trigger decrypt
    };

    doc.qrySel('#plaintxt').oninput = function() {
        var password = doc.qrySel('#password').value;
        var plaintxt = doc.qrySel('#plaintxt').value;
        var t1 = performance.now();
        var encrtext = AesCtr.encrypt(plaintxt, password, 256);
        var t2 = performance.now();
        doc.qrySel('#encrtext').value = encrtext;
        doc.qrySel('#time-encrypt').value = (t2 - t1).toFixed(3) + 'ms';
        doc.qrySel('#encrtext').oninput(); // trigger decrypt
    };

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

    doc.qrySel('#password').oninput(); // trigger initial hash

    doc.qrySel('#src-file').onchange = function() {
        console.log('#src-file change')
        var file = this.files[0];
        doc.qrySel('#progress').removeAttribute('value'); // set progress to 'indeterminate' during utf8Encode
        var t1 = performance.now();
        var worker = new Worker('aes-ctr-file-webworker.js');
        worker.postMessage({
            op: 'encrypt',
            file: file,
            password: doc.qrySel('#password').value,
            bits: 256,
        });
        worker.onmessage = function(msg) {
            if (msg.data.progress != 'complete') { // progress notification
                doc.qrySel('#progress').value = msg.data.progress * 100; // update progress bar
            }
            if (msg.data.progress == 'complete') { // completed
                doc.qrySel('#progress').value = 0; // reset progress bar                                                                  // reset progress bar
                saveAs(msg.data.ciphertext, file.name + '.encrypted'); // save to file
                var t2 = performance.now();
                doc.qrySel('#encrypt-file-time').textContent = ((t2 - t1) / 1000).toFixed(3) + 's'; // display time taken
            }
        }
    };

    doc.qrySel('#enc-file').onchange = function() {
        var file = this.files[0];
        doc.qrySel('#progress').removeAttribute('value'); // set progress to 'indeterminate'
        var t1 = performance.now();
        var worker = new Worker('aes-ctr-file-webworker.js');
        worker.postMessage({
            op: 'decrypt',
            file: file,
            password: doc.qrySel('#password').value,
            bits: 256,
        });
        worker.onmessage = function(msg) {
            if (msg.data.progress != 'complete') { // progress notification
                doc.qrySel('#progress').value = msg.data.progress * 100; // update progress bar
            }
            if (msg.data.progress == 'complete') { // completed
                doc.qrySel('#progress').value = 0; // reset progress bar
                saveAs(msg.data.plaintext, file.name.replace(/\.encrypted$/, '') + '.decrypted'); // save to file
                var t2 = performance.now();
                doc.qrySel('#decrypt-file-time').textContent = ((t2 - t1) / 1000).toFixed(3) + 's'; // display time taken
            }
        }
    };
});