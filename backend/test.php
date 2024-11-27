<?php
include_once "socials_api/youtube.php";

$yt = new youtube();
echo $yt->getFollowersCount("ALeaument");
echo "<img src=\"".$yt->getProfilePicture("ALeaument")."\">";
print_r($yt->getAllPostsID("ALeaument"));
print_r($yt->getPostData("ALeaument", $yt->getAllPostsID("ALeaument")[0]));