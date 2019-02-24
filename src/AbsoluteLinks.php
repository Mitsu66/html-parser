<?php

function rel2abs( $rel, $base ) {

// parse base URL  and convert to local variables: $scheme, $host,  $path
extract( parse_url( $base ) );

if ( strpos( $rel,"//" ) === 0 ) {
    return $scheme . ':' . $rel;
}

// return if already absolute URL
if ( parse_url( $rel, PHP_URL_SCHEME ) != '' ) {
    return $rel;
}

// queries and anchors
if ( $rel[0] == '#' || $rel[0] == '?' ) {
    return $base . $rel;
}

// remove non-directory element from path
$path = preg_replace( '#/[^/]*$#', '', $path );

// destroy path if relative url points to root
if ( $rel[0] ==  '/' ) {
    $path = '';
}

// dirty absolute URL
$abs = $host . $path . "/" . $rel;

// replace '//' or  '/./' or '/foo/../' with '/'
$abs = preg_replace( "/(\/\.?\/)/", "/", $abs );
$abs = preg_replace( "/\/(?!\.\.)[^\/]+\/\.\.\//", "/", $abs );

// absolute URL is ready!
return $scheme . '://' . $abs;