// Funções para o painel Capture
// Licence GPL2+
(function ($) {
    'use strict';
    $( function () {

        $( '#field_email_service' ).change( function() {

            var $selected_values = $( this ).val();
            var $find_parent     = $( this ).parent().parent().parent().find( $( 'tr' ) );
            var $show_field      = 'uf-show-field';
            var $hide_field      = 'uf-hide-field';
            var $child_0         = ':nth-child(1)';                                                                                                     // Sem selecao
            var $child_1         = ':nth-child(1),:nth-child(2),:nth-child(21)';                                                                        // MailChimp, Madmimi, Arpreach
            var $child_2         = ':nth-child(1),:nth-child(3),:nth-child(5),:nth-child(6),:nth-child(21)';                                            // Aweber
            var $child_3         = ':nth-child(1),:nth-child(3),:nth-child(5),:nth-child(18),:nth-child(21)';                                           // Campaign Monitor
            var $child_4         = ':nth-child(1),:nth-child(2),:nth-child(3),:nth-child(7),:nth-child(8),:nth-child(9),:nth-child(21),:nth-child(22)'; // e-Goi
            var $child_5         = ':nth-child(1),:nth-child(5),:nth-child(10),:nth-child(17),:nth-child(21)';                                          // Get Response
            var $child_6         = ':nth-child(1),:nth-child(2),:nth-child(3),:nth-child(5),:nth-child(7),:nth-child(21),:nth-child(24)';               // Mailee.Me
            var $child_7         = ':nth-child(1),:nth-child(2),:nth-child(3),:nth-child(21)';                                                          // Sendy
            var $child_8         = ':nth-child(1),:nth-child(2),:nth-child(3),:nth-child(21),:nth-child(5),:nth-child(11),:nth-child(24)';              // Mail Relay
            var $child_9         = ':nth-child(1),:nth-child(18),:nth-child(21)';                                                                       // Klick Mail
            var $child_10        = ':nth-child(1),:nth-child(2),:nth-child(7),:nth-child(21)';                                                          // ActiveCampaign
            var $child_11        = ':nth-child(1),:nth-child(5),:nth-child(10),:nth-child(21)';                                                         // Benchmark, Lahar
            var $child_12        = ':nth-child(1),:nth-child(5),:nth-child(8),:nth-child(11),:nth-child(14),:nth-child(21)';                            // Trafficwave
            var $child_13        = ':nth-child(1),:nth-child(5),:nth-child(7),:nth-child(18),:nth-child(21)';                                           // Infusionsoft
            var $child_14        = ':nth-child(1),:nth-child(2),:nth-child(5),:nth-child(9),:nth-child(21),:nth-child(22),:nth-child(25)';              // Google Forms
            var $child_15        = ':nth-child(1),:nth-child(7),:nth-child(12),:nth-child(15),:nth-child(21)';                                          // Mailster
            var $child_16        = ':nth-child(1),:nth-child(7),:nth-child(12),:nth-child(21)';                                                         // LeadLovers
            var $child_17        = ':nth-child(1),:nth-child(3),:nth-child(5),:nth-child(12),:nth-child(21),:nth-child(23)';                            // MailPoet
            var $child_18        = ':nth-child(1),:nth-child(2),:nth-child(7),:nth-child(21)';                                                          // Mautic
            var $child_19        = ':nth-child(1),:nth-child(19),:nth-child(21)';                                                                       // Integracao personalizada
            var $child_20        = ':nth-child(1),:nth-child(5),:nth-child(21)';                                                                        // RD Station

            switch ( $( this ).val() ) {
                case '1':
                case '3':
                case '10':  // MailChimp, Madmimi, Arpreach
                    $find_parent.filter( $child_1 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_1 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '2':  // Aweber
                    $find_parent.filter( $child_2 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_2 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '4': // Campaign Monitor
                    $find_parent.filter( $child_3 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_3 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '5': // e-Goi
                    $find_parent.filter( $child_4 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_4 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '6': // Get Response
                    $find_parent.filter( $child_5 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_5 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '7': // Mailee.Me
                    $find_parent.filter( $child_6 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_6 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '8':  // Mail Relay
                    $find_parent.filter( $child_8 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_8 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '14':  // Sendy
                    $find_parent.filter( $child_7 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_7 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '9':  // Klick Mail
                    $find_parent.filter( $child_9 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_9 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '11':  // ActiveCampaign
                    $find_parent.filter( $child_10 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_10 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '12':  // RD Station
                    $find_parent.filter( $child_20 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_20 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '13':  // Lead Lovers
                    $find_parent.filter( $child_16 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_16 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '15':  // Benchmark
                case '22':  // Lahar
                    $find_parent.filter( $child_11 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_11 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '16':  // Mailster
                    $find_parent.filter( $child_15 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_15 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '17': // Trafficwave
                    $find_parent.filter( $child_12 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_12 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '18': // Infusionsoft
                    $find_parent.filter( $child_13 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_13 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '19': // Google Forms
                    $find_parent.filter( $child_14 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_14 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '20': // MailPoet
                    $find_parent.filter( $child_17 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_17 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '21': // Mautic
                    $find_parent.filter( $child_18 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_18 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                case '999': // Integracao personalizada
                    $find_parent.filter( $child_19 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_19 ).addClass( $hide_field).removeClass( $show_field  );
                    break;
                default:   // Sem selecao
                    $find_parent.filter( $child_0 ).addClass( $show_field ).removeClass( $hide_field );
                    $find_parent.not( $child_0 ).addClass( $hide_field).removeClass( $show_field  );
                }
        }).change();
    });
}( jQuery ));
