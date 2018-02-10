## Laravel Http

### 文件
    ResponseTrait.php 响应[功能]

    Request.php 请求
    Response.php 响应
    JsonResponse.php JSON 响应
    RedirectResponse.php 重定向 响应

    File.php 文件
    FileHelpers.php 文件辅助
    UploadedFile.php 上传文件

    Concerns
        InteractsWithContentTypes.php
        InteractsWithFlashData.php
        InteractsWithInput.php
    Middleware 中间件
        CheckResponseForModifications.php
        FrameGuard.php
    Exceptions 异常
        HttpResponseException.php
        PostTooLargeException.php

    Resources
        CollectsResources.php
        ConditionallyLoadsAttributes.php
        DelegatesToResource.php
        MergeValue.php
        MissingValue.php
        PotentiallyMissing.php
        Json
            AnonymousResourceCollection.php
            PaginatedResourceResponse.php
            Resource.php
            ResourceCollection.php
            ResourceResponse.php
    Testing 测试
        File.php 文件
        FileFactory.php 文件工厂
        MimeType.php 元信息类型