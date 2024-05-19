const Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore

    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('js/app', [
        './assets/js/app.js',
        './node_modules/bootstrap/dist/js/bootstrap.min.js'
    ])
    .addStyleEntry('css/app', [
        './assets/css/app.css',
        './node_modules/bootstrap/dist/css/bootstrap.min.css'
    ])
    .splitEntryChunks()
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .configureBabelPresetEnv((config) => {
        config.useBuiltIns = 'usage';
        config.corejs = '3.23';
    });


module.exports = Encore.getWebpackConfig();
