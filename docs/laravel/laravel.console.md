## Laravel Console

### 文件
    ConfirmableTrait.php 可确认[功能]

    Application.php
    Command.php
    DetectsApplicationNamespace.php
    GeneratorCommand.php
    OutputStyle.php
    Parser.php

    Events 事件
        ArtisanStarting.php 应用开始
        CommandStarting.php 命令开始
        CommandFinished.php 命令结束
    Scheduling 计划
        Event.php 事件
        CallbackEvent.php 回调事件
        ManagesFrequencies.php

        Mutex.php 互斥
        CacheMutex.php 缓存互斥

        CommandBuilder.php 命令 构建器

        Schedule.php 计划任务
        ScheduleRunCommand.php 计划任务 运行命令
        ScheduleFinishCommand.php 计划任务 结束命令
