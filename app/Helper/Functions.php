<?php

use Inhere\Library\Components\Language;

function app($id = null)
{
    if ($id) {
        return \Mco::$di->get($id);
    }

    return \Mco::$app;
}

function di($name = null)
{
    if ($name) {
        return \Mco::$di->get($name);
    }

    return \Mco::$di;
}

function container($name = null)
{
    if ($name) {
        return \Mco::$di->get($name);
    }

    return \Mco::$di;
}

function tl($key, array $args = [], $lang = null)
{
    /** @see Language::translate() */
    return \Mco::$di->get('lang')->translate($key, $args, $lang);
}

function alias_path($path)
{
    return \Mco::alias($path);
}

function get_path($subPath = null)
{
    return $subPath ? (BASE_PATH . '/' . $subPath) : BASE_PATH;
}

function app_plugin()
{
}

