<?php
include_once "socials_api/youtube.php";

$yt = new youtube();
echo $yt->getFollowersCount("ALeaument");
