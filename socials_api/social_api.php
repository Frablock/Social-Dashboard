interface social_api {
  public function getFollowersCount(username);
  public function getPostData(postID);
  public function getAllPostsID(username);
}
