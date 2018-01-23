<?php
// See the password_hash() example to see where this came from.
$hash = '$2y$10$tDtuaoPvKgxjTTbTizAPB.qNor8U2MplTj1fCz46oyCr51pAMGN6G';

if (password_verify('test', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>