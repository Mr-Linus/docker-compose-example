### zookeeper
##### 初始化并启动集群
```bash
docker-compose up -d
```
##### 暂停集群
```bash
docker-compose down
```
##### 注意
- `ZOO_MY_ID`
> id必须在整体中是唯一的，并且应该具有介于1和255之间的值。请注意，如果使用`/data`已包含该`myid`文件的目录启动容器，则此变量不会产生任何影响。

- `ZOO_SERVERS`
> 此变量允许您指定Zookeeper集合的计算机列表。每个条目都有`server.id=host:port:port`。参赛作品以空格分隔。请注意，如果使用`/conf`已包含该zoo.cfg文件的目录启动容器，则此变量不会产生任何影响。
> 在3.5中，这种语法已经改变。应指定服务器：`server.id=<address1>:<port1>:<port2>[:role];[<client port address>:]<client port>`