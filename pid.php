<?php

echo 'script pid::' . getmypid() . ' (process id)' . PHP_EOL;
echo 'script gid::' . getmygid() . ' (group id)' . PHP_EOL;
echo 'script uid::' . getmyuid() . ' (user id)' . PHP_EOL;
echo 'current user::' . get_current_user() . ' (current user)' . PHP_EOL;
echo 'script inode::' . getmyinode() . ' (inode)' . PHP_EOL;
echo 'script last mod::' . getlastmod() . ' (last page modification)' . PHP_EOL;
