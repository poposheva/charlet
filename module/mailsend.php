<?php
    class MailSender{
        private $from;
        private $to;
        private $subject;
        private $body;
        
        public function __construct(){
            $this->subject = "System Mail";
        }

        public function SetFrom($var){
            $this->from = $var;

            return $this;
        }

        public function SetTo($var){
            $this->to = $var;

            return $this;
        }

        public function SetSubject($var){
            $this->subject = $var;

            return $this;
        }

        public function SetBody($var){
            $this->body = $var;

            return $this;
        }

        public function Send(){
            mail(
                $this->to,
                $this->subject,
                $this->body
            );
        }
    }
?>