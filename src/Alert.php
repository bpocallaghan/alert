<?php

namespace Bpocallaghan\Alert;

use Illuminate\Session\Store;

class Alert
{
    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function info($title, $content = '', $icon = true, $showOnce = false, $close = true, $timeout = 5000)
    {
        $this->message($title, $content, $icon, $showOnce, 'info', $close, $timeout);
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function success($title, $content = '', $icon = true, $showOnce = false, $close = true, $timeout = 5000)
    {
        $this->message($title, $content, $icon, $showOnce, 'success', $close, $timeout);
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function error($title, $content = '', $icon = true, $showOnce = false, $close = true, $timeout = 5000)
    {
        $this->message($title, $content, $icon, $showOnce, 'danger', $close, $timeout);
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function danger($title, $content = '', $icon = true, $showOnce = false, $close = true, $timeout = 5000)
    {
        $this->message($title, $content, $icon, $showOnce, 'danger', $close, $timeout);
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function warning($title, $content = '', $icon = true, $showOnce = false, $close = true, $timeout = 5000)
    {
        $this->message($title, $content, $icon, $showOnce, 'warning', $close, $timeout);
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function primary($title, $content = '', $icon = true, $showOnce = false, $close = true, $timeout = 5000)
    {
        $this->message($title, $content, $icon, $showOnce, 'primary', $close, $timeout);
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function secondary($title, $content = '', $icon = true, $showOnce = false, $close = true, $timeout = 5000)
    {
        $this->message($title, $content, $icon, $showOnce, 'secondary', $close, $timeout);
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function notice($title, $content = '', $icon = true, $showOnce = false, $close = true, $timeout = 5000)
    {
        $this->message($title, $content, $icon, $showOnce, 'notice', $close, $timeout);
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function light($title, $content = '', $icon = true, $showOnce = false, $close = true, $timeout = 5000)
    {
        $this->message($title, $content, $icon, $showOnce, 'light', $close, $timeout);
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function dark($title, $content = '', $icon = true, $showOnce = false, $close = true, $timeout = 5000)
    {
        $this->message($title, $content, $icon, $showOnce, 'dark', $close, $timeout);
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     * @param string      $level
     * @param bool        $close
     */
    public function message($title, $content, $icon, $showOnce, $level = 'info', $close = true, $timeout = 5000)
    {
        if($showOnce){
            $this->session->now('alert.title', $title);
            $this->session->now('alert.content', $content);
            $this->session->now('alert.level', $level);
            $this->session->now('alert.close', $close);
            $this->session->now('alert.timeout', $timeout);
        } else {
            $this->session->flash('alert.title', $title);
            $this->session->flash('alert.content', $content);
            $this->session->flash('alert.level', $level);
            $this->session->flash('alert.close', $close);
            $this->session->flash('alert.timeout', $timeout);
        }

        // if icon == true, get icon from level, else if icon is string, set icon
        if ((is_bool($icon) && $icon == true) || strlen($icon) > 1) {
            $icon = is_string($icon) ? $icon : alert_icon($level);
            if($showOnce){
                $this->session->now('alert.icon', $icon);
            } else {
                $this->session->flash('alert.icon', $icon);
            }
        }
    }
}
