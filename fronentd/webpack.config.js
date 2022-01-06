const path = require('path');
const HtmlWebpack = require('html-webpack-plugin');
const Dotenv = require('dotenv-webpack');




module.exports = {

    entry: './src/js/index.js',
    output: {
        filename: 'main.js',
        path: path.resolve(__dirname, 'dist')

    },

    plguins: [
       new HtmlWebpack({ filename:'index.html', template: '' }),  new Dotenv() ]
}