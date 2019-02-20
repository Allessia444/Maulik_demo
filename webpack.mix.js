const mix = require('laravel-mix');

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
mix.styles(['public/styles/style.css',
			'public/plugins/datatables/media/css/jquery.dataTables.css',
			'public/plugins/datatables/media/css/dataTables.bootstrap4.css',
			'public/plugins/datatables/media/css/responsive.dataTables.css'
			], 'public/css/admin.css');
mix.scripts(['public/scripts/script.js',
			'public/plugins/datatables/media/js/jquery.dataTables.min.js',
			'public/plugins/datatables/media/js/dataTables.bootstrap4.js',
			'public/plugins/datatables/media/js/dataTables.responsive.js',
			'public/plugins/datatables/media/js/responsive.bootstrap4.js',
			'public/plugins/datatables/media/js/button/dataTables.buttons.js',
			'public/plugins/datatables/media/js/button/buttons.bootstrap4.js',
			'public/plugins/datatables/media/js/button/buttons.print.js',
			'public/plugins/datatables/media/js/button/buttons.html5.js',
			'public/plugins/datatables/media/js/button/buttons.flash.js',
			'public/plugins/datatables/media/js/button/pdfmake.min.js',
			'public/plugins/datatables/media/js/button/vfs_fonts.js',
			], 'public/js/admin.js');
   // .sass('public/styles/style.css', 'public/css/admin.css');
