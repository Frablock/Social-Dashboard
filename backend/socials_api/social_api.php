<?php
interface social_api {
  public function getFollowersCount(string $username): int;
  public function getPostData(string $username, string $postID);
  public function getAllPostsID(string $username): array;
}
