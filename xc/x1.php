<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/11 0011
 * Time: 22:38
 */
go(function() {
    go(function () {
        co::sleep(3.0);
        go(function () {
            co::sleep(2.0);
            echo "co[3] end\n";
        });
        echo "co[2] end\n";
    });

    co::sleep(1.0);
    echo "co[1] end\n";
});