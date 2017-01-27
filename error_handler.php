<?php

set_error_handler('error_handler');

function error_handler($severity, $message, $filename, $lineno ) {
    if (error_reporting() == 0) {
        return;
    }
//    echo '<pre>';
    echo '<div class="error">';
//    try {
        throw new ErrorException($message, 0, $severity, $filename, $lineno);
//    } catch (ErrorException $exception) {
//        echo '<pre>'; var_dump($exception->getTrace()[0]); die;
//    }
}

?>

<style>
    .error {
    }
</style>

