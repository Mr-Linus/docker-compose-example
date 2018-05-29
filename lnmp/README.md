# LNMP

# 使用方法
## 单机模式
      chmod 755 docker-compose #先将docker-compose赋予执行权限,我这里的docker-compose是Linux的64位版本
      ./docker-compose up -d  #启动容器组
      # ./docker-compose logs #查看容器日志
      # ./docker-compose down #停止容器

## swarm 集群模式
      docker stack deploy -c docker-compose.yml lnmplab #部署容器
      #docker stack rm lnmplab 删除LNMP集群
