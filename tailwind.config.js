import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // KITA TAMBAHKAN WARNA MOCKUP DISINI
            colors: {
                textile: {
                    primary: '#4E342E',   // Cokelat Tua (Sidebar)
                    secondary: '#5D4037', // Cokelat Sedang
                    light: '#D7CCC8',     // Krem/Cokelat Muda (Background)
                    accent: '#8D6E63',    // Aksen tombol
                }
            }
        },
    },

    plugins: [forms],
};