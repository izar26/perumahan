<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Mengambil nilai dari tabel settings.
     * Menggunakan static cache sederhana agar tidak query berulang kali.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting($key, $default = null)
    {
        static $settings;

        if (is_null($settings)) {
            // Ambil semua settings dari DB dan jadikan collection
            // dengan 'key' sebagai indexnya.
            $settings = Setting::all()->keyBy('key');
        }

        // Kembalikan value dari key yang dicari, atau null jika tidak ada.
        return $settings->get($key)->value ?? $default;
    }
}