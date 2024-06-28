<?php

if (!function_exists('get_path_from_url')) {
    /**
     * @param string|null $value
     * @return void
     */
    function get_path_from_url($value, $replacement = [], $to = '')
    {
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            $url = parse_url($value);
            $value = str_replace($replacement, $to, $url['path']);
        }

        return $value;
    }
}

if (!function_exists('__badge')) {
    function __badge($value)
    {
        $color = $value ? 'var(--bs-success)' : 'var(--bs-danger)';
        return "<span class=\"badge-status\" style=\"background-color: {$color}\"></span>";
    }
}
