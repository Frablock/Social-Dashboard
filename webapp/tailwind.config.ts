import type { Config } from 'tailwindcss';

export default {
  content: ['./src/**/*.{html,js,svelte,ts}'],

  theme: {
    extend: {
      colors: {
        background: "#F9F9F9",
        primary: "#7b13d6",
        secondary: "#FFFFFF"
      },
    }
  },

  plugins: []
} satisfies Config;
