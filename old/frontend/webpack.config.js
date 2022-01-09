
const path = require('path');
const webpack = require('webpack');
const  HtmlWebpackPlugin   = require('html-webpack-plugin');
const { MiniCssExtractPlugin } = require('mini-css-extract-plugin');

const dotenv = require('dotenv').config( {
    path: path.join(__dirname, '.env')
  } );





module.exports = {

    entry: './src/js/index.js',
    output: {
        filename: 'main.js',
        path: path.resolve(__dirname, 'dist')

    },

    plugins: [
       new HtmlWebpackPlugin({ filename:'index.html', template: './src/index.html' }),  
       new Dotenv(),  
       new webpack.DefinePlugin( { "process.env": dotenv.parsed} ),
        new MiniCssExtractPlugin({filename: 'styles.css'})],

    module: {
        rules: [


                                {

                                                        test:/\.(sa|sc|c)ss$/,
                                                        use: [
                                                                MiniCssExtractPlugin.loader,
                                                                'css-loader',
                                                                'sass-loader'
                                                            
                                                        ]

                                },

                                {

                                                    test: /\.css$/i,
                                                    use: [ 'sytle.loader', 'css-loader']

                                },


                                {

                                    test: /\.js$/i,
                                    exclude: /node_modules/,
                                    use: {
                                        
                                        loader:'babel.loader', 
                                        options: {
                                            presets:  [ '@babel/preset-env']
                                                        }
                                        }


                }
                ]
        }
} 