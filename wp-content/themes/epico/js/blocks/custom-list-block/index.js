// Filtra o bloco `Lista` para adicionar uma classe.
// @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/

function addListBlockClassName( settings, name ) {
    if ( name !== 'core/list' ) {
        return settings;
    }

    return lodash.assign( {}, settings, {
        supports: lodash.assign( {}, settings.supports, {
            className: true
        } ),
    } );
}

wp.hooks.addFilter(
    'blocks.registerBlockType',
    'epico/class-names/list-block',
    addListBlockClassName
);