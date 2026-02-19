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
    .copyFiles({
        from: './assets/images',
        to: 'images/[path][name].[hash:8].[ext]',
        pattern: /\.(png|jpg|jpeg|gif|svg)$/
    })
;

const alpdeskDialog = Encore.getWebpackConfig();

module.exports = [alpdeskDialog];