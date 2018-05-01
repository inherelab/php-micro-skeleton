<?php

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

/**
 * @param $key
 * @param array $args
 * @param null $lang
 * @return mixed
 */
function tl($key, array $args = [], $lang = null)
{
    /** @see \Toolkit\Collection\Language::translate() */
    return \Mco::$di->get('lang')->translate($key, $args, $lang);
}

/**
 * @param $path
 * @return bool|string
 */
function alias_path($path)
{
    return \Mco::alias($path);
}

/**
 * @param null $subPath
 * @return string
 */
function get_path($subPath = null)
{
    return $subPath ? (BASE_PATH . '/' . $subPath) : BASE_PATH;
}

function app_plugin()
{
}

/**
 * @param null|string $key
 * @param mixed $default
 * @return mixed|\Inhere\Library\Collections\Configuration
 */
function app_config($key = null, $default = null)
{
    if (!$key) {
        return \Mco::$di->get('config');
    }

    return \Mco::$di->get('config')->get($key, $default);
}

