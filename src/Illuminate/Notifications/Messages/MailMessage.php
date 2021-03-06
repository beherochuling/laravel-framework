<?php
namespace Illuminate\Notifications\Messages;

class MailMessage extends SimpleMessage {
    public $view;
    public $viewData = [];
    public $markdown = 'notifications::email';
    public $from = [];
    public $replyTo = [];
    public $cc = [];
    public $bcc = [];
    public $attachments = [];
    public $rawAttachments = [];
    public $priority; // 优先级

    public function view($view, array $data = []) {
        $this->view = $view;
        $this->viewData = $data;

        $this->markdown = null;

        return $this;
    }
    public function markdown($view, array $data = []) {
        $this->markdown = $view;
        $this->viewData = $data;

        $this->view = null;

        return $this;
    }
    public function template($template) {
        $this->markdown = $template;

        return $this;
    }
    public function from($address, $name = null) {
        $this->from = [$address, $name];
        return $this;
    }
    public function replyTo($address, $name = null) {
        $this->replyTo = [$address, $name];
        return $this;
    }
    public function cc($address, $name = null) {
        $this->cc = [$address, $name];
        return $this;
    }
    public function bcc($address, $name = null) {
        $this->bcc = [$address, $name];
        return $this;
    }
    public function attach($file, array $options = []) {
        $this->attachments[] = compact('file', 'options');

        return $this;
    }
    public function attachData($data, $name, array $options = []) {
        $this->rawAttachments[] = compact('data', 'name', 'options');
        return $this;
    }
    public function priority($level) { // 1-5
        $this->priority = $level;
        return $this;
    }
    public function data() {
        return array_merge($this->toArray(), $this->viewData);
    }
}