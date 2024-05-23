import daisyui from 'daisyui'
/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.{js,svelte,php}"],
    theme: {
        extend: {},
    },
    plugins: [daisyui],
    daisyui: {
        themes: ['light']
    }
};
