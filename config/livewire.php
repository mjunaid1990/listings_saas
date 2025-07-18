<?php

return [
    // The namespace where your Livewire components will be located
    'class_namespace' => 'App\\Http\\Livewire',

    // The directory where your Livewire components will be located
    'view_path' => resource_path('views/livewire'),

    // The default layout that should be used by Livewire components
    'layout' => null,

    // The URL where Livewire assets should be loaded from
    'asset_url' => null,

    // Whether to include a version query string in asset URLs
    'asset_version_query_string' => false,

    // The version number to use in asset URLs
    'asset_version' => null,

    // The TTL for asset version cache
    'asset_version_cache_ttl' => 3600,

    // The cache key for asset version
    'asset_version_cache_key' => 'livewire_asset_version',

    // The cache store to use for asset version
    'asset_version_cache_store' => 'file',

    // The cache tags for asset version
    'asset_version_cache_tags' => [],

];
