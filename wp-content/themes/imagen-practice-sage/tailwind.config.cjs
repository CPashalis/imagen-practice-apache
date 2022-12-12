module.exports = {
  content: ["./index.php", "./app/**/*.php", "./resources/**/*.{php,vue,js}"],
  theme: {
    fontFamily: {
      'sans': ['quicksand', 'ui-sans-serif', 'system-ui'],
      'display': ['quicksand'],
      'body': ['quicksand'],
    },
    fontSize: {
      'xs': ['12px', '18px'],
      'sm': ['14px', '24px'],
      'base': ['16px', '26px'],
      'xl': ['21px', '32px'],
      '2xl': ['28px', '36px'],
      '3xl': ['33px', '42px'],
    },
    extend: {
      colors: {
        'text-default': '#374151'
      },
    },
  },
  plugins: [],
};
