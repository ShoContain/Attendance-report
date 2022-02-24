const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const path = require('path');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })
    .browserSync({
        files: [
            './resources/**/*',
            './public/**/*',
        ],
        proxy: {
            target: "http://127.0.0.1/",
        },
        open: false,
        reloadOnRestart: false,
     })
    .webpackConfig({
        resolve:{
            alias:{
                '@': path.join(__dirname, '/resources/js'),
            }
        },
        module: {
            rules: [
                {
                    test: /\.m?js/,
                    resolve: {
                        fullySpecified: false
                    }
                },
            ]
        }
    });
