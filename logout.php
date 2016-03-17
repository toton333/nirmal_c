<?php

SetCookie("uname",'',time()-2000);
SetCookie("pwd",'',time()-2000);
header('Location: index.php');