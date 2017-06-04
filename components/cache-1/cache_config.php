<?php

# jalal7h@gmail.com
# 2017/06/03
# 1.1

# --spi--

define( 'cache_type',!is_bool(cache)?cache:  'file'  ); // file / redis / memcached

#
# redis
define( 'cache_redis_server',	null  );
define( 'cache_redis_port',		null  );
define( 'cache_redis_password',	null  );
define( 'cache_redis_database',	null  );

