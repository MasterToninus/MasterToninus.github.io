<?php
/**
 * Shared helpers for the Gunter subsection of antoniomiti.it.
 *
 * The goal of this file is to keep the individual pages small and consistent:
 * - one shared <head> block;
 * - one shared responsive navbar;
 * - one shared footer and JavaScript block;
 * - small utility functions for escaping, JSON loading and Markdown rendering.
 */


if (!function_exists('mb_strlen')) {
    /**
     * Minimal fallback for hosts without mbstring.
     * Parsedown only needs mb_strlen here to compute indentation width.
     */
    function mb_strlen(string $string, ?string $encoding = null): int
    {
        return strlen($string);
    }
}

/**
 * Escape a string for safe HTML output.
 */
function gunter_h($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/**
 * Load a JSON file and return it as an associative PHP array.
 *
 * This replaces the previous YAML-based configuration. JSON is parsed natively
 * by PHP through json_decode(), so no external YAML library is required on the
 * webhost.
 */
function gunter_load_json(string $path): array
{
    if (!file_exists($path)) {
        return [];
    }

    $contents = file_get_contents($path);
    $data = json_decode($contents, true);

    if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
        return [];
    }

    return $data;
}

/**
 * Render a Markdown file as HTML using Parsedown.
 *
 * The Parsedown library is intentionally kept in src/ for now because several
 * pages still use Markdown files as lightweight content sources. This helper
 * centralizes that small dependency, so pages do not need to instantiate
 * Parsedown directly.
 */
function gunter_render_markdown_file(string $path): string
{
    require_once __DIR__ . '/Parsedown.php';

    if (!file_exists($path)) {
        return '<p><em>Markdown file not found: ' . gunter_h($path) . '</em></p>';
    }

    $parsedown = new Parsedown();
    return $parsedown->text(file_get_contents($path));
}

/**
 * Print the shared document head.
 *
 * $basePath is the relative path from the current page to the Gunter root:
 * - './' for /gunter/index.php and /gunter/facciata.php;
 * - '../' for /gunter/hardware/index.php, /gunter/meteo/index.php, etc.
 */
function gunter_head(string $title, string $basePath = './'): void
{
    $siteRoot = $basePath . '../';
    echo '<!DOCTYPE html>' . PHP_EOL;
    echo '<html lang="en">' . PHP_EOL;
    echo '<head>' . PHP_EOL;
    echo '    <title>' . gunter_h($title) . '</title>' . PHP_EOL;
    echo '    <meta charset="utf-8">' . PHP_EOL;
    echo '    <meta http-equiv="X-UA-Compatible" content="IE=edge">' . PHP_EOL;
    echo '    <meta name="viewport" content="width=device-width, initial-scale=1">' . PHP_EOL;
    echo '    <link rel="shortcut icon" href="' . gunter_h($siteRoot) . 'img/terminal.ico" type="image/x-icon">' . PHP_EOL;
    echo '    <link rel="icon" href="' . gunter_h($siteRoot) . 'img/terminal.ico" type="image/x-icon">' . PHP_EOL;
    echo '    <link rel="stylesheet" href="' . gunter_h($siteRoot) . 'src/hacker.css">' . PHP_EOL;
    echo '    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">' . PHP_EOL;
    echo '    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/jpswalsh/academicons@1/css/academicons.min.css">' . PHP_EOL;
    echo '    <link href="https://fonts.googleapis.com/css?family=Comfortaa&amp;display=swap" rel="stylesheet">' . PHP_EOL;
    echo '    <link href="https://fonts.cdnfonts.com/css/bitwise" rel="stylesheet">' . PHP_EOL;
    echo '    <link rel="stylesheet" href="' . gunter_h($basePath) . 'src/gunter.css">' . PHP_EOL;
    echo '</head>' . PHP_EOL;
    echo '<body>' . PHP_EOL;
}

/**
 * Print the shared navbar.
 */
function gunter_navbar(string $basePath = './', string $active = ''): void
{
    $siteRoot = $basePath . '../';
    $items = [
        'eliminata' => ['Eliminata', 'eliminata.html'],
        'template' => ['Template', 'h4x0rs.html'],
        'facciata' => ['Protocollo Facciata', 'facciata.php'],
        'meteo' => ['Meteo', 'meteo/'],
        'hardware' => ['Hardware', 'hardware/'],
        'nonno' => ['Foglie Sparse', 'nonno/'],
        'gallery' => ['Photo Gallery', 'gallery/index.html#fototrappola'],
    ];

    echo '<nav class="navbar navbar-default navbar-static-top">' . PHP_EOL;
    echo '  <div class="container">' . PHP_EOL;
    echo '    <div class="navbar-header">' . PHP_EOL;
    echo '      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#gunter-navbar" aria-expanded="false" aria-controls="gunter-navbar">' . PHP_EOL;
    echo '        <span class="sr-only">Toggle navigation</span>' . PHP_EOL;
    echo '        <span class="icon-bar"></span>' . PHP_EOL;
    echo '        <span class="icon-bar"></span>' . PHP_EOL;
    echo '        <span class="icon-bar"></span>' . PHP_EOL;
    echo '      </button>' . PHP_EOL;
    echo '      <a class="navbar-brand" href="' . gunter_h($basePath) . '"><i class="fa fa-terminal"></i> M4st3r-T0n1nus</a>' . PHP_EOL;
    echo '    </div>' . PHP_EOL;
    echo '    <div id="gunter-navbar" class="navbar-collapse collapse">' . PHP_EOL;
    echo '      <ul class="nav navbar-nav navbar-right">' . PHP_EOL;
    echo '        <li class="dropdown">' . PHP_EOL;
    echo '          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu <span class="caret"></span></a>' . PHP_EOL;
    echo '          <ul class="dropdown-menu" role="menu">' . PHP_EOL;

    foreach ($items as $key => $item) {
        [$label, $href] = $item;
        $class = $active === $key ? ' class="active"' : '';
        echo '            <li' . $class . '><a href="' . gunter_h($basePath . $href) . '">' . gunter_h($label) . '</a></li>' . PHP_EOL;
    }

    echo '          </ul>' . PHP_EOL;
    echo '        </li>' . PHP_EOL;
    echo '        <li><a href="' . gunter_h($siteRoot) . '"><i class="fa fa-home"></i></a></li>' . PHP_EOL;
    echo '      </ul>' . PHP_EOL;
    echo '    </div>' . PHP_EOL;
    echo '  </div>' . PHP_EOL;
    echo '</nav>' . PHP_EOL;
}

/**
 * Print the shared footer and JavaScript includes.
 */
function gunter_footer(array $extraLines = []): void
{
    echo '<footer class="site-footer">' . PHP_EOL;
    echo '  <div class="container">' . PHP_EOL;
    foreach ($extraLines as $line) {
        echo '    <p>' . $line . '</p>' . PHP_EOL;
    }
    echo '    <p>Powered by <a href="https://github.com/Bachittarjeet/Hacker-Bootstrap-Template/" role="button">Hacker-Bootstrap-Template</a>. &copy; 2019</p>' . PHP_EOL;
    echo '    <p>Markdown rendered with <a href="https://github.com/erusev/parsedown" role="button">Parsedown</a>.</p>' . PHP_EOL;
    echo '  </div>' . PHP_EOL;
    echo '</footer>' . PHP_EOL;
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>' . PHP_EOL;
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>' . PHP_EOL;
    echo '</body>' . PHP_EOL;
    echo '</html>' . PHP_EOL;
}
