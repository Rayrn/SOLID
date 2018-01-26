<?php

namespace SOLID\SingleResponsibility\V2;

require_once '../../../vendor/autoload.php';

$file = json_decode(file_get_contents('import.json'));
$postContent = (new PostContent($file->content))->build([]);

echo htmlentities($postContent['post_content']);
