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
            case 'error':
                return 'fas fa-fw fa-times';
                break;
            case 'warning':
                return 'fas fa-fw fa-warning';
                break;
            case 'success':
                return 'fas fa-fw fa-check';
                break;
            case 'info':
                return 'fas fa-fw fa-info';
                break;
            case 'primary':
                return 'fas fa-fw fa-star';
                break;
            case 'secondary':
                return 'fas fa-fw fa-circle';
                break;
            case 'notice':
                return 'fas fa-fw fa-bell';
                break;
            case 'light':
                return 'fas fa-fw fa-sun';
                break;
            case 'dark':
                return 'fas fa-fw fa-moon';
                break;
            default: // fallback to info
                return 'fas fa-fw fa-info';
                break;
        }
    }
}
