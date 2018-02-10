## Laravel Database

### 文件
    #### Database
        Grammar.php abstract 语法
        Seeder.php abstract 播种器
        ConnectionInterface.php 连接器接口
            Connection.php 连接器
                MySqlConnection.php MySql
                PostgresConnection.php Postgres
                SQLiteConnection.php SQLite
                SqlServerConnection.php SqlServer
        ConnectionResolverInterface.php 连接解析器接口
            ConnectionResolver.php 连接解析器
            DatabaseManager.php 数据库管理器

        DatabaseServiceProvider.php extends Illuminate\Support\ServiceProvider 数据库服务
        MigrationServiceProvider.php extends Illuminate\Support\ServiceProvider 迁移服务
        SeedServiceProvider.php extends Illuminate\Support\ServiceProvider 播种服务

        DetectsLostConnections.php trait 检测丢失的连接
        QueryException.php 查询异常

    #### Connectors 连接器
        ConnectionFactory.php 工厂类
        ConnectorInterface.php 接口
        Connector.php 父类
        MySqlConnector.php MySql
        PostgresConnector.php Postgres
        SQLiteConnector.php SQLite
        SqlServerConnector.php SqlServer

    #### Capsule 封装
        Manager.php

    #### Console 命令行
    ##### Migrations 迁移器
        InstallCommand.php migrate:install 安装
        RefreshCommand.php migrate:refresh
        ResetCommand.php migrate:reset
        RollbackCommand.php migrate:rollback
        BaseCommand.php 父类
        MigrateCommand.php migrate
        MigrateMakeCommand.php make:migration
        StatusCommand.php migrate:status
    ##### Seeds 播种器
        SeedCommand.php db:seed
        SeederMakeCommand.php make:seeder
        stubs 模板
            seeder.stub seeder模板

    #### Events 事件
        QueryExecuted.php 查询执行
        ConnectionEvent.php abstract 父类
        TransactionBeginning.php 事务开始
        TransactionCommitted.php 事务提交
        TransactionRolledBack.php 事务回滚
    #### Schema SQL
        Blueprint.php 生成 sql 语句

        Builder.php 父类
        MySqlBuilder.php MySql
        PostgresBuilder.php Postgres
        Grammars 语法
            Grammar.php 父类 abstract -Grammar
            MySqlGrammar.php MySql
            PostgresGrammar.php Postgres
            SQLiteGrammar.php SQLite
            SqlServerGrammar.php SqlServer

    #### Migrations 迁移
        MigrationRepositoryInterface.php 迁移接口
        DatabaseMigrationRepository.php 迁移类
        MigrationCreator.php 迁移创建器
        Migration.php abstract
        Migrator.php
        -stubs 模板
            blank.stub 空模板
            create.stub 创建模板
            update.stub 更新模板

    #### Eloquent
        MassAssignmentException.php
        ModelNotFoundException.php

        Factory.php 工厂
        FactoryBuilder.php 工厂构建器
        QueueEntityResolver.php

        Collection.php 连接器
        Builder.php 构建器
        Model.php 模型
        SoftDeletes.php 软删除 trait

        Scope.php 父接口
            ScopeInterface.php 接口
                SoftDeletingScope.php

        Relations 关联模型
            Relation.php abstract 父类
                HasOneOrMany.php 一对一 或 一对多
                    HasOne.php 一对一 主
                    HasMany.php 一对多 主
                    MorphOneOrMany.php abstract 父类
                        MorphOne.php 多态 一对一
                        MorphMany.php 多态 一对多
                HasManyThrough.php 一对多 远程
                BelongsTo.php 一对一 从
                    MorphTo.php
                BelongsToMany.php 一对多 从
                    MorphToMany.php

            Pivot.php extends \Eloquent\Model
                MorphPivot.php

    #### Query 查询
        Builder.php 构建器 入口
        JoinClause.php Join 从句
        Expression.php 表达式
            JsonExpression.php Json 表达式

        Grammars 语法
            Grammar.php extends Grammar 父类
                MySqlGrammar.php MySql
                PostgresGrammar.php Postgres
                SQLiteGrammar.php SQLite
                SqlServerGrammar.php SqlServer
        Processors
            Processor.php 父类
                MySqlProcessor.php MySql
                PostgresProcessor.php Postgres
                SQLiteProcessor.php SQLite
                SqlServerProcessor.php SqlServer

### where
    where
    whereRaw 原生
    whereNested
    whereSub
    whereBasic
    whereColumn 
    whereInExistingQuery

    whereNull 空
    whereNotNull 不空
    whereExists 存在
    whereNotExists 不存在
    whereBetween 在范围
    whereNotBetween 不在范围
    whereIn 在中间
    whereNotIn 不在中间
    whereInSub 
    whereNotInSub 

    whereDate 日期
    whereTime 时间
    whereYear 年
    whereMonth 月
    whereDay 日

    wherePivot
    wherePivotIn

    whereHas
    whereDoesntHave
    whereCountQuery