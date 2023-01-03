const tailwindui = require('@tailwindcss/ui')

module.exports = {
    theme: {
        extend: {},
    },
    variants: {
        translate: ({after}) => after(['group-hover'])
    },
    plugins: [tailwindui],
}