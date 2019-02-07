// Ícone do plugin para a janela de atualização
// License GPL2+
(function ($) {
    "use strict";

    $(function () {

    	var path    = ufEpico.pluginsUrl;
    	var version = ufEpico.pluginVersion;

        $( '#update-plugins-table .plugin-title strong:contains("Épico")').prev().replaceWith( '<img src="' + path + '/uf-epico/assets/icon-256x256.svg?rev=' + version + '" alt="Plugin Épico">' );

    });
}(jQuery));
