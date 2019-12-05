# barcodeScanner
Scan barcodes for TSD via browser

Some files can provide scanning barcodes from TSD and send it on server. Server receive this codes, then send to web service.

Support:

    - TSD Motorolla MC3000, MC3190, and etc. like Symbol MC3000, MC3190.

Requiments:

    Client:
        - Internet Explorer with JavaScript support

    Server:
        - PHP 7 (lower versions not tested)
        - Apache or any other HTTP server

    Destination WebService:
        - SOAP server

Installation:

    No specified instruction defined.


How its work:

    Open in browser page from you own server with path to index.php file.
    Scan barcodes.
    Wait for uploading barcodes to webservice.
    Done.


    GS1 ScanCode has this simbols

    Таблица 1 – Допустимые символы КМ (Valid characters IC): 

    ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!"%&'()*+,-./_:;=<>?