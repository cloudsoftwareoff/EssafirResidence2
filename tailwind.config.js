/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./includes/**/*.php",
    "./assets/js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        terra: { DEFAULT: '#B31E2B', dark: '#7A0F18', light: '#D9A79A' },
        olive: { DEFAULT: '#4A0E14', light: '#6B1620', mid: '#7A1B22' },
        sandstone: '#FBF6EE',
        charcoal: '#241512',
        'clay-muted': '#6E524A',
        'sand-border': '#EAD9C3',
        'sand-dark': '#D8B98F',
        brass: { DEFAULT: '#B8935A', light: '#D9BE8F' },
        whatsapp: { DEFAULT: '#25D366', hover: '#1DA851' }
      },
      fontFamily: {
        serif: ['Cormorant Garamond', 'Georgia', 'serif'],
        sans: ['Jost', 'system-ui', 'sans-serif'],
        arabic: ['Cairo', 'sans-serif'],
        'arabic-serif': ['Amiri', 'serif'],
      },
      borderRadius: {
        'arch': '160px 160px 0 0',
        'arch-sm': '100px 100px 0 0',
      },
      transitionTimingFunction: {
        'out-expo': 'cubic-bezier(0.16, 1, 0.3, 1)',
      }
    }
  },
  plugins: [],
}
