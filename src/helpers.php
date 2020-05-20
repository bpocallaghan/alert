<?php

if (!function_exists('alert')) {

    /**
     * Helper alert()->info() without facade: Alert::info()
     *
     * @param null        $title
     * @param null        $content
     * @param bool|string $icon
     * @return \Illuminate\Foundation\Application|mixed
     */
    function alert($title = null, $content = null, $icon = true)
    {
        $notifier = app('alert');

        if (!is_null($title)) {
            return $notifier->info($title, $content, $icon);
        }

        return $notifier;
    }
}

if (!function_exists('alert_icon')) {

    /**
     * Get the icon for the notify level
     *
     * @param $level
     * @return string
     */
    function alert_icon($level)
    {
        switch ($level) {
            case 'danger':
                return 'fas fa-fw fa-times';
                break;
            case 'warning':
                return 'fas fa-fw fa-warning';
                break;
            case 'success':
                return 'fas fa-fw fa-check';
                break;
            default: // info / default
                return 'fas fa-fw fa-info';
                break;
        }
    }
}
