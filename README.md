# Drone CICD Example

## CICD 配置

1. 默认项目根目录下的 .drone.yml 为配置文件
1. 可以配置多个 pipeline
1. 每个 pipeline 可以自定义 kind、type、name、platform、steps、trigger 等
1. 每个 pipeline 的 steps 可以包含多个步骤，通常用于 test、build、publish、notify 等
1. 每个步骤可以自定义 name 、 image 、commands 等

## Docker 镜像构建

1. 使用 plugins/docker Image 进行构建
1. 可以在 settings 中指定 dockerfile，项目调试和项目构建应该使用不同的 dockerfile
1. 可以配置 registry 和 tag

### aspnet 项目构建

1. 采用分层构建
1. 使用 mcr.microsoft.com/dotnet/sdk:6.0-alpine 作为 sdk 生成发布文件
1. 使用 mcr.microsoft.com/dotnet/aspnet:6.0-alpine 作为 runtime 基础镜像
1. 可以使用 nuget.config 或 dotnet restore 的参数配置国内源

### springboot 项目构建

1. 采用分层构建
1. 使用 openjdk:8-jdk-alpine 作为 sdk 进行构建
1. 使用 openjdk:8-jre-alpine 作为 runtime
1. 可以在 build.gradle 中配置国内源

### vue3 项目构建

1. 采用分层构建
1. 使用 node:16-alpine 作为 sdk 进行构建
1. 使用 nginx:stable-alpine 作为 runtime
1. 可以使用 npm config 配置国内源

### php 项目构建

1. 采用分层构建
1. 使用 composer:2.3 作为 sdk 进行构建
1. 使用 php:8.1-fpm-alpine 作为 runtime
1. 可以使用 composer config 配置国内源