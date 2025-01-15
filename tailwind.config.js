import { plugin } from 'postcss';
import defaultTheme from 'tailwindcss/defaultTheme';
import plugin from 'tailwindcss/plugin';
import { twMerge } from 'tailwindcss/merge';
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    safelist: [
        'animate-in',
        'animate-out',
        ...['left', 'right', 'top', 'bottom'].flatMap(dir => [
            `slide-in-from-${dir}`,
            `slide-out-to-${dir}`
        ]),
        'backdrop:animate-in',
        'backdrop:animate-out',
        'backdrop:fade-in',
        'backdrop:fade-out',
        ...[75, 100, 150, 200, 300, 500, 700, 1000].flatMap(duration => [
            `duration-${duration}`,
            `backdrop:duration-${duration}`
        ]),
        ...[50, 100, 200, 300, 400, 500, 600, 700, 800, 900, 950].flatMap(shade => [
            `bg-primary-${shade}`,
            `hover:bg-primary-${shade}`,
            `text-primary-${shade}`,
            `border-primary-${shade}`,
        ]),
        ...[50, 100, 200, 300, 400, 500, 600, 700, 800, 900, 950].flatMap(shade => [
            `bg-secondary-${shade}`,
            `hover:bg-secondary-${shade}`,
            `text-secondary-${shade}`,
            `border-secondary-${shade}`,
        ])
    ],
    theme: {
        colors: {
            ...colors,
            primary: {
                ...colors.teal,
                DEFAULT: colors.teal[700],
                hover: colors.teal[800],
                dark: colors.teal[600],
                'dark-hover': colors.teal[700]
            },
            secondary: {
                ...colors.gray,
                DEFAULT: colors.gray[800],
                hover: colors.gray[900],
                dark: colors.gray[800],
                'dark-hover': colors.gray[700]
            },


            style1: {
                DEFAULT: colors.gray[800],
                hover: colors.gray[800],
                dark: colors.gray[800],
                'dark-hover': colors.gray[800],
            },
            style2: {
                DEFAULT: colors.gray[800],
                hover: colors.gray[800],
                dark: colors.gray[800],
                'dark-hover': colors.gray[800],
            }
        },
        extend: {
            keyframes: {
                'btn-add-to-cart': {
                    '0%': { 
                        background: '#dc2626',
                        boxShadow: '0 0 0 4px rgba(220, 38, 38, 0.5)'
                    },
                    '50%': { 
                        background: '#16a34a',
                        boxShadow: '0 0 0 4px rgba(22, 163, 74, 0.5)'
                    },
                    '100%': { 
                        background: '#dc2626',
                        boxShadow: '0 0 0 4px rgba(220, 38, 38, 0.5)'
                    }
                }
            },
            animation: {
                'btn-add-to-cart': 'btn-add-to-cart 2s ease-in-out'
            }
        },
    },
    darkMode: 'media', // 'class' or 'media'
    plugins: [
        require("tailwindcss-animate"),
        // require('tailwind-scrollbar'),
        plugin(function ({ addVariant, addUtilities }) {
            addVariant('popover-open', '&:popover-open');
            addVariant('starting', '@starting-style');
            addVariant('dialog-open', '&[open]');
            addVariant('dialog-not-open', '&:not([open])');
            addVariant('scrollbar', '&::-webkit-scrollbar');
            addVariant('scrollbar-thumb', '&::-webkit-scrollbar-thumb');
            addVariant('scrollbar-track', '&::-webkit-scrollbar-track');
            addUtilities({
                '.transition-discrete': {
                    transitionBehavior: 'allow-discrete',
                },
                '.scrollbar-thumb-radius-4': {
                    '&::-webkit-scrollbar-thumb': {
                        'border-radius': '4px',
                        'background-color': '#ccc',
                    },
                },
                '.scrollbar-thumb-radius-8': {
                    '&::-webkit-scrollbar-thumb': {
                        'border-radius': '8px',
                        'background-color': '#ccc',
                    },
                },
                '.scrollbar-width-2': {
                    '&::-webkit-scrollbar': {
                        'width': '2px',
                    },
                },
                '.scrollbar-width-4': {
                    '&::-webkit-scrollbar': {
                        'width': '4px',
                    },
                },
                '.scrollbar-width-6': {
                    '&::-webkit-scrollbar': {
                        'width': '6px',
                    },
                }
            });
        }),
    ],
};
