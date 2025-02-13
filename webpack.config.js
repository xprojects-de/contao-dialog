const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('src/Resources/public/')
    .setPublicPath('/bundles/alpdeskdialog')
    .setManifestKeyPrefix('')
    .cleanupOutputBeforeBuild()
    .disableSingleRuntimeChunk()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .addEntry('alpdeskDialog', './assets/alpdeskDialog.js')
;

const alpdeskDialog = Encore.getWebpackConfig();

module.exports = [alpdeskDialog];