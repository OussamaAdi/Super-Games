<?php
// Small helpers used by every page.

// Escape text for HTML output.
function e($text)
{
    return htmlspecialchars((string) $text, ENT_QUOTES, "UTF-8");
}

// Link to one of our own CSS/JS files, with its last-change time added so
// browsers fetch the new version after an edit instead of a cached copy.
function asset($path)
{
    $file = __DIR__ . "/../" . $path;
    return file_exists($file) ? $path . "?v=" . filemtime($file) : $path;
}

// Send the browser to another page and stop.
function redirect($url)
{
    header("Location: " . $url);
    exit;
}
