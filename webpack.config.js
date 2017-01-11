/*!
 * webpack config - xui
 * xiewulong <xiewulong@vip.qq.com>
 * create: 2016/11/21
 * since: 0.0.1
 */
const PATH = require('path');
const FS = require('fs');
const BASE_PATH = __dirname;

const PROD = process.argv.indexOf('-p') >= 0 || process.argv.indexOf('--optimize-minimize') >= 0;
const ENV = PROD ? 'production' : 'development';
const MIN = PROD ? '.min' : '';

let webpack = require('webpack');
let webpackExtractTextPlugin = require('extract-text-webpack-plugin');
let webpackConfig = {
	devtool: PROD ? '#source-map' : '#eval-source-map',

	entry: {
		Admin: PATH.join(BASE_PATH, 'js', 'Admin'),
		BackTop: PATH.join(BASE_PATH, 'js', 'BackTop'),
		FullscreenBackground: PATH.join(BASE_PATH, 'js', 'FullscreenBackground'),
		TopTips: PATH.join(BASE_PATH, 'js', 'TopTips'),
	},

	output: {
		path: PATH.join(BASE_PATH, 'dist', 'js'),
		filename: `[name]${MIN}.js`,
	},

	resolve: {
		// extensions: ['.js', '.web.js', '.webpack.js'],
	},

	externals: {
		// moduleName: 'importModuleName',
	},

	module: {
		loaders: [
			{
				test: /\.scss$/,
				loader: webpackExtractTextPlugin.extract('style', 'css?sourceMap!postcss!sass?sourceMap'),
			},
			{
				test: /\.js[x]?$/,
				loader: 'babel',
				exclude: /node_modules/,
			},
			{
				test: /\.(gif|jpg|png)$/,
				loader: 'url',
				query: {
					limit: 8192,
					name: '../images/[name].[ext]',
				},
			},
		],
	},

	postcss: [
		require('autoprefixer'),
	],

	plugins: [
		new webpack.DefinePlugin({
			'process.env': {
				NODE_ENV: `'${ENV}'`,
			},
		}),
		new webpack.optimize.OccurrenceOrderPlugin(),
		new webpackExtractTextPlugin(PATH.join('..', 'css', `[name]${MIN}.css`))
	],
};

if(PROD) {
	webpackConfig.plugins.push(new webpack.optimize.UglifyJsPlugin({
		compress: {
			warnings: false,
		},
		sourceMap: true,
	}));
}

module.exports = webpackConfig;
