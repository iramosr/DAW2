<?php
function receiveValidateString($itemName, $message, &$errors)
{
    $itemValue = null;
    if (isset($_POST[$itemName]) && !empty($_POST[$itemName])) {
        $itemValue = trim($_POST[$itemName]);
    } else {
        $errors[$itemName] = "$message";
    }
    return $itemValue;
}

function messageErrorItem($item, $errors)
{
    return array_key_exists($item, $errors) ?
        "<br><span style='color:red; font-style: italic'>{$errors[$item]}</span>":"";
}