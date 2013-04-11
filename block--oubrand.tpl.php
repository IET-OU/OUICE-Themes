<?php

//print '<div class="block">';
include('edit-block.tpl.php');
print (module_exists('oubrand') ? oubrand_replace_ou_tokens('', $content) : $content);
//print $content;
//print '</div>';