<?php

use DigiLive\GitChangelog\Renderers\MarkDown;

require 'vendor/autoload.php';

$changelogOptions = [
    'headTagName' => '2.4.0',
    'headTagDate' => '2021-08-23',
    'titleOrder' => 'ASC',
];
$changelogLabels = ['Add', 'Cut', 'Fix', 'Bump', 'Document','Optimize'];


$changeLog = new MarkDown();
$changeLog->setUrl('commit', 'https://github.com/JBlond/php-diff/commit/{hash}');
$changeLog->setUrl('issue', 'https://github.com/JBlond/php-diff/issues/{issue}');

try {
    $changeLog->setOptions($changelogOptions);
} catch (Exception $exception) {
    echo $exception->getMessage();
}
$changeLog->setLabels(...$changelogLabels);
try {
    $changeLog->build();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
file_put_contents('changelog.md', $changeLog->get());
