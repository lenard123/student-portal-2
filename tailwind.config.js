const daisyUI = require('daisyui')
const defaultTheme = require('tailwindcss/defaultTheme')
const daisyUITheme = require("daisyui/src/colors/themes")
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./templates/**/*.php"
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
        daisyUI
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
