# session
```
// 开启session
(new userSession(session配置, cache配置)->start();
;cache
cache.default.type          = "Redis"
cache.default.host          = "127.0.0.1"
cache.default.port          = "6379"
cache.default.password      = "123456"
cache.default.prefix        = "xxx."
cache.default.db            = "0"
;cache file
cache.file.type             = "File"
cache.file.path             = APPLICATION_PATH "/data/cache/"
cache.file.prefix           = "admin"
;session
session.connection          = "Storage"
session.drive               = "default"
session.lifetime            = 20
```
