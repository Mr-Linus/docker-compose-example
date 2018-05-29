# Gogs-Docker

#### 项目介绍
Gogs的Docker集群部署方案

##### 初始化并启动集群
```bash
cd gogs-docker
docker-compose up -d
```
##### 暂停集群
```bash
docker-compose down
```

##### 参数设置相关
- 数据库默认为MYSQL 密码默认为GeekCloud，设置密码在docker-compose.yml里
> 虽然Docker内部互联网络是安全的，但是还是建议修改下！
- 初始化配置中设置数据库主机为 gogs-mysql:3306
