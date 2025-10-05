// resources/js/app.js

import './bootstrap';
import Alpine from 'alpinejs';

import { Fancybox } from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

window.Alpine = Alpine;

Alpine.start();

// TAMBAHKAN KODE INI
// Ini akan secara aktif mencari semua elemen dengan atribut data-fancybox
// dan mengaktifkan lightbox pada elemen tersebut.
Fancybox.bind("[data-fancybox]", {
  // Opsi kustom bisa ditambahkan di sini jika perlu
  // Contoh:
  // Thumbs: {
  //   autoStart: false,
  // },
});