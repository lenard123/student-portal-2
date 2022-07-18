const daisyUI = require('daisyui')
const flowbite = require('flowbite/plugin')
const defaultTheme = require('tailwindcss/defaultTheme')
const daisyUITheme = require("daisyui/src/colors/themes")
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./templates/**/*.php",
        "./node_modules/flowbite/**/*.js"
    ],

    safelist: [
        'w-64',
        'w-1/2',
        'rounded-l-lg',
        'rounded-r-lg',
        'bg-gray-200',
        'grid-cols-4',
        'grid-cols-7',
        'h-6',
        'leading-6',
        'h-9',
        'leading-9',
        'shadow-lg'
    ],

    theme: {
        container: {
            center: true,
            padding: '1rem'
        },
        extend: {
            fontFamily: {
                'inter': ['Inter', ...defaultTheme.fontFamily.sans]
            }
        },
    },
    plugins: [
        daisyUI,
        flowbite
    ],
    daisyui: {
        themes: [
            {
                light: {
                    ...daisyUITheme["[data-theme=light]"],
                    primary: colors.green['500'],
                }
            }
        ]
    },
}
