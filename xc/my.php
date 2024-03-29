# Application
TIME_ZONE=Asia/Shanghai
LOG_ENABLE=false
APP_DEBUG=false

# Server
PFILE=@runtime/swoft.pid
PNAME=php-swoft
TCPABLE=true
CRONABLE=true
AUTO_RELOAD=true
AUTO_REGISTER=false

# HTTP
HTTP_HOST=0.0.0.0
HTTP_PORT=8080
HTTP_MODE=SWOOLE_PROCESS
HTTP_TYPE=SWOOLE_SOCK_TCP

# WebSocket
WS_ENABLE_HTTP=true

# TCP
TCP_HOST=0.0.0.0
TCP_PORT=8099
TCP_MODE=SWOOLE_PROCESS
TCP_TYPE=SWOOLE_SOCK_TCP
TCP_PACKAGE_MAX_LENGTH=2048
TCP_OPEN_EOF_CHECK=false

# Crontab
CRONTAB_TASK_COUNT=1024
CRONTAB_TASK_QUEUE=2048

# Swoole Settings
WORKER_NUM=1
MAX_REQUEST=100000
DAEMONIZE=0
DISPATCH_MODE=2
TASK_IPC_MODE=1
MESSAGE_QUEUE_KEY=1879052289
TASK_TMPDIR=/tmp/
LOG_FILE=@runtime/logs/swoole.log
TASK_WORKER_NUM=1
PACKAGE_MAX_LENGTH=2048
OPEN_HTTP2_PROTOCOL=false
SSL_CERT_FILE=/path/to/ssl_cert_file
SSL_KEY_FILE=/path/to/ssl_key_file

# Database Master nodes
DB_NAME=dbMaster
DB_URI=127.0.0.1:3306/test?user=root&password=YINjj@94824&charset=utf8,127.0.0.1:3306/test?user=root&password=YINjj@94824&charset=utf8
DB_MIN_ACTIVE=5
DB_MAX_ACTIVE=10
DB_MAX_WAIT=20
DB_MAX_WAIT_TIME=3
DB_MAX_IDLE_TIME=60
DB_TIMEOUT=2

# Database Slave nodes
DB_SLAVE_NAME=dbSlave
DB_SLAVE_URI=127.0.0.1:3306/test?user=root&password=YINjj@94824charset=utf8,127.0.0.1:3306/test?user=root&password=YINjj@94824&charset=utf8
DB_SLAVE_MIN_ACTIVE=5
DB_SLAVE_MAX_ACTIVE=10
DB_SLAVE_MAX_WAIT=20
DB_SLAVE_MAX_WAIT_TIME=3
DB_SLAVE_MAX_IDLE_TIME=60
DB_SLAVE_TIMEOUT=3
#127.0.0.1:6379/1?auth=password
# Redis
REDIS_NAME=redis
REDIS_DB=2
REDIS_URI=127.0.0.1:6379/1?auth=yjj94824,127.0.0.1:6379/1?auth=yjj94824
REDIS_MIN_ACTIVE=5
REDIS_MAX_ACTIVE=10
REDIS_MAX_WAIT=20
REDIS_MAX_WAIT_TIME=3
REDIS_MAX_IDLE_TIME=60
REDIS_TIMEOUT=3
REDIS_SERIALIZE=1

# other redis node
REDIS_DEMO_REDIS_DB=6
REDIS_DEMO_REDIS_PREFIX=demo_redis_

# User service (demo service)
USER_POOL_NAME=user
USER_POOL_URI=127.0.0.1:8099,127.0.0.1:8099
USER_POOL_MIN_ACTIVE=5
USER_POOL_MAX_ACTIVE=10
USER_POOL_MAX_WAIT=20
USER_POOL_TIMEOUT=200
USER_POOL_MAX_WAIT_TIME=3
USER_POOL_MAX_IDLE_TIME=60
USER_POOL_USE_PROVIDER=false
USER_POOL_BALANCER=random
USER_POOL_PROVIDER=consul

# User service breaker (demo service)
USER_BREAKER_FAIL_COUNT = 3
USER_BREAKER_SUCCESS_COUNT = 6
USER_BREAKER_DELAY_TIME = 5000

# Consul
CONSUL_ADDRESS=http://127.0.0.1
CONSUL_PORT=8500
CONSUL_REGISTER_NAME=user
CONSUL_REGISTER_ETO=false
CONSUL_REGISTER_SERVICE_ADDRESS=127.0.0.1
CONSUL_REGISTER_SERVICE_PORT=8099
CONSUL_REGISTER_CHECK_NAME=user
CONSUL_REGISTER_CHECK_TCP=127.0.0.1:8099
CONSUL_REGISTER_CHECK_INTERVAL=10
CONSUL_REGISTER_CHECK_TIMEOUT=1
