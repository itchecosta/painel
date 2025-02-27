<?php

function seoTags($page = null, $data = null, ) {

    // var_dump($data);die;

    switch ($page) {
        
        case 'blog':
            $seo = [
                'page' => 'Blog',
                'title' => 'Blog',
                'meta_description' => 'Acesse o blog ...',
                'meta_keywords' => 'blog',
                'url' => env('APP_URL').'/blog',
                'header_image' => 'img/header-contato.webp',
            ];
            break;

        case 'post':
            $seo = [
                'page' => 'Blog',
                'title' => 'Blog',
                'meta_description' => 'Acesse o blog ...',
                'meta_keywords' => 'blog',
                'url' => env('APP_URL').'/blog',
                'header_image' => 'img/header-contato.webp',
            ];
            break;
        
        default:
            $seo = [
                'page' => 'Home',
                'title' => '',
                'meta_description' => 'Bem-vindo',
                'meta_keywords' => '',
                'url' => env('APP_URL'),
                // 'header_image' => env('APP_URL').'/img/logo/logo2.webp',
            ];
            break;
    }

    return $seo;
}
