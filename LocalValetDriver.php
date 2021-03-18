<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/**
 * This is the local valet driver class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
final class LocalValetDriver extends BasicValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param string $sitePath
     * @param string $siteName
     * @param string $uri
     *
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return is_dir($sitePath.'/vendor/wordplate/framework');
    }

    /**
     * Determine if the incoming request is for a static file.
     *
     * @param string $sitePath
     * @param string $siteName
     * @param string $uri
     *
     * @return false|string
     */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        $uri = $this->rewriteMultisite($sitePath, $uri);

        $staticFilePath = $sitePath.'/public'.$uri;

        if ($this->isActualFile($staticFilePath)) {
            return $staticFilePath;
        }

        return false;
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param string $sitePath
     * @param string $siteName
     * @param string $uri
     *
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        $uri = $this->rewriteMultisite($sitePath, $uri);

        $_SERVER['PHP_SELF'] = $uri;
        $_SERVER['SERVER_NAME'] = $_SERVER['HTTP_HOST'];

        if (strpos($uri, '/wordpress/') === 0) {
            return is_dir($sitePath.'/public'.$uri)
                            ? $sitePath.'/public'.$this->forceTrailingSlash($uri).'/index.php'
                            : $sitePath.'/public'.$uri;
        }
        return $sitePath.'/public/index.php';
    }

    /**
     * Redirect to uri with trailing slash.
     *
     * @param  string $uri
     *
     * @return string
     */
    private function forceTrailingSlash($uri)
    {
        if (substr($uri, -1 * strlen('/wordpress/wp-admin')) == '/wordpress/wp-admin') {
            header('Location: '.$uri.'/'); die;
        }
        return $uri;
    }

    /**
     * Determine if Bedrock installer is Multisite
     *
     * @param $sitePath
     * @return bool
     */
    protected function isMultisite($sitePath)
    {
        $wp_config_path = $sitePath . "/public/wp-config.php";
        $env_path = $sitePath . "/.env";
        if (preg_match("/^define\(\s*('|\")MULTISITE\\1\s*,\s*true\s*\)/mi",
                file_get_contents($wp_config_path))
            or (file_exists($env_path) and preg_match("/^WP_MULTISITE=true$/mi",
                file_get_contents($env_path)))
        ) {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Imitate the rewrite rules for a multisite .htaccess
     *
     * @param $sitePath
     * @param $uri
     * @return string
     */
    protected function rewriteMultisite($sitePath, $uri)
    {
        if (!$this->isMultisite($sitePath)) {
            return $uri;
        }

        if (preg_match('/^(.*)?(\/wp-(content|admin|includes).*)/', $uri, $matches)) {
            //RewriteRule ^([_0-9a-zA-Z-]+/)?(wp-(content|admin|includes).*) $2 [L]
            $uri = "/wordpress{$matches[2]}";
        } elseif (preg_match('/^(.*)?(\/.*\.php)$/', $uri, $matches)) {
            //RewriteRule ^([_0-9a-zA-Z-]+/)?(.*\.php)$ $2 [L]
            $uri = "/wordpress{$matches[2]}";
        }

        return $uri;
    }
}
