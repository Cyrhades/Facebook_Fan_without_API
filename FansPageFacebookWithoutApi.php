<?php
namespace Cyrhades;

class FansPageFacebookWithoutApi 
{
    /**
     * Cette méthode permet de récupérer le nombre de like sur une page 
     * facebook sans utiliser l'api facebook.
     */
    public static function get($idPage) 
    {
        // On crée le context minimum pour obtenir le plugin (laissez Accept-language: en surtout car utilisé dans un preg_match )
        $context = stream_context_create([
            'http'=>array(
                'method' => "GET",
                'header' => "Accept-language: en\r\n" .
                            "User-Agent: Mozilla /5.0 (Compatible MSIE 9.0;Windows NT 6.1;WOW64; Trident/5.0)\r\n"
            )
        ]);

        // on appel le plugin
        $contentPluginLike = file_get_contents('https://www.facebook.com/v2.5/plugins/like.php?href=https://facebook.com/'.$idPage, false, $context);	
        
        // on capture le nombre avant le texte "people like this" (nécessaite Accept-language: en dans les entetes)
        if(preg_match('/(\d+) people like this/i', $contentPluginLike, $out)) {
            return $out[1]; // permet de retourner le nombre de like sur une page Facebook
        }

        return 0; // on retourne 0 si on a pas trouvé
    }
}
