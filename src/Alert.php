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
    public function info($title, $content = '', $icon = true, $showOnce = false)
    {
        $this->message($title, $content, $icon, $showOnce, 'info');
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function success($title, $content = '', $icon = true, $showOnce = false)
    {
        $this->message($title, $content, $icon, $showOnce, 'success');
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function error($title, $content = '', $icon = true, $showOnce = false)
    {
        $this->message($title, $content, $icon, $showOnce, 'danger');
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function danger($title, $content = '', $icon = true, $showOnce = false)
    {
        $this->message($title, $content, $icon, $showOnce, 'danger');
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function warning($title, $content = '', $icon = true, $showOnce = false)
    {
        $this->message($title, $content, $icon, $showOnce, 'warning');
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     * @param string      $level
     * @param bool        $close
     */
    public function message($title, $content, $icon, $showOnce, $level = 'info', $close = true)
    {
        if($showOnce){
            $this->session->now('alert.title', $title);
            $this->session->now('alert.content', $content);
            $this->session->now('alert.level', $level);
            $this->session->now('alert.close', $close);
        } else {
            $this->session->flash('alert.title', $title);
            $this->session->flash('alert.content', $content);
            $this->session->flash('alert.level', $level);
            $this->session->flash('alert.close', $close);
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
