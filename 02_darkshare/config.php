<?php

/*
Dit is de config met vaste variabelen. We gebruiken hervoor een const.
Een const is een variabele waarbij de waarde niet veranderd in de applicatie.
Voordeel is dat deze wel beschikbaar is in elke functie en je dus niet global moet gebruiken... 
*/

const UPLOAD_PATH = 'uploads';
const IMG_CONTENT_TYPES = ['image/jpeg','image/png','image/gif','image/svg+xml','image/bmp'];
const TXT_CONTENT_TYPES = ['text/plain','text/html','text/markdown', 'text/xml'];
const SAFE_CONTENT_TYPES = ['image/jpeg','image/png','image/gif','image/svg+xml','image/bmp','text/html','text/markdown', 'text/plain', 'text/xml','application/pdf','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
