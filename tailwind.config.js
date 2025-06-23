import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import flowbite from 'flowbite/plugin'; // ← tambahkan ini

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js', // ← tambahkan ini
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'cobawarna': '#f5e9d7',
                secondary: '#F59E0B',
                'custom-gray': '#6B7280',
            },
        },
    },

    plugins: [
        forms,
        flowbite,
        require('tailwindcss-motion'),
        require('tailwindcss-intersect')  // ← tambahkan ini
    ],
};
