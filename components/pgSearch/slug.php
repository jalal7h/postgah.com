<?

# jalal7h@gmail.com
# 2017/01/02
# 1.0

add_slug([

	'tag/$' => './?page=67&q=$1&its_tag=1&canonical_tag=1' ,
	'pk=$' => './?page=67&q=$1&tag_needs_to_be_redirected=1&its_tag=1' ,
	't=$/p=$' => './?page=67&q=$1&tag_needs_to_be_redirected=1&its_tag=1' ,

]);

// RewriteRule ^tag/(.*)$ ./?page=67&q=$1&its_tag=1&canonical_tag=1 [L]
// RewriteRule ^pk=(.*)$ ./?page=67&q=$1&tag_needs_to_be_redirected=1&its_tag=1 [L]
// RewriteRule ^t=(.*)/p=([0-9]*).html$ ./?page=67&q=$1&tag_needs_to_be_redirected=1&its_tag=1 [L]


