<?php
function label($a, $b = '', $c = '') {
    $b = $b ? ' ' . $b : '';
    $c = $c ? ' ' . $c : '';
    return '<label class="control-label' . $b . '"' . $c . '>' . $a . '</label>' . "\n";
}

function input_text($a, $b, $c = []) {
    $attrs = _parse_attributes($c);
    return '<input type="text" name="' . $a . '" value="' . $b . '" class="form-control" ' . $attrs . '>' . "\n";
}

function input_file($a, $c = []) {
    $attrs = _parse_attributes($c);
    return '<input type="file" name="' . $a . '" class="form-control" ' . $attrs . '>' . "\n";
}

function input_time($a, $b, $c = []) {
    $attrs = _parse_attributes($c);
    return '<input type="time" name="' . $a . '" value="' . $b . '" class="form-control" ' . $attrs . '>' . "\n";
}

function input_date($a, $b, $c = []) {
    $attrs = _parse_attributes($c);
    return '<input type="date" name="' . $a . '" value="' . $b . '" class="form-control" ' . $attrs . '>' . "\n";
}

function input_number($a, $b, $c = []) {
    $attrs = _parse_attributes($c);
    return '<input type="number" name="' . $a . '" value="' . $b . '" class="form-control" ' . $attrs . '>' . "\n";
}

function textarea($a, $b, $c = []) {
    $attrs = _parse_attributes($c);
    return '<textarea name="' . $a . '" class="form-control" ' . $attrs . '>' . $b . '</textarea>' . "\n";
}

function input_hidden($a, $b, $c = []) {
    $attrs = _parse_attributes($c);
    return '<input type="hidden" name="' . $a . '" value="' . $b . '" ' . $attrs . '>' . "\n";
}

function input_password($a, $b, $c = []) {
    $attrs = _parse_attributes($c);
    return '<input type="password" name="' . $a . '" value="' . $b . '" class="form-control" ' . $attrs . '>';
}

function input_submit($a, $b, $c = []) {
    $attrs = _parse_attributes($c);
    return '<input type="submit" name="' . $a . '" value="' . $b . '" class="btn btn-info" ' . $attrs . '>';
}

function select($a, $b = [], $selected = [], $c = []) {
    $attrs = _parse_attributes($c);
    $options = '';
    foreach ($b as $key => $val) {
        $sel = in_array($key, (array) $selected) ? ' selected' : '';
        $options .= '<option value="' . $key . '"' . $sel . '>' . $val . '</option>' . "\n";
    }
    return '<select name="' . $a . '" class="form-control select2" ' . $attrs . '>' . "\n" . $options . '</select>' . "\n";
}

function _parse_attributes($attrs) {
    if (!is_array($attrs)) return '';
    $attr_str = '';
    foreach ($attrs as $key => $value) {
        $attr_str .= ' ' . htmlspecialchars($key) . '="' . htmlspecialchars($value) . '"';
    }
    return $attr_str;
}
