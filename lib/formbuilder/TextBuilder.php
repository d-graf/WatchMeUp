<?php

class TextBuilder extends Builder
{
    public function __construct()
    {
        $this->addProperty('placeholder');
        $this->addProperty('name');
        $this->addProperty('value', null);
    }

    public function build()
    {
        $result = '<div class="form-group">';
        $result .= "        <input name=\"{$this->name}\" type=\"text\" placeholder=\"$this->placeholder\" value=\"{$this->value}\" class=\"form-control input-md\">";
        $result .= '</div>';

        return $result;
    }
}
