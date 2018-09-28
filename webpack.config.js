// output.pathに絶対パスを指定する必要があるため、pathモジュールを読み込んでおく
const path = require('path');
const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');//CSSを別ファイルに出力
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');

module.exports = [
  //css
  {
    context: path.join(__dirname, '/htdocs'),
    entry: __dirname + '/htdocs/assets/css/sass/style.scss',
    output: {
        path: __dirname + '/htdocs/assets/css/',
        filename: 'style.css'
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                  fallback: 'style-loader',
                  use: [
                    {
                      loader: 'css-loader',
                      options: { sourceMap: true, minimize: true }
                    },
                    {
                      loader: 'postcss-loader',
                      options: { 
                        sourceMap: true,
                        plugins: [
                          // Autoprefixerを有効化
                          // ベンダープレフィックスを自動付与する
                          require('autoprefixer')({grid: true})
                        ]
                      }
                    },
                    {
                      loader: 'sass-loader',
                      options: { sourceMap: true }
                    }
                  ]
                })
            },
            { test: /\.svg(\?v=\d+\.\d+\.\d+)?$/, loader: 'url-loader?mimetype=image/svg+xml' },
            { test: /\.woff(\d+)?(\?v=\d+\.\d+\.\d+)?$/, loader: 'url-loader?mimetype=application/font-woff' },
            { test: /\.eot(\?v=\d+\.\d+\.\d+)?$/, loader: 'url-loader?mimetype=application/font-woff' },
            { test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/, loader: 'url-loader?mimetype=application/font-woff' }
        ],
    },
    devtool: 'source-map',
    plugins: [
        new ExtractTextPlugin('style.css')
    ]
  },

  //js
  {
    // モードの設定、v4系以降はmodeを指定しないと、webpack実行時に警告が出る
    // mode: 'production',
    // mode: 'development',

    context: __dirname + '/htdocs',
    entry: __dirname + '/htdocs/assets/js/babel/script.js',
    output: {
      path: __dirname + '/htdocs/assets/js/',
      filename: 'bundle.js',
    },
    optimization: {
      minimizer: [
        new UglifyJSPlugin({
          uglifyOptions: {
            compress: {
              drop_console: true
            }
          }
        })
      ]
    },
    // plugins: [
    //   new webpack.ProvidePlugin({
    //     //jquery読み込み
    //     $: 'jquery',
    //     jQuery: 'jquery'
    //   })
    // ],

    module: {
      rules: [
        { 
          test: /\.js$/, 
          exclude: /node_modules/, 
          loader: "babel-loader", 
          query:{
            presets: ['react', 'es2015']
          }
        }
      ]
    }
  },


]