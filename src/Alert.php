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
    function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function info($title, $content = '', $icon = true)
    {
        $this->message($title, $content, $icon, 'info');
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function success($title, $content = '', $icon = true)
    {
        $this->message($title, $content, $icon, 'success');
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function error($title, $content = '', $icon = true)
    {
        $this->message($title, $content, $icon, 'danger');
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     */
    public function warning($title, $content = '', $icon = true)
    {
        $this->message($title, $content, $icon, 'warning');
    }

    /**
     * @param             $title
     * @param             $content
     * @param bool|string $icon
     * @param string      $level
     * @param bool        $close
     */
    public function message($title, $content, $icon, $level = 'info', $close = true)
    {
        $this->session->flash('alert.title', $title);
        $this->session->flash('alert.content', $content);
        $this->session->flash('alert.level', $level);
        $this->session->flash('alert.close', $close);

        // if icon == true, get icon from level, else if icon is string, set icon
        if ((is_bool($icon) && $icon == true) || strlen($icon) > 1) {
            $icon = is_string($icon) ? $icon : alert_icon($level);

            $this->session->flash('alert.icon', $icon);
        }
    }
}