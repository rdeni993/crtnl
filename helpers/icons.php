<?php 

/**
 * 
 * Create Icon for uploaded file
 * based on file mimetype
 * 
 */

if( ! function_exists( 'filetype_icon' ) )
{
    function filetype_icons( string $mime ) : string
    {
        $icon = '';

        switch($mime)
        {
            case 'application/pdf' : 
            {
                $icon .= 'fa-solid fa-file-pdf';
            } break;

            case 'application/zip' : 
            {
                $icon .= 'fa-solid fa-file-zipper';
            } break;

            default :
            {
                $icon .= 'fa-file';
            }
        }

        return $icon;
    }
}