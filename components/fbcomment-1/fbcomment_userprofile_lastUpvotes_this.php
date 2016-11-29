<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

function fbcomment_userprofile_lastUpvotes_this( $rw ){
  
  # 
  # the related post  
  $related_post_url = _URL."/?page=".$rw['page_id']."&id=".$rw['table_id']; // nxx
  $related_post_name = table( $rw['table_name'], $rw['table_id'], "name");
  
  # comment
  $comment_url = _URL."/?page=".$rw['page_id']."&id=".$rw['table_id']."&#comment-".$rw['id']; // nxx
  $comment_text = $rw['text'];

  #
  # replied to
  if( $rw['comment_id'] ){
    $rw_replay_to = table("fbcomment", $rw['comment_id']);
    $replay_to_text = $rw_replay_to['text'];
    $replay_to_id = $rw_replay_to['user_id'];
    $replay_to_name = table("users", $rw_replay_to['user_id'], "name");
    $replay_to_url = _URL."/?page=".$rw['page_id']."&id=".$rw['table_id']."&#comment-".$replay_to_id; // nxx
  }

  $c = '
  <div class="this">
    
    <div class="related_post">'.__('در مورد').' <a href="'.$related_post_url.'">'.$related_post_name.'</a></div>'.

      ( $rw['comment_id']
          ? '<div class="replay_to">'.__('در جواب').' '.useravatar( $replay_to_id, $text_flag=true , $link_flag=true ).'<a href="'.$replay_to_url.'">'.$replay_to_text.'</a></div>' 
          : ''
      ).
    
    '<div class="said">'.__('گفت').' <a href="'.$comment_url.'">'.$comment_text.'</a></div>
  
  </div>
  ';

  return $c;
  
}






