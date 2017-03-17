<?php
    namespace NS;

    define(__NAMESPACE__ .'\foo','111');
    define('foo','222');

    echo foo;  // 111.
    echo \foo;  // 222.
    echo \NS\foo;  // 111.
    echo NS\foo; // fatal error. assumes \NS\NS\foo.
?>