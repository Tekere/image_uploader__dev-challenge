module.exports = {
  plugins: ["vue"],
  extends: ["eslint:recommended", "plugin:vue/recommended"],
  rules: {
    "vue/html-closing-bracket-newline": [2, { multiline: "always" }],
    "no-extra-parens": 1,
    "no-multi-spaces": 2,
    "no-multiple-empty-lines": [2, { max: 1 }],
    "func-call-spacing": [2, "never"],
    "no-unneeded-ternary": 2,
    quotes: [2, "double"],
    "no-var": 2,
    indent: [2, 2],
    "space-in-parens": [2, "never"],
    "no-console": 0,
    "comma-spacing": 2,
    "computed-property-spacing": 2,
    "key-spacing": 2,
    "keyword-spacing": 2,
    "no-multi-spaces": 2,
    "vue/singleline-html-element-content-newline": "off",
    "vue/max-attributes-per-line": "off",
    "vue/html-self-closing": "off"
  }
}
