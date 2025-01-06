<?php
/** 
* Function sanitize for cleaning data enter by the user in the champs of a formulaire
 * @param mixed $data
 * @return string
 */
function sanitize($data):string{
    return htmlentities(strip_tags(stripslashes(trim($data))));
};