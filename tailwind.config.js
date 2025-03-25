import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            backgroundImage: {
                'custom-bg': "url('/img/Image header 1.jpg')",
              },
            colors:{
                customBlue: "#2699CB",
                biruu:"#1d82a6",
                abu:"#DDDD",
                abuu:"#333",
                hijau:"#80b918",
                hijau2:'#55a630;',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
